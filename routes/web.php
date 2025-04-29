<?php

use App\Http\Controllers\Action\DivingApplicationController as ActionDivingApplicationController;
use App\Http\Controllers\Action\RentalActionController;
use App\Http\Controllers\Action\StudentController;
use App\Http\Controllers\Action\VesselScheduleController as ActionVesselScheduleController;
use App\Http\Controllers\DiversLogController;
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
use App\Http\Controllers\VesselInspectionDetailController;
use App\Http\Controllers\VesselScheduleController;
use App\Http\Controllers\VesselServiceController;
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

    Route::prefix('equipments')->group(function () {
        Route::get('/list', [EmployeeController::class, 'equipments'])->name('employee.equipments');
        Route::get('/rentals', [EmployeeController::class, 'rentals'])->name('employee.rentals');
    });

    Route::prefix('diving')->group(function () {
        Route::get('/lesson', [EmployeeController::class, 'lesson'])->name('employee.lesson');

        Route::prefix('students')->group(function () {
            Route::get('/list', [EmployeeController::class, 'students'])->name('employee.students');
            Route::get('/{student}/applications', [StudentController::class, 'getApplications']);
        });

        Route::prefix('applications')->group(function () {
            Route::get('/list', [EmployeeController::class, 'applications'])->name('employee.applications');
            Route::post('/{applicationID}/{action}', [ActionDivingApplicationController::class, 'handleAction'])->name('employee.handleActionApplication');
            Route::get('/{application}/divers-logs', [StudentController::class, 'getDiversLogs']);
            Route::get('/{application}/divers-log', [DivingApplicationController::class, 'viewDiversLog']);
        });
    });

    Route::prefix('vessels')->group(function () {
        Route::get('/list', [EmployeeController::class, 'vessels'])->name('employee.vessels');
        Route::get('/services', [EmployeeController::class, 'services'])->name('employee.services');
        Route::prefix('schedules')->group(function () {
            Route::get('/list', [EmployeeController::class, 'schedules'])->name('employee.schedules');
            Route::get('/{scheduleID}/{action}', [ActionVesselScheduleController::class, 'handleAction'])->name('employee.handleActionSchedule');
        });
        Route::prefix('inspection')->group(function () {
            Route::get('/list', [EmployeeController::class, 'inspection'])->name('employee.inspection');
            Route::get('/{scheduleID}', [EmployeeController::class, 'vesselSchedule'])->name('employee.vesselSchedule');
            // Route::get('/{scheduleID}/{action}', [ActionVesselScheduleController::class, 'handleAction'])->name('employee.handleActionSchedule');
        });
    });

    Route::prefix('rentals')->group(function () {
        Route::get('{rental}/items', [RentalActionController::class, 'rentalItems']);
        Route::post('{rental}/return', [RentalActionController::class, 'submitReturn']);
        Route::post('/confirm', [RentalActionController::class, 'confirmRental'])->name('rentals.confirm');
        Route::post('{rental}/action', [RentalActionController::class, 'handle'])->name('employee.rentals.action');
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
Route::resource('services', VesselServiceController::class);
Route::resource('vessel-schedules', VesselScheduleController::class);
Route::resource('vessel-inspections', VesselInspectionController::class);
Route::resource('vessel-inspections-details', VesselInspectionDetailController::class);

// Diving Lessons Routes
Route::resource('diving-lessons', DivingLessonController::class);
Route::resource('divers-logs', DiversLogController::class);

// Diving Applications Routes
Route::resource('diving-applications', DivingApplicationController::class);
