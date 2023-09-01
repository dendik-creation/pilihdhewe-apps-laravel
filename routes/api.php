<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriveController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GDriveController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Without Auth Route
Route::get('/events/{id}', [EventController::class, 'show']);
Route::get('/events', [EventController::class, 'index']);

Route::post('/auth/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Admin Only
    Route::group(['middleware' => 'adminOnly'], function () {
        // Handle Events
        Route::post('/events', [EventController::class, 'store']);
        Route::put('/events/{id}', [EventController::class, 'update']);
        Route::delete('/events/{id}', [EventController::class, 'destroy']);
        Route::get('/latest-event', [EventController::class, 'latestEvent']);

        // Handle Candidate
        Route::post('/candidates', [CandidateController::class, 'store']);
        Route::put('/candidates/{id}', [CandidateController::class, 'update']);
        Route::delete('/candidates/{eventId}/{userId}', [CandidateController::class, 'destroy']);

        // Handle Siswa
        Route::get('/siswa-all', [SiswaController::class, 'index']);
        Route::get('/siswa/{id}', [SiswaController::class, 'edit']);
        Route::put('/siswa/reset-password/{id}', [SiswaController::class, 'resetPassword']);
        Route::post('/siswa', [SiswaController::class, 'store']);
        Route::delete('/siswa/{id}', [SiswaController::class, 'destroy']);
    });

    // Votes
    Route::post('/votes', [ResultController::class, 'store'])->middleware(['isVoted', 'isAdmin', 'isActive']);

    // User Methods Siswa or Admin
    Route::get('/me', [SiswaController::class, 'me']);
    Route::put('/siswa/{id}', [SiswaController::class, 'update']);
    Route::post('/img-update', [SiswaController::class, 'updateImg']);

    Route::post('/check-password', [SiswaController::class, 'checkPass']);
    Route::put('/change-password', [SiswaController::class, 'changePass']);

    // Check After Voted
    Route::get('/isMyVoted', [ResultController::class, 'index']);
    Route::get('/isMyVoted/{id}', [ResultController::class, 'show']);

    // List Kelas
    Route::get('/kelas', [KelasController::class, 'index']);
});
