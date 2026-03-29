<?php

use App\Http\Controllers\OpdController;
use App\Http\Controllers\ProfileController;
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
});

Route::middleware('auth')->group(function () {

    Route::get('opd', [\App\Http\Controllers\OpdController::class, 'index'])->name('opd');
    Route::get('opd/create', [\App\Http\Controllers\OpdController::class, 'create'])->name('opd.create');
    Route::get('opd/{instansi}/edit', [\App\Http\Controllers\OpdController::class, 'edit'])->name('opd.edit');
    Route::post('opd/store', [\App\Http\Controllers\OpdController::class, 'store'])->name('opd.store');
    Route::put('opd/{instansi}/update', [\App\Http\Controllers\OpdController::class, 'update'])->name('opd.update');
    Route::delete('opd/{instansi}', action: [\App\Http\Controllers\OpdController::class, 'destroy'])->name('opd.destroy');

    Route::get('/permission',[\App\Http\Controllers\PermissionController::class,'index'])->name('permission');
    Route::get('/role',[\App\Http\Controllers\RoleController::class,'index'])->name('role');
});

require __DIR__. '/auth.php';

