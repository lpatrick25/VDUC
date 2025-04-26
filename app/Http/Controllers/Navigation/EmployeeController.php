<?php

namespace App\Http\Controllers\Navigation;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use App\Models\Rental;
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
}
