<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontsite\SignInController;
use App\Http\Controllers\Frontsite\SignUpController;
use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\PaymentController;
use App\Http\Controllers\Frontsite\AppointmentController;
use App\Http\Controllers\Frontsite\SuccessPaymentController;

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
    Route::resource('appointment', AppointmentController::class);
    Route::resource('payment', PaymentController::class);
    Route::resource('sign-in', SignInController::class);
    Route::resource('sign-up', SignUpController::class);
    Route::resource('success', SuccessPaymentController::class,);
});


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
