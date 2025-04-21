<?php

use App\Http\Controllers\DivingApplicationController;
use App\Http\Controllers\DivingLessonController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\EquipmentRentalItemController;
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
