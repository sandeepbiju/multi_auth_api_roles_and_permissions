<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Auth::routes();

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/home', [HomeController::class, 'adminHome'])->name('admin.home');
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
    });
});
