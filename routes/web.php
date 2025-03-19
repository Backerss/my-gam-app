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

// Auth Routes - ใช้ template ตรงๆ ไม่ผ่าน layout
Route::get('/login', function() {
    return view('auth.login'); // ใช้หน้า login แบบ standalone
})->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Behavior Routes - หน้าอื่นที่ใช้ layout
Route::get('/behavior/deduct', [BehaviorController::class, 'deduct'])->name('behavior.deduct');

// Report routes
Route::get('/reports/behavior', [ReportController::class, 'behavior'])->name('reports.behavior');
Route::get('/reports/behavior/student/{id}', [ReportController::class, 'studentDetail'])->name('reports.student.detail');
Route::get('/reports/behavior/export', [ReportController::class, 'exportPdf'])->name('reports.export');
Route::get('/reports/behavior/export/{id}', [ReportController::class, 'exportPdf'])->name('reports.export.student');
