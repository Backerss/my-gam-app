@extends('layouts.app')

@section('content')
<div class="fade-in">
    <!-- Page Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">แดชบอร์ด</h1>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow p-5 border-l-4 border-indigo-500">
            <p class="text-sm text-gray-500 mb-1">นักเรียนทั้งหมด</p>
            <div class="flex justify-between items-center">
                <p class="text-2xl font-bold">{{ $summary['total_students'] }}</p>
                <span class="bg-indigo-100 text-indigo-800 text-xs px-2 py-1 rounded-full">ทั้งหมด</span>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-5 border-l-4 border-green-500">
            <p class="text-sm text-gray-500 mb-1">คะแนนเฉลี่ย</p>
            <div class="flex justify-between items-center">
                <p class="text-2xl font-bold">{{ $summary['average_score'] }}</p>
                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">+5.2</span>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-5 border-l-4 border-red-500">
            <p class="text-sm text-gray-500 mb-1">นักเรียนที่มีปัญหา</p>
            <div class="flex justify-between items-center">
                <p class="text-2xl font-bold">{{ $summary['problem_students'] }}</p>
                <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full">ต้องดูแล</span>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-5 border-l-4 border-yellow-500">
            <p class="text-sm text-gray-500 mb-1">เหตุการณ์เดือนนี้</p>
            <div class="flex justify-between items-center">
                <p class="text-2xl font-bold">{{ $summary['incidents_this_month'] }}</p>
                <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full">เดือนนี้</span>
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-lg font-medium text-gray-800 mb-4">การกระจายตามชั้นเรียน</h3>
            <div class="h-80">
                <canvas id="classDistributionChart"></canvas>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-lg font-medium text-gray-800 mb-4">ช่วงคะแนนนักเรียน</h3>
            <div class="h-80">
                <canvas id="scoreRangesChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Recent Incidents -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-4 py-3 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-800">เหตุการณ์ล่าสุด</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">รหัส</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ชื่อ-นามสกุล</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ชั้น</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">เหตุการณ์</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">คะแนน</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">วันที่</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($recentIncidents as $incident)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $incident['id'] }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $incident['name'] }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $incident['class'] }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $incident['incident'] }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-right">
                            <span class="text-red-600">{{ $incident['deduct_points'] }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ \Carbon\Carbon::parse($incident['date'])->format('d/m/Y') }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Class Distribution Chart
    new Chart(document.getElementById('classDistributionChart'), {
        type: 'bar',
        data: {
            labels: Object.keys({!! json_encode($classDistribution) !!}),
            datasets: [{
                label: 'จำนวนนักเรียน',
                data: Object.values({!! json_encode($classDistribution) !!}),
                backgroundColor: 'rgba(79, 70, 229, 0.6)'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    // Score Ranges Chart
    new Chart(document.getElementById('scoreRangesChart'), {
        type: 'pie',
        data: {
            labels: Object.keys({!! json_encode($scoreRanges) !!}),
            datasets: [{
                data: Object.values({!! json_encode($scoreRanges) !!}),
                backgroundColor: [
                    'rgba(34, 197, 94, 0.6)',
                    'rgba(59, 130, 246, 0.6)', 
                    'rgba(234, 179, 8, 0.6)',
                    'rgba(249, 115, 22, 0.6)',
                    'rgba(239, 68, 68, 0.6)'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
});
</script>
@endsection