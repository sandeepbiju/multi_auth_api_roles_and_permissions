<?php

use App\Http\Controllers\SuperAdmin\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Auth::routes();

Route::middleware(['auth', 'user-access:super-admin'])->group(function () {
  
    Route::get('/super-admin/home', [HomeController::class, 'superAdminHome'])->name('super-admin.home');
});
  