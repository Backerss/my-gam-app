<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BehaviorController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ParentController;

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

// Behavior Routes - ไม่มีการตรวจสอบสิทธิ์
Route::prefix('behavior')->name('behavior.')->group(function () {
    // Dashboard - เป็นหน้าแรก
    Route::get('/', [BehaviorController::class, 'dashboard'])->name('dashboard');
    
    // หน้าตัดคะแนน
    Route::get('/deduct', [BehaviorController::class, 'deduct'])->name('deduct');
    
    // รายงานต่างๆ
    Route::get('/reports', [ReportController::class, 'index'])->name('reports');
    Route::get('/reports/student/{id}', [ReportController::class, 'studentDetail'])->name('reports.student');
    Route::get('/reports/export', [ReportController::class, 'exportPdf'])->name('reports.export');
    Route::get('/reports/student/{id}/export', [ReportController::class, 'exportPdf'])->name('reports.student.export');

    // หน้าโปรไฟล์
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Parent Access Routes
Route::prefix('parent')->name('parent.')->group(function () {
    Route::get('/access', [ParentController::class, 'showAccessForm'])->name('access');
    Route::post('/verify', [ParentController::class, 'verifyStudent'])->name('verify');
    Route::get('/student/{studentId}/report', [ParentController::class, 'showStudentReport'])
        ->name('student.report')
        ->middleware('verify.parent.access');
});
