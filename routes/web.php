<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SysAdminController;
use App\Http\Controllers\EmailController;

Route::middleware(['auth'])->group(function () {
    Route::post('/register', [UserController::class, 'register']);
});

Route::middleware(['auth'])->group(function () {
    Route::post('/admin/register', [SysAdminController::class, 'register']);
});

// Rutas para el controlador de correos electrónicos
Route::middleware(['auth'])->group(function () {
    Route::post('/send-emails', [EmailController::class, 'sendEmailsToUsersAndAdmins']);
});

