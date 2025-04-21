@extends('layouts.app')

@section('content')
<div>
    <!-- Page Header -->
    <div class="mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="fs-2 fw-bold text-dark">การหักคะแนนพฤติกรรม</h1>
            <div class="d-flex gap-2">
                <button class="btn btn-light d-flex align-items-center">
                    <i class="bi bi-plus me-1"></i>
                    เพิ่มนักเรียน
                </button>
                <button class="btn btn-light d-flex align-items-center">
                    <i class="bi bi-funnel me-1"></i>
                    กรอง
                </button>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card dashboard-card border-start-primary h-100">
                <div class="card-body">
                    <p class="text-muted small mb-1">จำนวนนักเรียนทั้งหมด</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="fs-3 fw-bold mb-0">142</h2>
                        <span class="badge bg-primary-light text-primary">ทั้งหมด</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card dashboard-card border-start-success h-100">
                <div class="card-body">
                    <p class="text-muted small mb-1">คะแนนพฤติกรรมเฉลี่ย</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="fs-3 fw-bold mb-0">92.5</h2>
                        <span class="badge bg-success-light text-success">+2.1 เดือนนี้</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card dashboard-card border-start-danger h-100">
                <div class="card-body">
                    <p class="text-muted small mb-1">นักเรียนที่ถูกตัดคะแนนล่าสุด</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="fs-3 fw-bold mb-0">12</h2>
                        <span class="badge bg-danger-light text-danger">วันนี้</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ตัวอย่างการแก้ไขในไฟล์เมนู -->
    <a href="{{ route('behavior.deduct') }}" class="nav-link">
        <i class="bi bi-scissors me-2"></i>
        หักคะแนนพฤติกรรม
    </a>

    <!-- เนื้อหาอื่นๆ ของหน้าหักคะแนนพฤติกรรม -->
</div>
@endsection