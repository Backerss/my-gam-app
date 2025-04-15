<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class ParentManagementController extends Controller
{
    /**
     * แสดงรายการผู้ปกครองทั้งหมด
     */
    public function index()
    {
        // ในระบบจริง ดึงข้อมูลจาก Database
        $parents = [
            [
                'id' => 'P001',
                'first_name' => 'สมพงษ์',
                'last_name' => 'ใจดี',
                'relationship' => 'บิดา',
                'phone' => '089-876-5432',
                'created_at' => '2024-01-15',
                'student_id' => 'ST001',
                'student_name' => 'ธงชัย ใจดี'
            ],
            [
                'id' => 'P002',
                'first_name' => 'แสงจันทร์',
                'last_name' => 'มีสุข',
                'relationship' => 'มารดา',
                'phone' => '081-234-5678',
                'created_at' => '2024-01-18',
                'student_id' => 'ST002',
                'student_name' => 'สมศรี มีสุข'
            ],
            [
                'id' => 'P003',
                'first_name' => 'วีระชัย',
                'last_name' => 'มุ่งมั่น',
                'relationship' => 'บิดา',
                'phone' => '082-456-7890',
                'created_at' => '2024-02-10',
                'student_id' => 'ST003',
                'student_name' => 'ประเสริฐ มุ่งมั่น'
            ],
            [
                'id' => 'P004',
                'first_name' => 'มานิตย์',
                'last_name' => 'พากเพียร',
                'relationship' => 'บิดา',
                'phone' => '083-567-8901',
                'created_at' => '2024-02-20',
                'student_id' => 'ST004',
                'student_name' => 'มนัสนันท์ พากเพียร'
            ],
            [
                'id' => 'P005',
                'first_name' => 'จันทร์เพ็ญ',
                'last_name' => 'มานะ',
                'relationship' => 'มารดา',
                'phone' => '084-678-9012',
                'created_at' => '2024-03-05',
                'student_id' => 'ST005',
                'student_name' => 'สมชาย มานะ'
            ],
        ];

        return view('parents.index', compact('parents'));
    }

    /**
     * แสดงฟอร์มสำหรับเพิ่มผู้ปกครองใหม่
     */
    public function create()
    {
        // ในระบบจริง ดึงข้อมูลนักเรียนทั้งหมด
        $students = [
            ['id' => 'ST001', 'name' => 'ธงชัย ใจดี', 'class' => 'ม.1/1'],
            ['id' => 'ST002', 'name' => 'สมศรี มีสุข', 'class' => 'ม.2/1'],
            ['id' => 'ST003', 'name' => 'ประเสริฐ มุ่งมั่น', 'class' => 'ม.2/1'],
            ['id' => 'ST004', 'name' => 'มนัสนันท์ พากเพียร', 'class' => 'ม.3/1'],
            ['id' => 'ST005', 'name' => 'สมชาย มานะ', 'class' => 'ม.1/2'],
            ['id' => 'ST006', 'name' => 'วันดี แสนสุข', 'class' => 'ม.2/2'],
            ['id' => 'ST007', 'name' => 'มานี รักษาดี', 'class' => 'ม.2/1'],
            ['id' => 'ST008', 'name' => 'สมหญิง ใจงาม', 'class' => 'ม.3/2'],
        ];

        return view('parents.create', compact('students'));
    }

    /**
     * บันทึกข้อมูลผู้ปกครองใหม่
     */
    public function store(Request $request)
    {
        // ตรวจสอบความถูกต้องของข้อมูล
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'relationship' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'student_id' => 'required',
        ]);

        // ในระบบจริง บันทึกลงฐานข้อมูล
        
        return redirect()->route('parents.index')
            ->with('success', 'เพิ่มข้อมูลผู้ปกครองสำเร็จ');
    }

    /**
     * แสดงข้อมูลผู้ปกครองรายคน
     */
    public function show($id)
    {
        // ในระบบจริง ดึงข้อมูลจาก Database ตาม ID
        $parent = [
            'id' => $id,
            'first_name' => 'สมพงษ์',
            'last_name' => 'ใจดี',
            'relationship' => 'บิดา',
            'phone' => '089-876-5432',
            'created_at' => '2024-01-15',
            'student_id' => 'ST001',
            'student_name' => 'ธงชัย ใจดี',
            'student_class' => 'ม.1/1'
        ];

        return view('parents.show', compact('parent'));
    }

    /**
     * แสดงฟอร์มสำหรับแก้ไขข้อมูลผู้ปกครอง
     */
    public function edit($id)
    {
        // ในระบบจริง ดึงข้อมูลจาก Database ตาม ID
        $parent = [
            'id' => $id,
            'first_name' => 'สมพงษ์',
            'last_name' => 'ใจดี',
            'relationship' => 'บิดา',
            'phone' => '089-876-5432',
            'created_at' => '2024-01-15',
            'student_id' => 'ST001',
            'student_name' => 'ธงชัย ใจดี'
        ];

        // ในระบบจริง ดึงข้อมูลนักเรียนทั้งหมด
        $students = [
            ['id' => 'ST001', 'name' => 'ธงชัย ใจดี', 'class' => 'ม.1/1'],
            ['id' => 'ST002', 'name' => 'สมศรี มีสุข', 'class' => 'ม.2/1'],
            ['id' => 'ST003', 'name' => 'ประเสริฐ มุ่งมั่น', 'class' => 'ม.2/1'],
            ['id' => 'ST004', 'name' => 'มนัสนันท์ พากเพียร', 'class' => 'ม.3/1'],
            ['id' => 'ST005', 'name' => 'สมชาย มานะ', 'class' => 'ม.1/2'],
            ['id' => 'ST006', 'name' => 'วันดี แสนสุข', 'class' => 'ม.2/2'],
            ['id' => 'ST007', 'name' => 'มานี รักษาดี', 'class' => 'ม.2/1'],
            ['id' => 'ST008', 'name' => 'สมหญิง ใจงาม', 'class' => 'ม.3/2'],
        ];

        return view('parents.edit', compact('parent', 'students'));
    }

    /**
     * อัพเดตข้อมูลผู้ปกครอง
     */
    public function update(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'relationship' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'student_id' => 'required',
        ]);

        // ในระบบจริง อัพเดตข้อมูลในฐานข้อมูล

        return redirect()->route('parents.index')
            ->with('success', 'อัพเดตข้อมูลผู้ปกครองสำเร็จ');
    }

    /**
     * ลบข้อมูลผู้ปกครอง
     */
    public function destroy($id)
    {
        // ในระบบจริง ลบข้อมูลจากฐานข้อมูล

        return redirect()->route('parents.index')
            ->with('success', 'ลบข้อมูลผู้ปกครองสำเร็จ');
    }
}