<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeDashboardController;
use App\Http\Controllers\LeaveController;

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
    return redirect('/register');
});

Route::get('/dashboard', function () {
    $user = auth()->user();

    if(! $user) return redirect()->route('login');
    if($user->role == 'manager') return redirect()->route('manager.dashboard');

    return redirect()->route('employee.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Employee dashboard
    Route::get('/employee/dashboard', function() {
        if(auth()->user()->role !== 'employee') abort(403);
        return app(EmployeeDashboardController::class)->index();
    })->name('employee.dashboard');

    // Apply Leave (GET form)
    Route::get('/apply-leave', [LeaveController::class, 'create'])
        ->name('apply.leave');

    // Apply Leave (POST form submit)
    Route::post('/apply-leave', [LeaveController::class, 'store'])
        ->name('leave.store');

    // Manager dashboard
    Route::get('/manager/dashboard', function() {
        if(auth()->user()->role !== 'manager') abort(403);
        return view('manager.dashboard');
    })->name('manager.dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
