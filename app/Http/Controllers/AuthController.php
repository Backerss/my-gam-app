<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
/*use App\Models\Student;
use App\Models\Parent;
use App\Models\Teacher;*/
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // ตรวจสอบประเภทการเข้าสู่ระบบ
        $loginType = $request->input('login_type', 'email');

        if ($loginType === 'email') {
            // การล็อกอินด้วย email สำหรับนักเรียนและครู
            return $this->authenticateWithEmail($request);
        } else {
            // การล็อกอินด้วยเบอร์โทรศัพท์สำหรับผู้ปกครอง
            return $this->authenticateParent($request);
        }
    }

    protected function authenticateWithEmail(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $user = Auth::user();
            
            // ดึงข้อมูลเพิ่มเติมตาม role
            if ($user->users_role === 'student') {
                // ดึงข้อมูลนักเรียน
                $student = DB::table('students')->where('users_id', $user->users_id)->first();
                session(['student_data' => $student]);
                $redirectPath = '/students/dashboard'; // กำหนด path ที่จะ redirect สำหรับนักเรียน
            } elseif ($user->users_role === 'teacher') {
                // ดึงข้อมูลครู
                $teacher = DB::table('teachers')->where('users_id', $user->users_id)->first();
                session(['teacher_data' => $teacher]);
                $redirectPath = '/behavior/deduct'; // กำหนด path ที่จะ redirect สำหรับครู
            } else {
                $redirectPath = '/behavior/deduct'; // default path
            }

            $request->session()->regenerate();
            return redirect()->intended($redirectPath);
        }

        return back()->withErrors([
            'email' => 'ข้อมูลเข้าสู่ระบบไม่ถูกต้อง',
        ])->onlyInput('email');
    }

    protected function authenticateParent(Request $request)
    {
        $request->validate([
            'phone' => ['required', 'string'],
            'student_id' => ['required', 'string'],
        ]);

        // ค้นหาข้อมูลผู้ปกครองจากเบอร์โทร
        $user = User::where('users_phone', $request->phone)
                    ->where('users_role', 'parent')
                    ->first();

        if (!$user) {
            return back()->withErrors([
                'phone' => 'ไม่พบข้อมูลผู้ปกครองจากเบอร์โทรศัพท์นี้',
            ]);
        }

        // ค้นหาข้อมูลนักเรียนจากรหัสนักเรียน
        $student = DB::table('students')
                    ->where('student_id', $request->student_id)
                    ->first();

        if (!$student) {
            return back()->withErrors([
                'student_id' => 'รหัสนักเรียนไม่ถูกต้อง',
            ]);
        }

        // ตรวจสอบความสัมพันธ์ระหว่างผู้ปกครองกับนักเรียน
        $parent = DB::table('parents')
                    ->where('users_id', $user->users_id)
                    ->where('student_id', $student->student_id)
                    ->first();

        if (!$parent) {
            return back()->withErrors([
                'student_id' => 'ไม่พบความสัมพันธ์ระหว่างผู้ปกครองกับนักเรียนคนนี้',
            ]);
        }

        // ล็อกอินให้ผู้ปกครอง
        Auth::login($user, $request->boolean('remember'));
        session(['parent_data' => $parent, 'student_data' => $student]);
        
        $request->session()->regenerate();
        return redirect()->intended('/parent/student/report');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}