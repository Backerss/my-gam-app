@extends('layouts.app')

@section('content')
<div class="fade-in">
    <!-- Header -->
    <div class="bg-white rounded-lg shadow-sm mb-4 p-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="fs-4 fw-bold text-dark mb-0">รายละเอียดผู้ปกครอง</h1>
            <a href="{{ route('behavior.parents.index') }}" class="btn btn-outline-secondary d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left me-2" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
                กลับไปหน้ารายการ
            </a>
        </div>
    </div>

    <!-- ข้อความแจ้งเตือน -->
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- รายละเอียดผู้ปกครอง -->
    <div class="row g-4 mb-4">
        <!-- ข้อมูลทั่วไป -->
        <div class="col-12 col-lg-7">
            <div class="card shadow-sm rounded-4 overflow-hidden h-100">
                <div class="card-header bg-white border-bottom py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="fs-5 fw-semibold text-dark mb-0">
                            <i class="bi bi-person-lines-fill me-2 text-primary"></i>ข้อมูลผู้ปกครอง
                        </h2>
                        <a href="{{ route('behavior.parents.edit', $parent['id']) }}" class="btn btn-sm btn-primary d-flex align-items-center">
                            <i class="bi bi-pencil-square me-2"></i>แก้ไขข้อมูล
                        </a>
                    </div>
                </div>
                
                <div class="card-body p-4">
                    <div class="d-flex mb-4">
                        <div class="rounded-circle bg-primary-light d-flex align-items-center justify-content-center me-3" style="width: 80px; height: 80px;">
                            <span class="fs-3 fw-bold text-primary">{{ substr($parent['first_name'], 0, 1) }}</span>
                        </div>
                        <div>
                            <h3 class="fs-4 fw-semibold mb-1">{{ $parent['first_name'] }} {{ $parent['last_name'] }}</h3>
                            <p class="text-muted mb-1">รหัส: {{ $parent['id'] }}</p>
                            <span class="badge bg-success-light text-success rounded-pill px-3 py-2">{{ $parent['relationship'] }}</span>
                        </div>
                    </div>
                    
                    <div class="border-bottom pb-3 mb-3"></div>
                    
                    <div class="row g-4">
                        <div class="col-12 col-md-6">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                    <i class="bi bi-telephone text-primary"></i>
                                </div>
                                <div>
                                    <div class="small text-muted">เบอร์โทรศัพท์</div>
                                    <div class="fw-medium">{{ $parent['phone'] }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 col-md-6">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                    <i class="bi bi-calendar-date text-primary"></i>
                                </div>
                                <div>
                                    <div class="small text-muted">วันที่สร้างข้อมูล</div>
                                    <div class="fw-medium">{{ $parent['created_at'] }}</div>
                                </div>
                            </div>
                        </div>
                        
                        @if(isset($parent['email']) && $parent['email'])
                        <div class="col-12 col-md-6">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                    <i class="bi bi-envelope text-primary"></i>
                                </div>
                                <div>
                                    <div class="small text-muted">อีเมล</div>
                                    <div class="fw-medium">{{ $parent['email'] }}</div>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        @if(isset($parent['address']) && $parent['address'])
                        <div class="col-12">
                            <div class="d-flex align-items-start">
                                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center me-3 flex-shrink-0" style="width: 40px; height: 40px;">
                                    <i class="bi bi-house-door text-primary"></i>
                                </div>
                                <div>
                                    <div class="small text-muted">ที่อยู่</div>
                                    <div class="fw-medium">{{ $parent['address'] }}</div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        <!-- ข้อมูลนักเรียนที่เกี่ยวข้อง -->
        <div class="col-12 col-lg-5">
            <div class="card shadow-sm rounded-4 overflow-hidden h-100">
                <div class="card-header bg-white border-bottom py-3">
                    <h2 class="fs-5 fw-semibold text-dark mb-0">
                        <i class="bi bi-person-video3 me-2 text-primary"></i>นักเรียนที่เกี่ยวข้อง
                    </h2>
                </div>
                
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-4">
                        <div class="rounded-circle bg-success-light d-flex align-items-center justify-content-center me-3" style="width: 64px; height: 64px;">
                            <i class="bi bi-mortarboard-fill text-success fs-4"></i>
                        </div>
                        <div>
                            <h3 class="fs-5 fw-semibold mb-1">{{ $parent['student_name'] }}</h3>
                            <p class="text-muted mb-1">รหัสนักเรียน: {{ $parent['student_id'] }}</p>
                            <p class="text-muted mb-0">ชั้น: {{ $parent['student_class'] ?? 'ไม่มีข้อมูล' }}</p>
                        </div>
                    </div>
                    
                    <div class="bg-light rounded-3 p-3 mb-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center me-2" style="width: 24px; height: 24px;">
                                <i class="bi bi-link-45deg text-white small"></i>
                            </div>
                            <div class="fw-medium">ความเชื่อมโยง</div>
                        </div>
                        <p class="small mb-1">
                            <span class="fw-medium">{{ $parent['first_name'] }} {{ $parent['last_name'] }}</span> 
                            เป็น<span class="text-primary fw-medium">{{ $parent['relationship'] }}</span>ของ
                            <span class="fw-medium">{{ $parent['student_name'] }}</span>
                        </p>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('behavior.students.show', $parent['student_id']) }}" class="btn btn-outline-primary d-flex align-items-center">
                            <i class="bi bi-person-badge me-2"></i>ดูข้อมูลนักเรียน
                        </a>
                        
                        <a href="{{ route('behavior.parents.edit', $parent['id']) }}#student" class="btn btn-outline-secondary d-flex align-items-center">
                            <i class="bi bi-pencil me-2"></i>เปลี่ยนนักเรียน
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- พื้นที่สำหรับส่วนเพิ่มเติม หรือปุ่มการจัดการ -->
    <div class="card shadow-sm rounded-4 overflow-hidden mb-4">
        <div class="card-header bg-white border-bottom py-3">
            <h2 class="fs-5 fw-semibold text-dark mb-0">
                <i class="bi bi-gear me-2 text-primary"></i>การจัดการข้อมูล
            </h2>
        </div>
        
        <div class="card-body p-4">
            <div class="row">
                <div class="col-md-8 mb-3 mb-md-0">
                    <h5 class="fs-6 fw-semibold text-danger mb-2">ลบข้อมูลผู้ปกครอง</h5>
                    <p class="small text-muted mb-0">การลบข้อมูลผู้ปกครองจะทำให้ความเชื่อมโยงกับนักเรียนหายไป และไม่สามารถกู้คืนได้</p>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-md-end">
                    <form action="{{ route('behavior.parents.destroy', $parent['id']) }}" method="POST" onsubmit="return confirm('คุณแน่ใจที่จะลบข้อมูลผู้ปกครองนี้หรือไม่?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">
                            <i class="bi bi-trash me-2"></i>ลบข้อมูลผู้ปกครอง
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Custom Colors */
    .bg-primary-light {
        background-color: rgba(13, 110, 253, 0.1);
    }
    
    .text-primary {
        color: #0d6efd !important;
    }
    
    .bg-success-light {
        background-color: rgba(25, 135, 84, 0.1);
    }
    
    .text-success {
        color: #198754 !important;
    }
    
    /* Animations */
    .fade-in {
        animation: fadeIn 0.5s ease-in-out;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    /* Card Styles */
    .rounded-4 {
        border-radius: 0.75rem;
    }
    
    .rounded-3 {
        border-radius: 0.5rem;
    }
</style>
@endsection