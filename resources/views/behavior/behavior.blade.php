@extends('layouts.app')

@section('content')
<div>
    <!-- Page Header - ปรับปรุงสำหรับมือถือ -->
    <div class="mb-4 sm:mb-6">
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center">
            <h1 class="text-xl sm:text-2xl font-bold text-gray-800 mb-3 sm:mb-0">รายงานพฤติกรรมนักเรียน</h1>
            <div class="flex flex-wrap gap-2 sm:space-x-2">
                <a href="{{ route('behavior.reports.export') }}" class="flex items-center px-3 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span>PDF</span>
                </a>
                <button class="flex items-center px-3 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                    </svg>
                    <span>กรอง</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Stats Cards - ปรับปรุงสำหรับมือถือ -->
    <div class="grid grid-cols-1 gap-3 mb-4 sm:grid-cols-3 sm:gap-4 sm:mb-6">
        <div class="bg-white rounded-lg shadow p-3 sm:p-4 border-l-4 border-indigo-500">
            <p class="text-xs sm:text-sm text-gray-500 mb-1">จำนวนนักเรียนทั้งหมด</p>
            <div class="flex justify-between items-center">
                <p class="text-xl sm:text-2xl font-bold">{{ count($students) }}</p>
                <span class="bg-indigo-100 text-indigo-800 text-xs px-2 py-1 rounded-full">ทั้งหมด</span>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow p-3 sm:p-4 border-l-4 border-green-500">
            <p class="text-xs sm:text-sm text-gray-500 mb-1">คะแนนพฤติกรรมเฉลี่ย</p>
            <div class="flex justify-between items-center">
                <p class="text-xl sm:text-2xl font-bold">{{ number_format(collect($students)->avg('current_score'), 1) }}</p>
                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">+{{ number_format(collect($students)->where('score_change', '>', 0)->avg('score_change'), 1) }}</span>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow p-3 sm:p-4 border-l-4 border-red-500">
            <p class="text-xs sm:text-sm text-gray-500 mb-1">นักเรียนที่มีปัญหา</p>
            <div class="flex justify-between items-center">
                <p class="text-xl sm:text-2xl font-bold">{{ collect($students)->where('score_change', '<', 0)->count() }}</p>
                <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full">เดือนนี้</span>
            </div>
        </div>
    </div>

    <!-- Charts Section - ปรับขนาดและการแสดงผลของกราฟ -->
    <div class="mb-4 sm:mb-6">
        <div class="bg-white rounded-lg shadow p-3 sm:p-4 mb-3 sm:mb-4">
            <h3 class="text-sm font-medium text-gray-700 mb-2">การกระจายตามชั้นเรียน</h3>
            <div class="h-56 md:h-64">
                <canvas id="classDistributionChart"></canvas>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 sm:gap-4">
            <div class="bg-white rounded-lg shadow p-3 sm:p-4">
                <h3 class="text-sm font-medium text-gray-700 mb-2">ช่วงคะแนนพฤติกรรม</h3>
                <div class="h-48 md:h-56">
                    <canvas id="scoreRangesChart"></canvas>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-3 sm:p-4">
                <h3 class="text-sm font-medium text-gray-700 mb-2">เหตุการณ์รายเดือน</h3>
                <div class="h-48 md:h-56">
                    <canvas id="monthlyIncidentsChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Bar - ปรับขนาดให้พอดีกับหน้าจอ -->
    <div class="mb-4 sm:mb-6">
        <div class="relative rounded-lg shadow-sm">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input id="search-students" type="text" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm" placeholder="ค้นหานักเรียน (รหัส, ชื่อ, ชั้น)">
        </div>
    </div>

    <!-- Student Table - ปรับโครงสร้างและสไตล์ของตาราง -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">รหัส</th>
                        <th scope="col" class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ชื่อ-สกุล</th>
                        <th scope="col" class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">ชั้น</th>
                        <th scope="col" class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">คะแนน</th>
                        <th scope="col" class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden lg:table-cell">+/-</th>
                        <th scope="col" class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden lg:table-cell">เหตุการณ์</th>
                        <th scope="col" class="px-3 sm:px-6 py-2 sm:py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">จัดการ</th>
                    </tr>
                </thead>
                <tbody id="students-table-body" class="bg-white divide-y divide-gray-200">
                    @foreach ($students as $student)
                    <tr class="hover:bg-gray-50">
                        <td class="px-3 sm:px-6 py-2 sm:py-4 whitespace-nowrap text-xs sm:text-sm font-medium text-gray-900">{{ $student['id'] }}</td>
                        <td class="px-3 sm:px-6 py-2 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                            {{ $student['name'] }}
                            <div class="sm:hidden text-xs text-gray-500">{{ $student['class'] }}</div>
                        </td>
                        <td class="px-3 sm:px-6 py-2 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-500 hidden sm:table-cell">{{ $student['class'] }}</td>
                        <td class="px-3 sm:px-6 py-2 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-500 hidden md:table-cell">
                            <div class="flex items-center">
                                <div class="w-full bg-gray-200 rounded-full h-1.5 sm:h-2.5 mr-2">
                                    @php
                                        $colorClass = 'bg-green-500';
                                        if ($student['current_score'] < 80) $colorClass = 'bg-yellow-500';
                                        if ($student['current_score'] < 70) $colorClass = 'bg-orange-500';
                                        if ($student['current_score'] < 60) $colorClass = 'bg-red-500';
                                    @endphp
                                    <div class="{{ $colorClass }} h-1.5 sm:h-2.5 rounded-full" style="width: {{ $student['current_score'] }}%"></div>
                                </div>
                                <span class="text-xs sm:text-sm font-medium">{{ $student['current_score'] }}</span>
                            </div>
                        </td>
                        <td class="px-3 sm:px-6 py-2 sm:py-4 whitespace-nowrap text-xs sm:text-sm hidden lg:table-cell">
                            @if ($student['score_change'] > 0)
                                <span class="text-green-600">+{{ $student['score_change'] }}</span>
                            @elseif ($student['score_change'] < 0)
                                <span class="text-red-600">{{ $student['score_change'] }}</span>
                            @else
                                <span class="text-gray-500">0</span>
                            @endif
                        </td>
                        <td class="px-3 sm:px-6 py-2 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-500 hidden lg:table-cell">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100">
                                {{ $student['behavior_count'] }} ครั้ง
                            </span>
                        </td>
                        <td class="px-3 sm:px-6 py-2 sm:py-4 whitespace-nowrap text-right text-xs sm:text-sm font-medium">
                            <div class="flex items-center justify-end space-x-1 sm:space-x-2">
                                <a href="{{ route('behavior.reports.student', $student['id']) }}" class="text-indigo-600 hover:text-indigo-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <a href="{{ route('behavior.reports.student.export', $student['id']) }}" class="text-red-600 hover:text-red-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Pagination - ปรับปรุงการแสดงผลสำหรับมือถือ -->
        <div class="bg-white px-3 sm:px-4 py-2 sm:py-3 border-t border-gray-200">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div class="flex justify-between sm:hidden mb-2">
                    <button class="inline-flex items-center px-3 py-1 border border-gray-300 text-xs font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        ก่อนหน้า
                    </button>
                    <button class="inline-flex items-center px-3 py-1 border border-gray-300 text-xs font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        ถัดไป
                    </button>
                </div>
                <p class="text-xs sm:text-sm text-gray-700 text-center sm:text-left">
                    แสดง <span class="font-medium">1</span> ถึง <span class="font-medium">{{ count($students) }}</span> จาก <span class="font-medium">{{ count($students) }}</span> รายการ
                </p>
                <div class="hidden sm:flex sm:flex-1 sm:justify-between sm:items-center">
                    <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        ก่อนหน้า
                    </button>
                    <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        ถัดไป
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@if (session('message'))
<div id="notification" class="fixed bottom-4 right-4 bg-green-500 text-white px-4 sm:px-6 py-2 sm:py-3 rounded-lg shadow-lg flex items-center z-50 max-w-[90%] sm:max-w-md">
    <svg class="h-5 w-5 sm:h-6 sm:w-6 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
    </svg>
    <span class="text-sm sm:text-base">{{ session('message') }}</span>
