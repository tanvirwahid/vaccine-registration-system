<?php

use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NidDataFinderController;
use App\Http\Controllers\RegistrationController;


Route::get('/', [RegistrationController::class, 'show'])->name('register');

Route::post('/find-user', [NidDataFinderController::class, 'findUserData'])->name('data.find');
Route::post('/users', [RegistrationController::class, 'store'])->name('users.store');
Route::get('/status/search', [StatusController::class, 'index'])->name('status.index');
Route::get('/status', [StatusController::class, 'show'])->name('status.show');
