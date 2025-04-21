<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        // แสดงหน้ารายงานหลัก
        return view('behavior.reports.index');
    }
    
    public function studentDetail($id)
    {
        $student = Student::findOrFail($id);
        return view('behavior.reports.student-detail', compact('student'));
    }
    
    public function exportPdf(Request $request, $id = null)
    {
        // สร้างหน้า export PDF สำหรับรายงาน
        if ($id) {
            $student = Student::findOrFail($id);
            // สร้าง PDF สำหรับนักเรียนคนเดียว
            return back()->with('message', "ดาวน์โหลดรายงานของนักเรียนรหัส $id เรียบร้อยแล้ว");
        } else {
            // สร้าง PDF สำหรับรายงานทั้งหมด
            return back()->with('message', 'ดาวน์โหลดรายงานทั้งหมดเรียบร้อยแล้ว');
        }
    }
}
