<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BehaviorController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ParentManagementController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Auth Routes 
Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login')
    ->middleware('guest');
    
Route::post('/login', [LoginController::class, 'login'])
    ->middleware('guest');
    
Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

// Route สำหรับหน้า Dashboard ตามประเภทผู้ใช้
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $user = auth()->user();
        
        // นำทางไปตาม role
        switch ($user->users_role) {
            case 'teacher':
                return redirect()->route('behavior.dashboard');
            case 'student':
                $student = $user->student;
                if ($student) {
                    return redirect()->route('behavior.students.show', ['id' => $student->students_id]);
                }
                return view('dashboard');
            case 'parent':
                $parent = $user->parent;
                if ($parent && $parent->student) {
                    return redirect()->route('behavior.students.show', ['id' => $parent->student->students_id]);
                }
                return view('dashboard');
            default:
                return view('dashboard');
        }
    })->name('dashboard');
});

// Behavior Routes - จัดการพฤติกรรมนักเรียน
Route::prefix('behavior')->name('behavior.')->middleware(['auth'])->group(function () {
    // หน้า Dashboard สำหรับครู
    Route::get('/dashboard', [BehaviorController::class, 'dashboard'])->name('dashboard');
    
    // ระบบการแจ้งเตือน
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
    Route::post('/notifications/mark-read', [NotificationController::class, 'markAsRead'])->name('notifications.mark-read');
    
    // จัดการโปรไฟล์ผู้ใช้งาน
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
    Route::put('/profile/update-preferences', [ProfileController::class, 'updatePreferences'])->name('profile.update.preferences');
    
    // การตั้งค่าระบบ
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings')->middleware('role:teacher');
    Route::put('/settings/update', [SettingsController::class, 'update'])->name('settings.update')->middleware('role:teacher');
    
    // หน้าแสดงข้อมูลนักเรียนรายบุคคล (ใช้สำหรับนักเรียนและผู้ปกครอง)
    Route::get('/students/{id}', [BehaviorController::class, 'showStudent'])->name('students.show');
    
    // หน้าสำหรับครูเท่านั้น
    Route::middleware(['role:teacher'])->group(function () {
        // การจัดการนักเรียน
        Route::get('/students', [BehaviorController::class, 'students'])->name('students');
        Route::get('/students/create', [BehaviorController::class, 'createStudent'])->name('students.create');
        Route::post('/students', [BehaviorController::class, 'storeStudent'])->name('students.store');
        Route::get('/students/{id}/edit', [BehaviorController::class, 'editStudent'])->name('students.edit');
        Route::put('/students/{id}', [BehaviorController::class, 'updateStudent'])->name('students.update');
        Route::delete('/students/{id}', [BehaviorController::class, 'destroyStudent'])->name('students.destroy');
        
        // การหักคะแนนพฤติกรรม
        Route::get('/deduct', [BehaviorController::class, 'deduct'])->name('deduct');
        Route::post('/deduct', [BehaviorController::class, 'processDeduct'])->name('deduct.process');
        
        // การดูรายงาน
        Route::get('/reports', [ReportController::class, 'index'])->name('reports');
        Route::get('/reports/export', [ReportController::class, 'exportPdf'])->name('reports.export');
        Route::get('/reports/student/{id}', [ReportController::class, 'studentDetail'])->name('reports.student');
        Route::get('/reports/student/{id}/export', [ReportController::class, 'exportPdf'])->name('reports.student.export');
        
        // การจัดการผู้ปกครอง
        Route::prefix('parents')->name('parents.')->group(function () {
            Route::get('/', [ParentManagementController::class, 'index'])->name('index');
            Route::get('/create', [ParentManagementController::class, 'create'])->name('create');
            Route::post('/', [ParentManagementController::class, 'store'])->name('store');
            Route::get('/{id}', [ParentManagementController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [ParentManagementController::class, 'edit'])->name('edit');
            Route::put('/{id}', [ParentManagementController::class, 'update'])->name('update');
            Route::delete('/{id}', [ParentManagementController::class, 'destroy'])->name('destroy');
        });
    });
});

// Student Routes - จัดการข้อมูลนักเรียนจากเมนูหลัก
Route::prefix('students')->name('students.')->middleware(['auth', 'role:teacher'])->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('index');
    Route::get('/create', [StudentController::class, 'create'])->name('create');
    Route::post('/', [StudentController::class, 'store'])->name('store');
    Route::get('/{id}', [StudentController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [StudentController::class, 'edit'])->name('edit');
    Route::put('/{id}', [StudentController::class, 'update'])->name('update');
    Route::delete('/{id}', [StudentController::class, 'destroy'])->name('destroy');
    Route::post('/import', [StudentController::class, 'import'])->name('import');
    Route::get('/export', [StudentController::class, 'export'])->name('export');
});

// Parent Access Routes - สำหรับการเข้าถึงของผู้ปกครองภายนอก
Route::prefix('parent')->name('parent.')->group(function () {
    Route::get('/access', [ParentController::class, 'showAccessForm'])->name('access');
    Route::post('/verify', [ParentController::class, 'verifyStudent'])->name('verify');
    Route::get('/student/{studentId}/report', [ParentController::class, 'showStudentReport'])
        ->name('student.report')
        ->middleware('verify.parent.access');
});

// Profile Routes - เข้าถึงได้จากเมนูหลัก
Route::prefix('profile')->name('profile.')->middleware(['auth'])->group(function () {
    Route::get('/', [ProfileController::class, 'show'])->name('show');
    Route::put('/update', [ProfileController::class, 'update'])->name('update');
    Route::put('/update-password', [ProfileController::class, 'updatePassword'])->name('update.password');
    Route::put('/update-preferences', [ProfileController::class, 'updatePreferences'])->name('update.preferences');
});
