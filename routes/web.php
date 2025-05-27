<?php

use App\Http\Controllers\LeaveRequestController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LeaveRequestController::class, 'index'])->name('leave-request.index');
Route::get('/create', [LeaveRequestController::class, 'create'])->name('leave-request.create');
Route::post('/', [LeaveRequestController::class, 'store'])->name('leave-request.store');