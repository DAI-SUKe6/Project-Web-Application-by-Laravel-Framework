<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\JobController;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $users=User::all();
        return view('dashboard',compact('users'));
    })->name('dashboard');
});
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    //job
Route::get('/job/all',[JobController::class,'index'])->name('job');
Route::post('/job/add',[JobController::class,'store'])->name('addJob');
Route::get('/job/edit/{id}',[JobController::class,'edit']);
Route::post('/job/update/{id}',[JobController::class,'update']);
Route::get('/job/delete/{id}',[JobController::class,'delete']);
    //employee
Route::get('/employee/all',[EmployeeController::class,'index'])->name('employee');
Route::post('/employee/add',[EmployeeController::class,'store'])->name('addEmployee');
Route::get('/employee/edit/{id}',[EmployeeController::class,'edit']);
Route::post('/employee/update/{id}',[EmployeeController::class,'update']);
Route::get('/employee/delete/{id}',[EmployeeController::class,'delete']);
});