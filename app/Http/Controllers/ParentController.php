<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class ParentController extends Controller
{
    public function showAccessForm()
    {
        return view('parent.access');
    }

    public function verifyStudent(Request $request)
    {
        $request->validate([
            'student_identifier' => 'required|string|min:3',
            'student_id_card' => 'required|digits:13'
        ], [
            'student_id_card.required' => 'กรุณากรอกเลขบัตรประชาชนนักเรียน',
            'student_id_card.digits' => 'เลขบัตรประชาชนต้องเป็นตัวเลข 13 หลักเท่านั้น'
        ]);

        $identifier = $request->student_identifier;
        $idCard = $request->student_id_card;
        
        // ตรวจสอบว่าเป็นรหัสนักเรียนหรือชื่อ
        if (preg_match('/^\d{10}$/', $identifier)) {
            // กรณีค้นหาด้วยรหัสนักเรียน
            $student = Student::where('student_id', $identifier)
                            ->where('id_card', $idCard)
                            ->first();
        } else {
            // กรณีค้นหาด้วยชื่อ
            $student = Student::where('name', 'LIKE', "%{$identifier}%")
                            ->where('id_card', $idCard)
                            ->first();
        }

        if (!$student) {
            return back()->withErrors([
                'student_identifier' => 'ไม่พบข้อมูลนักเรียน หรือข้อมูลไม่ตรงกัน กรุณาตรวจสอบอีกครั้ง'
            ]);
        }

        // สร้าง token และ redirect ไปหน้ารายงาน
        $accessToken = Str::random(60);
        Cache::put("parent_access_{$accessToken}", $student->id, now()->addHours(24));

        return redirect()->route('parent.student.report', [
            'studentId' => $student->id,
            'token' => $accessToken
        ]);
    }

    public function showStudentReport($studentId)
    {
        // ดึงข้อมูลนักเรียนและประวัติพฤติกรรม
        $student = Student::with(['behaviorRecords' => function($query) {
            $query->latest();
        }])->findOrFail($studentId);

        return view('parent.report', compact('student'));
    }
}