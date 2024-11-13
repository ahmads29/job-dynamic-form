<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FormFieldController;

// Public route for the job application form
Route::get('/', [FormController::class, 'index'])->name('form.index');
Route::post('/submit', [FormController::class, 'store'])->name('form.submit');

// Admin Login routes
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');

// Protected routes for the Admin Dashboard (requires auth middleware)
Route::middleware('auth:admin')->group(function () {
    
    // Admin Dashboard route
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    
    // CRUD routes for form fields management
    Route::resource('/admin/form-fields', FormFieldController::class)->except(['show']);
    
    // Route to handle logout if needed
    Route::post('/admin/logout', function () {
        Auth::logout();
        return redirect()->route('admin.login.form');
    })->name('admin.logout');

    // Show the login form
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

// Handle the login form submission
Route::post('login', [LoginController::class, 'login'])->name('login.submit');

// Logout route
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
