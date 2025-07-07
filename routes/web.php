<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Permission
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permission.index');
    Route::post('/permissions', [PermissionController::class, 'store'])->name('permission.store');
    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permission.create');
    Route::get('/permissions/{id}/edit', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::post('/permissions/{id}', [PermissionController::class, 'update'])->name('permission.update');
    Route::delete('/permissions/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy');

    // Role
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::post('/roles/{id}', [RoleController::class,'update'])->name('roles.update');
    Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');


    // Jobs
    Route::get('/jobs',[JobController::class,'index'])->name('jobPost.index');
    Route::post('/jobs',[JobController::class,'store'])->name('jobPost.store');
    Route::get('/jobs/create',[JobController::class,'create'])->name('jobPost.create');
    Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobPost.show');
});

require __DIR__ . '/auth.php';
