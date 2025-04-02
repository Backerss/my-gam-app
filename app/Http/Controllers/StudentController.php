<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        // ในระบบจริง ดึงข้อมูลจาก Database
        $students = [
            ['id' => 'ST001', 'name' => 'ธงชัย ใจดี', 'class' => 'ม.1/1', 'student_id' => '1234567890', 'current_score' => 95, 'behavior_count' => 3],
            ['id' => 'ST002', 'name' => 'สมศรี รักเรียน', 'class' => 'ม.1/1', 'student_id' => '1234567891', 'current_score' => 100, 'behavior_count' => 0],
            ['id' => 'ST003', 'name' => 'ประเสริฐ มุ่งมั่น', 'class' => 'ม.2/1', 'student_id' => '1234567892', 'current_score' => 85, 'behavior_count' => 2],
            ['id' => 'ST004', 'name' => 'มนัสนันท์ พากเพียร', 'class' => 'ม.3/1', 'student_id' => '1234567893', 'current_score' => 70, 'behavior_count' => 5],
            ['id' => 'ST005', 'name' => 'สมชาย มานะ', 'class' => 'ม.1/2', 'student_id' => '1234567894', 'current_score' => 90, 'behavior_count' => 1],
            ['id' => 'ST006', 'name' => 'วันดี แสนสุข', 'class' => 'ม.2/2', 'student_id' => '1234567895', 'current_score' => 88, 'behavior_count' => 2],
            ['id' => 'ST007', 'name' => 'มานี รักษาดี', 'class' => 'ม.2/1', 'student_id' => '1234567896', 'current_score' => 92, 'behavior_count' => 1],
            ['id' => 'ST008', 'name' => 'สมหญิง ใจงาม', 'class' => 'ม.3/2', 'student_id' => '1234567897', 'current_score' => 78, 'behavior_count' => 4],
        ];

        // ข้อมูลชั้นเรียน
        $classDistribution = [
            'ม.1/1' => 30,
            'ม.1/2' => 32,
            'ม.2/1' => 28,
            'ม.2/2' => 27,
            'ม.3/1' => 25,
            'ม.3/2' => 30,
        ];

        // สรุปคะแนนตามช่วง
        $scoreRanges = [
            '90-100' => 45,
            '80-89' => 35,
            '70-79' => 25,
            '60-69' => 10,
            'ต่ำกว่า 60' => 5
        ];

        return view('students.index', compact('students', 'classDistribution', 'scoreRanges'));
    }

    public function create()
    {
        // ข้อมูลชั้นเรียน (สำหรับ dropdown ในฟอร์ม)
        $classes = [
            'ม.1/1', 'ม.1/2', 'ม.1/3',
            'ม.2/1', 'ม.2/2', 'ม.2/3',
            'ม.3/1', 'ม.3/2', 'ม.3/3',
        ];

        return view('students.create', compact('classes'));
    }

    public function store(Request $request)
    {
        // ในระบบจริง บันทึกข้อมูลลงฐานข้อมูล
        $request->validate([
            'student_id' => 'required|string|min:10|max:10',
            'id_card' => 'required|string|min:13|max:13',
            'name' => 'required|string|max:255',
            'class' => 'required|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'parent_name' => 'nullable|string',
            'parent_phone' => 'nullable|string',
        ]);

        // บันทึกข้อมูล...

        return redirect()->route('students.index')->with('success', 'เพิ่มข้อมูลนักเรียนสำเร็จ');
    }

    public function show($id)
    {
        // ในระบบจริง ดึงข้อมูลจาก Database ตาม ID
        $student = [
            'id' => $id,
            'name' => 'ธงชัย ใจดี',
            'class' => 'ม.1/1',
            'student_id' => '1234567890',
            'id_card' => '1234567890123',
            'current_score' => 95,
            'score_change' => 5,
            'address' => '123 หมู่ 5 ต.สันทราย อ.เมือง จ.เชียงใหม่ 50000',
            'phone' => '081-234-5678',
            'parent_name' => 'นายสมพงษ์ ใจดี',
            'parent_phone' => '089-876-5432',
            'incidents' => [
                ['date' => '2023-09-15', 'description' => 'มาสาย', 'points' => -5],
                ['date' => '2023-10-05', 'description' => 'ช่วยเหลืองานครู', 'points' => 10],
                ['date' => '2023-10-15', 'description' => 'ช่วยเพื่อนเก็บขยะ', 'points' => 5],
            ],
        ];

        return view('students.show', compact('student'));
    }

    public function edit($id)
    {
        // ในระบบจริง ดึงข้อมูลจาก Database ตาม ID
        $student = [
            'id' => $id,
            'name' => 'ธงชัย ใจดี',
            'class' => 'ม.1/1',
            'student_id' => '1234567890',
            'id_card' => '1234567890123',
            'address' => '123 หมู่ 5 ต.สันทราย อ.เมือง จ.เชียงใหม่ 50000',
            'phone' => '081-234-5678',
            'parent_name' => 'นายสมพงษ์ ใจดี',
            'parent_phone' => '089-876-5432',
        ];

        // ข้อมูลชั้นเรียน (สำหรับ dropdown ในฟอร์ม)
        $classes = [
            'ม.1/1', 'ม.1/2', 'ม.1/3',
            'ม.2/1', 'ม.2/2', 'ม.2/3',
            'ม.3/1', 'ม.3/2', 'ม.3/3',
        ];

        return view('students.edit', compact('student', 'classes'));
    }

    public function update(Request $request, $id)
    {
        // ในระบบจริง อัพเดทข้อมูลในฐานข้อมูล
        $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'parent_name' => 'nullable|string',
            'parent_phone' => 'nullable|string',
        ]);

        // บันทึกข้อมูล...

        return redirect()->route('students.show', $id)->with('success', 'อัพเดทข้อมูลนักเรียนสำเร็จ');
    }

    public function destroy($id)
    {
        // ในระบบจริง ลบข้อมูลจากฐานข้อมูล

        return redirect()->route('students.index')->with('success', 'ลบข้อมูลนักเรียนสำเร็จ');
    }

    public function import(Request $request)
    {
        // ในระบบจริง ทำการนำเข้าข้อมูลจากไฟล์ CSV
        $request->validate([
            'file' => 'required|file|mimes:csv,txt|max:2048',
        ]);

        // โค้ดนำเข้าข้อมูล...

        return redirect()->route('students.index')->with('success', 'นำเข้าข้อมูลนักเรียนสำเร็จ');
    }

    public function export()
    {
        // ในระบบจริง ส่งออกข้อมูลเป็นไฟล์ CSV

        return redirect()->route('students.index')->with('success', 'ส่งออกข้อมูลนักเรียนสำเร็จ');
    }
}