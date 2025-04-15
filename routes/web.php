<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BehaviorController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SettingsController;

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

    // หน้าหลักจัดการนักเรียน
    Route::get('/students', [App\Http\Controllers\BehaviorController::class, 'students'])->name('students');
    
    // เพิ่ม route สำหรับ create
    Route::get('/students/create', [App\Http\Controllers\BehaviorController::class, 'createStudent'])->name('students.create');
    Route::post('/students', [App\Http\Controllers\BehaviorController::class, 'storeStudent'])->name('students.store');
    
    // หน้าแสดงรายละเอียดนักเรียน
    Route::get('/students/{id}', [App\Http\Controllers\BehaviorController::class, 'showStudent'])->name('students.show');
    
    // เพิ่ม route อื่นๆ สำหรับนักเรียน เช่น แก้ไข ลบ ฯลฯ
    Route::get('/students/{id}/edit', [App\Http\Controllers\BehaviorController::class, 'editStudent'])->name('students.edit');
    Route::put('/students/{id}', [App\Http\Controllers\BehaviorController::class, 'updateStudent'])->name('students.update');
    Route::delete('/students/{id}', [App\Http\Controllers\BehaviorController::class, 'destroyStudent'])->name('students.destroy');
    
    // Route สำหรับการแจ้งเตือน
    Route::get('/notification', [NotificationController::class, 'index'])->name('notifications');
    Route::post('/notification/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
    
    // เพิ่ม routes สำหรับการแจ้งเตือน
    Route::get('/notifications', [App\Http\Controllers\NotificationController::class, 'index'])
        ->name('notifications');
    Route::post('/notifications/mark-read', [App\Http\Controllers\NotificationController::class, 'markAsRead'])
        ->name('notifications.mark-read');

    // เส้นทางสำหรับหน้าตั้งค่า
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    
    // เส้นทางสำหรับบันทึกการตั้งค่าในแต่ละส่วน
    Route::post('/settings/save-school', [SettingsController::class, 'saveSchoolSettings'])->name('settings.save-school');
    Route::post('/settings/save-academic', [SettingsController::class, 'saveAcademicSettings'])->name('settings.save-academic');
    Route::post('/settings/save-system', [SettingsController::class, 'saveSystemSettings'])->name('settings.save-system');
    
    // เพิ่ม routes สำหรับการบันทึกการตั้งค่า
    Route::post('/behavior/settings/save-school', [SettingsController::class, 'saveSchoolSettings'])->name('behavior.settings.save-school');
    Route::post('/settings/save-academic', [SettingsController::class, 'saveAcademicSettings'])->name('settings.save-academic');
    Route::post('/settings/save-system', [SettingsController::class, 'saveSystemSettings'])->name('settings.save-system');
});

// Student Routes - จัดการข้อมูลนักเรียน
Route::prefix('students')->name('students.')->group(function () {
    Route::get('/', [App\Http\Controllers\StudentController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\StudentController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\StudentController::class, 'store'])->name('store');
    Route::get('/{id}', [App\Http\Controllers\StudentController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [App\Http\Controllers\StudentController::class, 'edit'])->name('edit');
    Route::put('/{id}', [App\Http\Controllers\StudentController::class, 'update'])->name('update');
    Route::delete('/{id}', [App\Http\Controllers\StudentController::class, 'destroy'])->name('destroy');
    Route::post('/import', [App\Http\Controllers\StudentController::class, 'import'])->name('import');
    Route::get('/export', [App\Http\Controllers\StudentController::class, 'export'])->name('export');
});

// Parent Access Routes
Route::prefix('parent')->name('parent.')->group(function () {
    Route::get('/access', [ParentController::class, 'showAccessForm'])->name('access');
    Route::post('/verify', [ParentController::class, 'verifyStudent'])->name('verify');
    Route::get('/student/{studentId}/report', [ParentController::class, 'showStudentReport'])
        ->name('student.report')
        ->middleware('verify.parent.access');
});

// เพิ่ม route สำหรับ profile
Route::prefix('profile')->name('profile.')->group(function () {
    Route::get('/', [ProfileController::class, 'show'])->name('show');
    Route::put('/update', [ProfileController::class, 'update'])->name('update');
});

// เพิ่มเส้นทางสำหรับจัดการผู้ปกครอง
Route::prefix('behavior')->name('behavior.')->group(function () {
    Route::prefix('parents')->name('parents.')->group(function () {
        Route::get('/', [App\Http\Controllers\ParentManagementController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\ParentManagementController::class, 'create'])->name('create');
        Route::post('/', [App\Http\Controllers\ParentManagementController::class, 'store'])->name('store');
        Route::get('/{id}', [App\Http\Controllers\ParentManagementController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [App\Http\Controllers\ParentManagementController::class, 'edit'])->name('edit');
        Route::put('/{id}', [App\Http\Controllers\ParentManagementController::class, 'update'])->name('update');
        Route::delete('/{id}', [App\Http\Controllers\ParentManagementController::class, 'destroy'])->name('destroy');
    });
});
