<?php

namespace App\Http\Controllers\Navigation;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function employees()
    {
        $employees = User::where('role', 'Employee')->get();
        return view('admin.employees', compact('employees'));
    }

    public function students()
    {
        $students = User::where('role', 'Student')->get();
        return view('admin.students', compact('students'));
    }

    public function surveys()
    {
        $surveys = User::where('role', 'Survey Client')->get();
        return view('admin.surveys', compact('surveys'));
    }

    public function rentals()
    {
        $rentals = User::where('role', 'Rental Client')->get();
        return view('admin.rentals', compact('rentals'));
    }
}
