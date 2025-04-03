<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * แสดงหน้าตั้งค่าระบบ
     */
    public function index()
    {
        return view('behavior.settings.index');
    }

    /**
     * บันทึกการตั้งค่าข้อมูลโรงเรียน
     */
    public function saveSchoolSettings(Request $request)
    {
        // ตรวจสอบความถูกต้องของข้อมูล
        $request->validate([
            'school_name' => 'required|string|max:255',
            'school_id' => 'required|string|max:20',
            'school_address' => 'nullable|string',
            'school_type' => 'required|string|in:elementary,middle,high',
        ]);

        // ในระบบจริงจะบันทึกข้อมูลลงฐานข้อมูล
        // เช่น Settings::updateOrCreate(['key' => 'school_name'], ['value' => $request->school_name]);

        return back()->with('success', 'บันทึกข้อมูลโรงเรียนเรียบร้อยแล้ว');
    }

    /**
     * บันทึกการตั้งค่าปีการศึกษา
     */
    public function saveAcademicSettings(Request $request)
    {
        // ตรวจสอบความถูกต้องของข้อมูล
        $request->validate([
            'academic_year' => 'required|integer|min:2500|max:2600',
            'semester' => 'required|in:1,2',
            'term_start_date' => 'required|date',
            'term_end_date' => 'required|date|after:term_start_date',
        ]);

        // บันทึกข้อมูลลงฐานข้อมูลในระบบจริง

        return back()->with('success', 'บันทึกข้อมูลปีการศึกษาเรียบร้อยแล้ว');
    }

    /**
     * บันทึกการตั้งค่าระบบ
     */
    public function saveSystemSettings(Request $request)
    {
        // ปรับให้ checkbox คืนค่าเป็น true/false
        $notificationsEnabled = $request->has('notifications_enabled');
        $dashboardSummary = $request->has('dashboard_summary');
        $teacherAccess = $request->has('teacher_access');
        
        // ตรวจสอบความถูกต้องของข้อมูล
        $request->validate([
            'automatic_backup' => 'required|string|in:none,daily,weekly,monthly',
        ]);

        // บันทึกข้อมูลลงฐานข้อมูลในระบบจริง

        return back()->with('success', 'บันทึกการตั้งค่าระบบเรียบร้อยแล้ว');
    }
}