<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeaveRequestController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Leave Request Routes

Route::get('/', function () {
    // dd(auth()->user()->role);
    return view('welcome');
})->name('home');

Route::get('/leave-request/create', [LeaveRequestController::class, 'create'])->middleware('auth')->name('leave-request.create');
Route::post('/leave-request/create', [LeaveRequestController::class, 'store'])->middleware('auth')->name('leave-request.store');
Route::get('/leave-requests', [LeaveRequestController::class, 'index'])->middleware('auth')->name('leave-request.index');
Route::get('/leave-request/{leaveRequest}', [LeaveRequestController::class, 'show'])->middleware('auth')->name('leave-request.show');
Route::put('/leave-request/{leaveRequest}', [LeaveRequestController::class, 'update'])->middleware('auth')->name('leave-request.update');
//TODO: fix delete route
Route::delete('/leave-request/{leaveRequest}', [LeaveRequestController::class, 'destroy'])->middleware('auth')->name('leave-request.destroy');

// Auth Routes

Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/users', [UserController::class, 'store']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
