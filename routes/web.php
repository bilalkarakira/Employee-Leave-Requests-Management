<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeaveRequestController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Leave Request Routes

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/leave-request/create', [LeaveRequestController::class, 'create'])->middleware('auth')->name('leave-request.create');
Route::post('/leave-request/create', [LeaveRequestController::class, 'store'])->middleware('auth')->name('leave-request.store');
Route::get('/leave-requests', [LeaveRequestController::class, 'index'])->middleware('auth')->name('leave-request.index');
Route::get('/leave-request/{leaveRequest}', [LeaveRequestController::class, 'show'])->middleware('auth')->name('leave-request.show');

// Auth Routes

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
