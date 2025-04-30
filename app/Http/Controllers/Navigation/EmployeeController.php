<?php

namespace App\Http\Controllers\Navigation;

use App\Http\Controllers\Controller;
use App\Models\DiversLog;
use App\Models\DivingApplication;
use App\Models\DivingLesson;
use App\Models\Equipment;
use App\Models\Rental;
use App\Models\User;
use App\Models\Vessel;
use App\Models\VesselService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function dashboard()
    {
        $employees = User::where('role', 'Employee')->count();
        $students = User::where('role', 'Student')->count();
        $surveys = User::where('role', 'Survey Client')->count();
        $rentals = User::where('role', 'Rental Client')->count();

        return view('employee.dashboard', compact('employees', 'students', 'surveys', 'rentals'));
    }

    public function equipments()
    {
        $equipments = Equipment::with('rentalItems.rental')->get();
        return view('employee.equipments', compact('equipments'));
    }

    public function rentals()
    {
        $rentals = Rental::with(['equipment', 'user'])
            ->whereIn('status', ['Pending', 'Confirmed', 'Released', 'Returned', 'Cancelled'])
            ->orderByRaw("FIELD(status, 'Pending', 'Confirmed', 'Released', 'Returned', 'Cancelled')")
            ->get();

        // Mark "Released" rentals as overdue if return_date has passed
        foreach ($rentals as $rental) {
            if (
                $rental->status === 'Released' &&
                now()->gt(\Carbon\Carbon::parse($rental->return_date))
            ) {
                $rental->status = 'Overdue'; // Virtual status for display only
            }
        }

        $users = User::where('role', 'Rental Client')->get();
        $allEquipment = Equipment::select('id', 'equipment_name', 'quantity')->get(); // fixed

        return view('employee.rentals', compact('rentals', 'users', 'allEquipment'));
    }

    public function lesson()
    {
        $divingLessons = DivingLesson::all();
        return view('employee.lesson', compact('divingLessons'));
    }

    public function students()
    {
        $students = User::where('role', 'Student')
            ->orderByRaw("FIELD(status, 'Active', 'Inactive')")
            ->get();
        return view('employee.students', compact('students'));
    }

    public function applications()
    {
        $divingApplications = DivingApplication::with(['user', 'lesson'])
            ->orderByRaw("FIELD(status, 'Pending', 'Approved', 'Ongoing', 'Completed', 'Rejected')")
            ->orderBy('created_at', 'desc')
            ->get();

        $users = User::where('role', 'Student')->get();
        $lessons = DivingLesson::all();

        return view('employee.applications', compact('divingApplications', 'users', 'lessons'));
    }

    public function services()
    {
        $services = VesselService::withCount('schedules')->get();
        return view('employee.services', compact('services'));
    }

    public function vessels()
    {
        $vessels = Vessel::all();
        $users = User::where('role', 'Survey Client')->get();
        return view('employee.vessels', compact('vessels', 'users'));
    }

    public function schedules()
    {
        $vessels = Vessel::all();
        $services = VesselService::all();
        $vesselSchedules = Vessel::with('schedules')->get();
        return view('employee.vessel-schedules', compact('vesselSchedules', 'vessels', 'services'));
    }

    public function inspection()
    {
        $vesselInspections = Vessel::whereHas('schedules', function ($query) {
            $query->where('status', 'Completed');
        })->with('inspections')->get();

        return view('employee.vessel-inspections', compact('vesselInspections'));
    }

    public function vesselSchedule($schedule_id)
    {
        $vesselSchedule = Vessel::whereHas('schedules', function ($query) use ($schedule_id) {
            $query->where('id', '=', $schedule_id);
        })->with(['schedules', 'inspections'])->first();

        if (!$vesselSchedule) {
            abort(404, 'Schedule not found');
        }

        $inspection = $vesselSchedule->schedules->first()->inspection;

        if (!$inspection) {
            abort(404, 'Inspection not found');
        }

        $vesselInspectionDetails = $inspection->details->map(function ($detail) {
            return [
                'id' => $detail->id,
                'title' => $detail->title,
                'description' => $detail->description,
                'remarks' => $detail->remarks,
            ];
        });

        return view('employee.vessel-schedule-details', compact('vesselSchedule', 'schedule_id', 'vesselInspectionDetails'));
    }
}
