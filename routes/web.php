<?php

use Illuminate\Support\Facades\Route;

// frontsite
use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\AppointmentController as FrontsiteAppointment;
use App\Http\Controllers\Frontsite\PaymentController;
use App\Http\Controllers\Frontsite\SuccessRegisterController;

// backsite
use App\Http\Controllers\Backsite\DashboardController;
use App\Http\Controllers\Backsite\TypeUserController;
use App\Http\Controllers\Backsite\SpecialistController;
use App\Http\Controllers\Backsite\DoctorController;
use App\Http\Controllers\Backsite\ConfigPaymentController;
use App\Http\Controllers\Backsite\ConsultationController;
use App\Http\Controllers\Backsite\PermissionController;
use App\Http\Controllers\Backsite\RoleController;
use App\Http\Controllers\Backsite\AppointmentController as BacksiteAppointment;
use App\Http\Controllers\Backsite\TransactionController;
use App\Http\Controllers\Backsite\UserController;
use App\Http\Controllers\Backsite\HospitalPatientController;
use App\Http\Controllers\Backsite\ReportAppointmentController;
use App\Http\Controllers\Backsite\ReportTransactionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/', LandingController::class);

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

    // appointment page
    Route::get('appointment/doctor/{id}', [AppointmentController::class, 'appointment'])->name('appointment.doctor');
    Route::resource('appointment', FrontsiteAppointment::class);

    // payment page
    Route::resource('payment', PaymentController::class);

    // Succes Page
    Route::resource('success-register', SuccessRegisterController::class);
});

Route::group(['prefix' => 'backsite', 'as' => 'backsite.', 'middleware' => ['auth:sanctum', 'verified']], function () {

    // dashboard
    Route::resource('dashboard', DashboardController::class);

    // Type User
    Route::resource('type_user', TypeUserController::class);

    // Specialist
    Route::resource('specialist', SpecialistController::class);

    // Doctor
    Route::resource('doctor', DoctorController::class);

    // Config Payment
    Route::resource('config_payment', ConfigPaymentController::class);

    // Consultation 
    Route::resource('consultation', ConsultationController::class);

    // Permission
    Route::resource('permission', PermissionController::class);

    // Role
    Route::resource('role', RoleController::class);

    // Appointment
    Route::resource('appointment', BacksiteAppointment::class);

    // Transaction
    Route::resource('transaction', TransactionController::class);

    // User
    Route::resource('user', UserController::class);

    // hospital patient
    Route::resource('hospital_patient', HospitalPatientController::class);

    // report appointment
    Route::resource('appointment', ReportAppointmentController::class);

    // report transaction
    Route::resource('transaction', ReportTransactionController::class);
});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');