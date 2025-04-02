<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BehaviorController extends Controller
{
    public function deduct()
    {
        return view('behavior.deduct');
    }

    public function dashboard()
    {
        // ข้อมูลสรุปทั้งหมด
        $summary = [
            'total_students' => 120,
            'average_score' => 85,
            'problem_students' => 15,
            'incidents_this_month' => 45
        ];

        // ข้อมูลกราฟแยกตามชั้นเรียน
        $classDistribution = [
            'ม.1' => 40,
            'ม.2' => 38,
            'ม.3' => 42,
            'ม.4' => 35,
            'ม.5' => 37,
            'ม.6' => 40
        ];

        // ข้อมูลช่วงคะแนน
        $scoreRanges = [
            '90-100' => 45,
            '80-89' => 35,
            '70-79' => 25,
            '60-69' => 10,
            'ต่ำกว่า 60' => 5
        ];

        // ข้อมูลเหตุการณ์รายเดือน
        $monthlyIncidents = [
            'ม.ค.' => 15,
            'ก.พ.' => 18,
            'มี.ค.' => 12,
            'เม.ย.' => 20,
            'พ.ค.' => 25,
            'มิ.ย.' => 15
        ];

        // รายการนักเรียนที่มีปัญหาล่าสุด
        $recentIncidents = [
            [
                'id' => 'ST001',
                'name' => 'นายสมชาย ใจดี',
                'class' => 'ม.3/1',
                'incident' => 'มาสาย',
                'deduct_points' => -5,
                'date' => '2024-03-20'
            ],
            // เพิ่มข้อมูลตัวอย่างอื่นๆ
        ];

        return view('behavior.dashboard', compact(
            'summary',
            'classDistribution',
            'scoreRanges',
            'monthlyIncidents',
            'recentIncidents'
        ));
    }

    /**
     * แสดงหน้าจัดการนักเรียนทั้งหมด
     */
    public function students()
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

        return view('behavior.students.index', compact('students', 'classDistribution', 'scoreRanges'));
    }

    /**
     * แสดงรายละเอียดนักเรียนตาม ID
     */
    public function showStudent($id)
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

        return view('behavior.students.show', compact('student'));
    }

    /**
     * แสดงหน้าสร้างนักเรียนใหม่
     */
    public function createStudent()
    {
        // ข้อมูลชั้นเรียนสำหรับ dropdown
        $classes = [
            'ม.1/1', 'ม.1/2', 'ม.1/3',
            'ม.2/1', 'ม.2/2', 'ม.2/3',
            'ม.3/1', 'ม.3/2', 'ม.3/3',
        ];

        return view('behavior.students.create', compact('classes'));
    }

    /**
     * บันทึกข้อมูลนักเรียนที่สร้างใหม่
     */
    public function storeStudent(Request $request)
    {
        // ตรวจสอบความถูกต้องของข้อมูล
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

        // บันทึกข้อมูล (ยังไม่มีการเชื่อมต่อฐานข้อมูลจริง)
        
        return redirect()->route('behavior.students')->with('success', 'เพิ่มข้อมูลนักเรียนสำเร็จ');
    }

    /**
     * แสดงฟอร์มแก้ไขข้อมูลนักเรียน
     */
    public function editStudent($id)
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
        ];
        
        // ข้อมูลชั้นเรียน
        $classes = [
            'ม.1/1', 'ม.1/2', 'ม.1/3',
            'ม.2/1', 'ม.2/2', 'ม.2/3',
            'ม.3/1', 'ม.3/2', 'ม.3/3',
        ];

        return view('behavior.students.edit', compact('student', 'classes'));
    }

    /**
     * อัพเดทข้อมูลนักเรียนในฐานข้อมูล
     */
    public function updateStudent(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล
        $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'parent_name' => 'nullable|string',
            'parent_phone' => 'nullable|string',
        ]);

        // บันทึกข้อมูล (ยังไม่มีการเชื่อมต่อฐานข้อมูลจริง)
        
        return redirect()->route('behavior.students.show', $id)->with('success', 'อัพเดทข้อมูลนักเรียนสำเร็จ');
    }

    /**
     * ลบข้อมูลนักเรียน
     */
    public function destroyStudent($id)
    {
        // ในระบบจริงจะลบข้อมูลจากฐานข้อมูล
        
        return redirect()->route('behavior.students')
            ->with('success', 'ลบข้อมูลนักเรียนเรียบร้อยแล้ว');
    }
}