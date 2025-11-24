<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeDashboardController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\ManagerDashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/register');
});

// Redirect user based on role
Route::get('/dashboard', function () {
    $user = auth()->user();

    if (! $user) return redirect()->route('login');

    if ($user->role === 'admin') return redirect()->route('admin.dashboard');
    if ($user->role === 'manager') return redirect()->route('manager.dashboard');

    // default: employee
    return redirect()->route('employee.dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');


// Routes that require authentication
Route::middleware('auth')->group(function () {

    // ================= EMPLOYEE =================
    Route::get('/employee/dashboard', function () {
        if (auth()->user()->role !== 'employee') abort(403);
        return app(EmployeeDashboardController::class)->index();
    })->name('employee.dashboard');

    Route::get('/apply-leave', [LeaveController::class, 'create'])->name('apply.leave');
    Route::post('/apply-leave', [LeaveController::class, 'store'])->name('leave.store');


    // ================= MANAGER =================
    Route::get('/manager/dashboard', function () {
        if (! in_array(auth()->user()->role, ['admin', 'manager'])) abort(403);
        return app(ManagerDashboardController::class)->index();
    })->name('manager.dashboard');

    Route::post('/leave/approve/{id}', [ManagerDashboardController::class, 'approve'])->name('leave.approve');
    Route::post('/leave/reject/{id}', [ManagerDashboardController::class, 'reject'])->name('leave.reject');


    // ================= ADMIN =================
    Route::get('/admin/dashboard', function () {
        if (auth()->user()->role !== 'admin') abort(403);
        return app(AdminDashboardController::class)->index();
    })->name('admin.dashboard');

    Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users');
    Route::post('/admin/users/update-role/{id}', [AdminController::class, 'updateRole'])->name('admin.updateRole');


    // ================= PROFILE =================
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
