<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BehaviorController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Auth Routes 
Route::get('/login', function() {
    return view('auth.login');
})->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', function() {
    return view('auth.register');
})->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Behavior Routes
Route::prefix('behavior')->name('behavior.')->group(function () {
    // หน้าตัดคะแนน
    Route::get('/deduct', [BehaviorController::class, 'deduct'])->name('deduct');
    
    // รายงานต่างๆ ย้ายมาอยู่ภายใต้ behavior
    Route::get('/reports', [ReportController::class, 'index'])->name('reports');
    Route::get('/reports/student/{id}', [ReportController::class, 'studentDetail'])->name('reports.student');
    Route::get('/reports/export', [ReportController::class, 'exportPdf'])->name('reports.export');
    Route::get('/reports/student/{id}/export', [ReportController::class, 'exportPdf'])->name('reports.student.export');
});
