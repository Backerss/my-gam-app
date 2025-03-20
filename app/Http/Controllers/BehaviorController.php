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
}