</div>
@endif
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
<script>
    // Search functionality
    document.getElementById('search-students').addEventListener('keyup', function(e) {
        const searchString = e.target.value.toLowerCase();
        const tableRows = document.querySelectorAll('#students-table-body tr');
        tableRows.forEach(row => {
            const studentId = row.children[0].textContent.toLowerCase();
            const studentName = row.children[1].textContent.toLowerCase();
            const studentClass = row.querySelector('.text-gray-500') ? row.querySelector('.text-gray-500').textContent.toLowerCase() : '';
            if (studentId.includes(searchString) || studentName.includes(searchString) || studentClass.includes(searchString)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
    
    // Notification auto-close
    const notification = document.getElementById('notification');
    if (notification) {
        setTimeout(() => {
            notification.style.opacity = '0';
            notification.style.transition = 'opacity 1s';
            setTimeout(() => {
                notification.remove();
            }, 1000);
        }, 3000);
    }
    
    // Charts - ปรับตัวเลือกให้เหมาะกับหน้าจอเล็ก
    document.addEventListener('DOMContentLoaded', function() {
        // สร้างตัวเลือกพื้นฐานสำหรับกราฟทั้งหมด
        const commonOptions = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    labels: {
                        boxWidth: window.innerWidth < 768 ? 10 : 12, 
                        font: {
                            size: window.innerWidth < 768 ? 10 : 12
                        }
                    }
                },
                tooltip: {
                    bodyFont: {
                        size: window.innerWidth < 768 ? 10 : 12
                    },
                    titleFont: {
                        size: window.innerWidth < 768 ? 10 : 12
                    }
                }
            }
        };
        
        // Class Distribution Chart
        const classDistributionCtx = document.getElementById('classDistributionChart').getContext('2d');
        const classDistributionChart = new Chart(classDistributionCtx, {
            type: 'pie',
            data: {
                labels: Object.keys({!! json_encode($classDistribution) !!}),
                datasets: [{
                    data: Object.values({!! json_encode($classDistribution) !!}),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                        'rgba(255, 159, 64, 0.7)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                ...commonOptions,
                plugins: {
                    ...commonOptions.plugins,
                    legend: {
                        position: window.innerWidth < 768 ? 'right' : 'bottom',
                        ...commonOptions.plugins.legend
                    }
                }
            }
        });
        
        // Score Ranges Chart
        const scoreRangesCtx = document.getElementById('scoreRangesChart').getContext('2d');
        const scoreRangesChart = new Chart(scoreRangesCtx, {
            type: 'bar',
            data: {
                labels: Object.keys({!! json_encode($scoreRanges) !!}),
                datasets: [{
                    label: 'นักเรียน',
                    data: Object.values({!! json_encode($scoreRanges) !!}),
                    backgroundColor: 'rgba(79, 70, 229, 0.7)',
                    borderColor: 'rgba(79, 70, 229, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                ...commonOptions,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0,
                            font: {
                                size: window.innerWidth < 768 ? 8 : 10
                            }
                        }
                    },
                    x: {
                        ticks: {
                            font: {
                                size: window.innerWidth < 768 ? 8 : 10
                            }
                        }
                    }
                },
                plugins: {
                    ...commonOptions.plugins,
                    legend: {
                        display: false
                    }
                }
            }
        });
        
        // Monthly Incidents Chart
        const monthlyIncidentsCtx = document.getElementById('monthlyIncidentsChart').getContext('2d');
        const monthlyIncidentsChart = new Chart(monthlyIncidentsCtx, {
            type: 'line',
            data: {
                labels: Object.keys({!! json_encode($monthlyIncidents) !!}),
                datasets: [{
                    label: 'เหตุการณ์',
                    data: Object.values({!! json_encode($monthlyIncidents) !!}),
                    backgroundColor: 'rgba(234, 88, 12, 0.2)',
                    borderColor: 'rgba(234, 88, 12, 1)',
                    borderWidth: window.innerWidth < 768 ? 1.5 : 2,
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                ...commonOptions,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0,
                            font: {
                                size: window.innerWidth < 768 ? 8 : 10
                            }
                        }
                    },
                    x: {
                        ticks: {
                            font: {
                                size: window.innerWidth < 768 ? 8 : 10
                            }
                        }
                    }
                }
            }
        });
        
        // เมื่อขนาดหน้าจอเปลี่ยน ปรับขนาดของกราฟใหม่
        window.addEventListener('resize', function() {
            classDistributionChart.options.plugins.legend.position = window.innerWidth < 768 ? 'right' : 'bottom';
            classDistributionChart.update();
            
            // ปรับความหนาของเส้นกราฟเหตุการณ์รายเดือน
            monthlyIncidentsChart.data.datasets[0].borderWidth = window.innerWidth < 768 ? 1.5 : 2;
            monthlyIncidentsChart.update();
        });
    });
</script>
@endsection
