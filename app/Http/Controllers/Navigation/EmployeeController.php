<?php

namespace App\Http\Controllers\Navigation;

use App\Http\Controllers\Controller;
use App\Models\DiversLog;
use App\Models\DivingApplication;
use App\Models\DivingLesson;
use App\Models\Equipment;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
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

        // Optional: Mark "Released" rentals as overdue if return_date has passed
        foreach ($rentals as $rental) {
            if (
                $rental->status === 'Released' &&
                now()->gt(\Carbon\Carbon::parse($rental->return_date))
            ) {
                $rental->status = 'Overdue'; // Virtual status for display only
            }
        }

        return view('employee.rentals', compact('rentals'));
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
}
