<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        // ใช้ middleware ผ่าน Route แทน
    }

    public function showLoginForm()
    {
        // กำหนดค่า isTeacher เป็น false เนื่องจากก่อนการ login จะยังไม่มีการตรวจสอบ role
        $isTeacher = false;
        $student = new \stdClass(); // สร้างออบเจกต์เปล่าเพื่อป้องกัน Undefined variable $student
        return view('auth.login', compact('isTeacher', 'student'));
    }

    public function login(Request $request)
    {
        $loginType = $request->input('login_type');

        if ($loginType === 'email') {
            return $this->handleEmailLogin($request);
        } elseif ($loginType === 'phone') {
            return $this->handleParentLogin($request);
        }

        return back()->with('error', 'ประเภทการเข้าสู่ระบบไม่ถูกต้อง');
    }

    // จัดการการเข้าสู่ระบบด้วย Email (สำหรับครู/นักเรียน)
    protected function handleEmailLogin(Request $request)
    {
        $this->validateEmailLogin($request);

        $user = User::where('users_email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->users_password)) {
            throw ValidationException::withMessages([
                'email' => ['อีเมลหรือรหัสผ่านไม่ถูกต้อง'],
            ]);
        }

        Auth::login($user, $request->filled('remember'));

        return $this->authenticated($request, $user);
    }

    // ตรวจสอบข้อมูลจากฟอร์มสำหรับการเข้าสู่ระบบด้วย Email
    protected function validateEmailLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    }

    // จัดการการเข้าสู่ระบบด้วยเบอร์โทร (สำหรับผู้ปกครอง)
    protected function handleParentLogin(Request $request)
    {
        $this->validateParentLogin($request);

        // ค้นหาผู้ใช้จากเบอร์โทร
        $user = User::where('users_phone', $request->phone)
            ->where('users_role', 'parent')
            ->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'phone' => ['ไม่พบข้อมูลผู้ปกครองจากเบอร์โทรศัพท์นี้'],
            ]);
        }

        // ค้นหานักเรียนจากรหัสนักเรียน
        $student = Student::where('students_code', $request->student_id)->first();

        if (!$student) {
            throw ValidationException::withMessages([
                'student_id' => ['ไม่พบข้อมูลนักเรียนจากรหัสที่ระบุ'],
            ]);
        }

        // ตรวจสอบว่าผู้ปกครองเป็นผู้ปกครองของนักเรียนคนนี้หรือไม่
        $isParentOfStudent = $user->parent()->where('students_id', $student->students_id)->exists();

        if (!$isParentOfStudent) {
            throw ValidationException::withMessages([
                'student_id' => ['ข้อมูลไม่ตรงกัน ไม่พบความเชื่อมโยงระหว่างผู้ปกครองและนักเรียน'],
            ]);
        }

        Auth::login($user, $request->filled('remember'));

        return $this->authenticated($request, $user);
    }

    // ตรวจสอบข้อมูลจากฟอร์มสำหรับการเข้าสู่ระบบด้วยเบอร์โทร
    protected function validateParentLogin(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'student_id' => 'required|string',
        ]);
    }

    // หลังจากเข้าสู่ระบบสำเร็จ
    protected function authenticated(Request $request, $user)
    {
        // เรียบง่าย: แค่ตรวจสอบ role และนำทางไปยังหน้าที่เหมาะสม
        switch ($user->users_role) {
            case 'teacher':
                // ครูไปยังหน้า dashboard ปกติ
                return redirect()->route('behavior.dashboard');
                
            case 'student':
                // นักเรียนไปยังหน้าข้อมูลของตนเอง
                $student = $user->student;
                if ($student) {
                    return redirect()->route('behavior.students.show', ['id' => $student->students_id]);
                }
                return redirect()->route('dashboard');
                
            case 'parent':
                // ผู้ปกครองไปยังหน้าข้อมูลของนักเรียนที่เป็นบุตรหลาน
                $parent = $user->parent;
                if ($parent) {
                    return redirect()->route('behavior.students.show', ['id' => $parent->students_id]);
                }
                return redirect()->route('dashboard');
                
            default:
                return redirect()->route('dashboard');
        }
    }

    // ออกจากระบบ
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}