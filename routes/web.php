<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/',[App\Http\Controllers\HomeController::class,'home'])->name('homepage');
Route::get('/system/down',[App\Http\Controllers\HomeController::class,'systemDown'])->name('systemDown')->middleware('isDown');
Route::get('/user/disabled',[App\Http\Controllers\HomeController::class,'userDisabled'])->name('userDisabled')->middleware('isDisabled');

Route::get('/login',[App\Http\Controllers\LoginController::class,'login'])->name('login');
Route::get('/reset/{id}/',[App\Http\Controllers\LoginController::class,'resetPassword'])->name('resetPassword')->middleware('signed');

Route::middleware(['staff'])->group(function(){
Route::get('/dashboard',[App\Http\Controllers\StaffController::class,'home'])->name('staffDashboard');
Route::get('/staff/all/appointments',[App\Http\Controllers\StaffController::class,'allAppointments'])->name('allStaffAppointments');
Route::get('/staff/rest/password',[App\Http\Controllers\StaffController::class,'updatePassword'])->name('updateStaffPassword');
Route::get('/staff/logout',[App\Http\Controllers\StaffController::class,'logout'])->name('staffLogout');
});

Route::middleware(['doctor'])->group(function(){
    Route::get('/doctor/dashboard',[App\Http\Controllers\DoctorController::class,'home'])->name('doctorDashboard');
    Route::get('/doctor/staff',[App\Http\Controllers\DoctorController::class,'staff'])->name('staff');
    Route::get('/doctor/all/appointments',[App\Http\Controllers\DoctorController::class,'allAppointments'])->name('allAppointments');
    Route::get('/doctor/logout',[App\Http\Controllers\DoctorController::class,'logout'])->name('doctorLogout');
});
