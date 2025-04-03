<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * แสดงรายการการแจ้งเตือนทั้งหมด
     */
    public function index()
    {
        // ข้อมูลจำลองสำหรับการแสดงผล (ในระบบจริงควรดึงจากฐานข้อมูล)
        $notifications = [
            [
                'id' => 1,
                'type' => 'warning',
                'title' => 'มีนักเรียนถูกตัดคะแนน',
                'message' => 'นักเรียนรหัส 12345 ถูกตัดคะแนน 5 คะแนน',
                'time' => '1 นาทีที่แล้ว',
                'read' => false,
                'icon' => 'warning'
            ],
            [
                'id' => 2,
                'type' => 'success',
                'title' => 'นำเข้าข้อมูลสำเร็จ',
                'message' => 'การนำเข้าข้อมูลนักเรียนเสร็จสมบูรณ์',
                'time' => '3 ชั่วโมงที่แล้ว',
                'read' => true,
                'icon' => 'check'
            ],
            [
                'id' => 3,
                'type' => 'info',
                'title' => 'ถึงเวลารายงานประจำสัปดาห์',
                'message' => 'รายงานสรุปคะแนนความประพฤตินักเรียน',
                'time' => '1 วันที่แล้ว',
                'read' => true,
                'icon' => 'clock'
            ],
            [
                'id' => 4,
                'type' => 'danger',
                'title' => 'นักเรียนมีพฤติกรรมรุนแรง',
                'message' => 'นักเรียนรหัส 67890 มีพฤติกรรมทะเลาะวิวาท',
                'time' => '2 วันที่แล้ว',
                'read' => false,
                'icon' => 'alert'
            ],
        ];

        return view('behavior.notifications.index', compact('notifications'));
    }

    /**
     * ทำเครื่องหมายการแจ้งเตือนเป็นอ่านแล้ว
     */
    public function markAsRead(Request $request)
    {
        // ในระบบจริงควรมีการอัพเดทสถานะในฐานข้อมูล
        return redirect()->back()->with('success', 'ทำเครื่องหมายว่าอ่านแล้วทั้งหมด');
    }
}