@extends('layouts.app')

@section('content')
<div class="fade-in">
    <!-- Header with student info -->
    <div class="bg-primary p-4 rounded-lg shadow mb-4" style="background-color: #6366f1 !important;">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="text-white fs-4 fw-bold">{{ $student['name'] }}</h1>
                <div class="d-flex align-items-center mt-1">
                    <span class="text-white-50 small">รหัสนักเรียน: {{ $student['student_id'] }}</span>
                    <span class="mx-2 text-white-50">•</span>
                    <span class="text-white-50 small">{{ $student['class'] }}</span>
                </div>
            </div>
            <a href="#" class="btn bg-white text-primary d-flex align-items-center rounded-3 shadow-sm" style="color: #4f46e5 !important;">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-file-earmark-arrow-down me-2" viewBox="0 0 16 16">
                    <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293z"/>
                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 1 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                </svg>
                ส่งออก PDF
            </a>
        </div>
    </div>

    <div class="row g-4">
        <!-- ข้อมูลส่วนตัว -->
        <div class="col-12 col-lg-4">
            <div class="card rounded-4 shadow-lg overflow-hidden">
                <div class="card-header bg-light border-bottom d-flex justify-content-between align-items-center py-3">
                    <h2 class="fs-5 fw-semibold text-dark mb-0">ข้อมูลส่วนตัว</h2>
                    <span class="badge bg-blue-100 text-blue-800 px-3 py-1 rounded-pill" style="background-color: #dbeafe; color: #1e40af;">ข้อมูลพื้นฐาน</span>
                </div>
                
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <div class="mx-auto rounded-circle d-flex align-items-center justify-content-center" 
                             style="width: 128px; height: 128px; background-color: #e0e7ff; color: #6366f1; font-size: 2.25rem; font-weight: bold;">
                            {{ substr($student['name'], 0, 1) }}
                        </div>
                    </div>
                    
                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex align-items-center border-bottom pb-3">
                            <div class="me-3 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                                    <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                    <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.393A3.98 3.98 0 0 0 11 13a4 4 0 0 0-4-4 4 4 0 0 0-4 4c0 .374-.017.65-.05.936A1.6 1.6 0 0 0 3 13.5z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="x-small text-gray-500 mb-1">บัตรประชาชน</p>
                                <p class="fw-medium mb-0">{{ $student['id_card'] ?? '1234567890123' }}</p>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center border-bottom pb-3">
                            <div class="me-3 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="x-small text-gray-500 mb-1">เบอร์โทรศัพท์</p>
                                <p class="fw-medium mb-0">{{ $student['phone'] ?? '081-234-5678' }}</p>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center border-bottom pb-3">
                            <div class="me-3 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="x-small text-gray-500 mb-1">ที่อยู่</p>
                                <p class="fw-medium mb-0">{{ $student['address'] ?? '123 หมู่ 5 ต.สันทราย อ.เมือง จ.เชียงใหม่ 50000' }}</p>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center">
                            <div class="me-3 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                                </svg>
                            </div>
                            <div>
                                <p class="x-small text-gray-500 mb-1">ผู้ปกครอง</p>
                                <p class="fw-medium mb-0">{{ $student['parent_name'] ?? 'นายสมพงษ์ ใจดี' }} ({{ $student['parent_phone'] ?? '089-876-5432' }})</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Behavior Info -->
        <div class="col-12 col-lg-8">
            <div class="row g-4 mb-4">
                <!-- Behavior Score -->
                <div class="col-12 col-md-6">
                    <div class="card border-start border-success border-4 rounded-3 shadow">
                        <div class="card-body p-3 d-flex align-items-center">
                            <div class="rounded-circle bg-success-light p-3 me-3 d-flex align-items-center justify-content-center" style="background-color: #d1e7dd;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-bar-chart-fill text-success" viewBox="0 0 16 16">
                                    <path d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-500 small mb-1">คะแนนพฤติกรรมปัจจุบัน</p>
                                <p class="fs-4 fw-bold mb-0">{{ $student['current_score'] ?? '95' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-md-6">
                    <div class="card border-start border-primary border-4 rounded-3 shadow" style="border-color: #3b82f6 !important;">
                        <div class="card-body p-3 d-flex align-items-center">
                            <div class="rounded-circle bg-info-light p-3 me-3 d-flex align-items-center justify-content-center" style="background-color: #dbeafe;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-graph-up-arrow text-primary" style="color: #3b82f6 !important;" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M0 0h1v15h15v1H0zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-500 small mb-1">การเปลี่ยนแปลง</p>
                                <p class="fs-4 fw-bold mb-0 {{ ($student['score_change'] ?? 5) > 0 ? 'text-success' : 'text-danger' }}">
                                    {{ ($student['score_change'] ?? 5) > 0 ? '+' : '' }}{{ $student['score_change'] ?? '+5' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Incident History Card -->
            <div class="card rounded-4 shadow-lg overflow-hidden">
                <div class="card-header bg-light border-bottom d-flex justify-content-between align-items-center py-3">
                    <div class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clock-history text-primary me-2" style="color: #4f46e5 !important;" viewBox="0 0 16 16">
                            <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342zm1.37.71a7 7 0 0 0-.439-.27l.493-.87a8.03 8.03 0 0 1 .979.654l-.615.789a7 7 0 0 0-.418-.302zm1.834 1.79a7 7 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7 7 0 0 0-.214-.468l.893-.45a8 8 0 0 1 .45 1.088l-.95.313a7 7 0 0 0-.179-.483m.53 2.507a7 7 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .026zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a8 8 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501m-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535m-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8 8 0 0 1-.401.432l-.707-.707z"/>
                            <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z"/>
                            <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5"/>
                        </svg>
                        <h3 class="fw-medium text-dark mb-0 fs-6">ประวัติการเปลี่ยนแปลงคะแนน</h3>
                    </div>
                    <span class="badge rounded-pill px-3 py-1" style="background-color: #e0e7ff; color: #3730a3;">
                        3 รายการ
                    </span>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="text-uppercase small fw-medium text-gray-500">วันที่</th>
                                <th class="text-uppercase small fw-medium text-gray-500">รายละเอียด</th>
                                <th class="text-end text-uppercase small fw-medium text-gray-500">คะแนน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle bg-danger-light d-flex align-items-center justify-content-center me-3" style="width: 32px; height: 32px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash text-danger" viewBox="0 0 16 16">
                                                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
                                            </svg>
                                        </div>
                                        <div class="small fw-medium">15/09/2023</div>
                                    </div>
                                </td>
                                <td class="small">มาสาย</td>
                                <td class="text-end">
                                    <span class="badge rounded-pill bg-danger-light text-danger fw-semibold px-3">
                                        -5
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle bg-success-light d-flex align-items-center justify-content-center me-3" style="width: 32px; height: 32px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus text-success" viewBox="0 0 16 16">
                                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                            </svg>
                                        </div>
                                        <div class="small fw-medium">05/10/2023</div>
                                    </div>
                                </td>
                                <td class="small">ช่วยเหลืองานครู</td>
                                <td class="text-end">
                                    <span class="badge rounded-pill bg-success-light text-success fw-semibold px-3">
                                        +10
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle bg-success-light d-flex align-items-center justify-content-center me-3" style="width: 32px; height: 32px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus text-success" viewBox="0 0 16 16">
                                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                            </svg>
                                        </div>
                                        <div class="small fw-medium">15/10/2023</div>
                                    </div>
                                </td>
                                <td class="small">ช่วยเพื่อนเก็บขยะ</td>
                                <td class="text-end">
                                    <span class="badge rounded-pill bg-success-light text-success fw-semibold px-3">
                                        +5
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Back Button -->
            <div class="d-flex mt-4">
                <a href="{{ route('behavior.students') }}" class="d-flex align-items-center text-decoration-none" style="color: #4f46e5;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left me-1" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                    </svg>
                    กลับไปหน้ารายการนักเรียน
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .badge {
        line-height: 1.2;
        font-size: 0.75rem;
    }
    
    .rounded-3 {
        border-radius: 0.5rem;
    }
    
    .rounded-4 {
        border-radius: 0.75rem;
    }
    
    .rounded-pill {
        border-radius: 50rem;
    }
    
    .x-small {
        font-size: 0.75rem;
    }
    
    .text-gray-400 {
        color: #9ca3af;
    }
    
    .text-gray-500 {
        color: #6b7280;
    }
    
    .fw-semibold {
        font-weight: 600;
    }
    
    .shadow-lg {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }
    
    .table > :not(:last-child) > :last-child > * {
        border-bottom-color: inherit;
    }
    
    .border-4 {
        border-width: 4px !important;
    }
    
    .bg-danger-light {
        background-color: #f8d7da !important;
    }
    
    .bg-success-light {
        background-color: #d1e7dd !important;
    }
    
    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.03);
    }
</style>
@endsection