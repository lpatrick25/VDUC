<?php

use App\Http\Controllers\Action\RentalActionController;
use App\Http\Controllers\DivingApplicationController;
use App\Http\Controllers\DivingLessonController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\EquipmentRentalItemController;
use App\Http\Controllers\Navigation\AdminController;
use App\Http\Controllers\Navigation\EmployeeController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VesselController;
use App\Http\Controllers\VesselInspectionController;
use App\Http\Controllers\VesselScheduleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/employees', [AdminController::class, 'employees'])->name('admin.employees');
    Route::get('/students', [AdminController::class, 'students'])->name('admin.students');
    Route::get('/surveys', [AdminController::class, 'surveys'])->name('admin.surveys');
    Route::get('/rentals', [AdminController::class, 'rentals'])->name('admin.rentals');
});

Route::prefix('employee')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('employee.dashboard');
    Route::get('/equipments', [EmployeeController::class, 'equipments'])->name('employee.equipments');
    Route::get('/rentals', [EmployeeController::class, 'rentals'])->name('employee.rentals');

    Route::prefix('rentals')->group(function () {
        Route::post('{rental}/action', [RentalActionController::class, 'handle'])->name('employee.rentals.action');
        Route::get('{rental}/items', [RentalActionController::class, 'rentalItems']);
        Route::post('{rental}/return', [RentalActionController::class, 'submitReturn']);
        Route::post('/confirm', [RentalActionController::class, 'confirmRental'])->name('rentals.confirm');
    });
});

// User Routes
Route::resource('users', UserController::class);

// Equipment Routes
Route::resource('equipments', EquipmentController::class);

// Rental Routes
Route::resource('rentals', RentalController::class);
Route::resource('equipment-rental', EquipmentRentalItemController::class);

// Vessel Routes
Route::resource('vessels', VesselController::class);
Route::resource('vessel-schedules', VesselScheduleController::class);
Route::resource('vessel-inspections', VesselInspectionController::class);

// Diving Lessons Routes
Route::resource('diving-lessons', DivingLessonController::class);

// Diving Applications Routes
Route::resource('diving-applications', DivingApplicationController::class);
