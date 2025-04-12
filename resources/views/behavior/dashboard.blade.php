@extends('layouts.app')

@section('content')
    <div class="fade-in">

        <div class="container">
            <!-- Dashboard Header -->
            <div class="row mb-4">
                <div class="col-12">
                    <h4 class="text-2xl font-bold">แดชบอร์ด</h4>
                </div>
            </div>

            <!-- Stat Cards -->
            <div class="row mb-4">
                <div class="col-lg-3 col-md-6 mb-3 mb-lg-0">
                    <div class="card dashboard-card border-start-primary h-100">
                        <div class="card-body">
                            <p class="text-muted small mb-1">นักเรียนทั้งหมด</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="fs-3 fw-bold mb-0">{{ $summary['total_students'] }}</h2>
                                <span class="badge bg-primary-light text-primary">ทั้งหมด</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-3 mb-lg-0">
                    <div class="card dashboard-card border-start-success h-100">
                        <div class="card-body">
                            <p class="text-muted small mb-1">คะแนนเฉลี่ย</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="fs-3 fw-bold mb-0">{{ $summary['average_score'] ?? 0 }}</h2>
                                <span class="badge bg-success-light text-success">คะแนน</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-3 mb-lg-0">
                    <div class="card dashboard-card border-start-info h-100">
                        <div class="card-body">
                            <p class="text-muted small mb-1">ชั้นเรียน</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="fs-3 fw-bold mb-0">{{ $summary['classes_count'] ?? 0 }}</h2>
                                <span class="badge bg-info-light text-info">ห้อง</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-3 mb-lg-0">
                    <div class="card dashboard-card border-start-warning h-100">
                        <div class="card-body">
                            <p class="text-muted small mb-1">เหตุการณ์ล่าสุด</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="fs-3 fw-bold mb-0">{{ $summary['recent_incidents_count'] ?? 0 }}</h2>
                                <span class="badge bg-warning-light text-warning">รายการ</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts -->
            <div class="row mb-4">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="card h-100">
                        <div class="card-header">
                            <h3 class="card-title font-medium">การกระจายตามชั้นเรียน</h3>
                        </div>
                        <div class="card-body" style="height: 320px;">
                            <canvas id="classDistributionChart"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card h-100">
                        <div class="card-header">
                            <h3 class="card-title font-medium">ช่วงคะแนนนักเรียน</h3>
                        </div>
                        <div class="card-body" style="height: 320px;">
                            <canvas id="scoreRangesChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Incidents Table -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-medium">เหตุการณ์ล่าสุด</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr class="bg-light">
                                            <th class="p-3 text-left">รหัส</th>
                                            <th class="p-3 text-left">ชื่อ-นามสกุล</th>
                                            <th class="p-3 text-left">ชั้น</th>
                                            <th class="p-3 text-left">เหตุการณ์</th>
                                            <th class="p-3 text-right">คะแนน</th>
                                            <th class="p-3 text-left">วันที่</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($recentIncidents as $incident)
                                            <tr class="border-bottom">
                                                <td class="p-3">{{ $incident['id'] }}</td>
                                                <td class="p-3">{{ $incident['name'] }}</td>
                                                <td class="p-3 text-muted">{{ $incident['class'] }}</td>
                                                <td class="p-3 text-muted">{{ $incident['incident'] }}</td>
                                                <td class="p-3 text-right text-danger">{{ $incident['deduct_points'] }}</td>
                                                <td class="p-3 text-muted">
                                                    {{ \Carbon\Carbon::parse($incident['date'])->format('d/m/Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
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