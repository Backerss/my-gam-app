<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        // In a real application, this would come from your database
        $students = [
            ['id' => 'ST001', 'name' => 'ธงชัย ใจดี', 'class' => 'ม.1/1', 'current_score' => 95, 'score_change' => 5, 'behavior_count' => 3, 'last_incident' => '2023-10-15'],
            ['id' => 'ST002', 'name' => 'สมศรี รักเรียน', 'class' => 'ม.1/1', 'current_score' => 100, 'score_change' => 0, 'behavior_count' => 0, 'last_incident' => null],
            ['id' => 'ST003', 'name' => 'ประเสริฐ มุ่งมั่น', 'class' => 'ม.2/1', 'current_score' => 85, 'score_change' => -10, 'behavior_count' => 2, 'last_incident' => '2023-11-05'],
            ['id' => 'ST004', 'name' => 'มนัสนันท์ พากเพียร', 'class' => 'ม.3/1', 'current_score' => 70, 'score_change' => -15, 'behavior_count' => 5, 'last_incident' => '2023-12-01'],
            ['id' => 'ST005', 'name' => 'สมชาย มานะ', 'class' => 'ม.1/2', 'current_score' => 90, 'score_change' => -5, 'behavior_count' => 1, 'last_incident' => '2023-11-20'],
            ['id' => 'ST006', 'name' => 'วันดี แสนสุข', 'class' => 'ม.2/2', 'current_score' => 88, 'score_change' => 3, 'behavior_count' => 2, 'last_incident' => '2023-10-10'],
            ['id' => 'ST007', 'name' => 'มานี รักษาดี', 'class' => 'ม.2/1', 'current_score' => 92, 'score_change' => -3, 'behavior_count' => 1, 'last_incident' => '2023-12-05'],
            ['id' => 'ST008', 'name' => 'สมหญิง ใจงาม', 'class' => 'ม.3/2', 'current_score' => 78, 'score_change' => -12, 'behavior_count' => 4, 'last_incident' => '2023-11-15'],
        ];
        
        // Statistics for charts
        $classDistribution = [
            'ม.1/1' => 2,
            'ม.1/2' => 1,
            'ม.2/1' => 2,
            'ม.2/2' => 1,
            'ม.3/1' => 1,
            'ม.3/2' => 1,
        ];
        
        $scoreRanges = [
            '91-100' => 3,
            '81-90' => 2,
            '71-80' => 2,
            '61-70' => 1,
            '0-60' => 0,
        ];
        
        $monthlyIncidents = [
            'ม.ค.' => 5,
            'ก.พ.' => 7,
            'มี.ค.' => 3,
            'เม.ย.' => 4,
            'พ.ค.' => 8,
            'มิ.ย.' => 10,
            'ก.ค.' => 6,
            'ส.ค.' => 4,
            'ก.ย.' => 5,
            'ต.ค.' => 9,
            'พ.ย.' => 12,
            'ธ.ค.' => 8,
        ];
        
        return view('reports.behavior', compact('students', 'classDistribution', 'scoreRanges', 'monthlyIncidents'));
    }
    
    public function studentDetail($id)
    {
        // In a real app, fetch this from the database
        $students = [
            'ST001' => [
                'id' => 'ST001',
                'name' => 'ธงชัย ใจดี',
                'class' => 'ม.1/1',
                'current_score' => 95,
                'score_change' => 5,
                'incidents' => [
                    ['date' => '2023-09-15', 'description' => 'มาสาย', 'points' => -5],
                    ['date' => '2023-10-05', 'description' => 'ช่วยเหลืองานครู', 'points' => 10],
                    ['date' => '2023-10-15', 'description' => 'ช่วยเพื่อนเก็บขยะ', 'points' => 5],
                ],
            ],
            // เพิ่มข้อมูลนักเรียนอื่นๆ
        ];

        if (!isset($students[$id])) {
            abort(404);
        }

        $student = $students[$id];

        return view('reports.student-detail', compact('student'));
    }
    
    public function exportPdf(Request $request, $id = null)
    {
        // In a real application, this would generate a PDF and return it
        
        if ($id) {
            // Generate individual student report
            return redirect()->back()->with('message', "ดาวน์โหลดรายงานของนักเรียนรหัส $id เรียบร้อยแล้ว");
        } else {
            // Generate report for all students
            return redirect()->back()->with('message', 'ดาวน์โหลดรายงานทั้งหมดเรียบร้อยแล้ว');
        }
    }
}
