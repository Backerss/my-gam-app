@extends('layouts.app')

@section('content')
<div class="fade-in">
    <!-- Page Header -->
    <div class="bg-white rounded-lg shadow-sm mb-4 p-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="fs-4 fw-bold text-dark mb-0">แก้ไขข้อมูลผู้ปกครอง</h1>
            <a href="{{ route('behavior.parents.show', $parent['id']) }}" class="btn btn-outline-secondary d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left me-2" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
                กลับไปหน้ารายละเอียด
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
    </div>

    <div class="card shadow-lg rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <form action="{{ route('behavior.parents.update', $parent['id']) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row g-0">
                    <!-- ข้อมูลส่วนตัวผู้ปกครอง -->
                    <div class="col-lg-6 border-end">
                        <div class="p-4">
                            <h2 class="fs-5 fw-semibold text-dark mb-4">ข้อมูลผู้ปกครอง</h2>
                            
                            @if ($errors->any())
                            <div class="alert alert-danger mb-4">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            
                            <div class="mb-3">
                                <label for="first_name" class="form-label small text-secondary">ชื่อ <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" 
                                    id="first_name" name="first_name" value="{{ old('first_name', $parent['first_name']) }}" required>
                                @error('first_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="last_name" class="form-label small text-secondary">นามสกุล <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" 
                                    id="last_name" name="last_name" value="{{ old('last_name', $parent['last_name']) }}" required>
                                @error('last_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="relationship" class="form-label small text-secondary">ความสัมพันธ์กับผู้เรียน <span class="text-danger">*</span></label>
                                <select class="form-select @error('relationship') is-invalid @enderror" 
                                    id="relationship" name="relationship" required>
                                    <option value="">กรุณาเลือกความสัมพันธ์</option>
                                    <option value="บิดา" {{ old('relationship', $parent['relationship']) == 'บิดา' ? 'selected' : '' }}>บิดา</option>
                                    <option value="มารดา" {{ old('relationship', $parent['relationship']) == 'มารดา' ? 'selected' : '' }}>มารดา</option>
                                    <option value="ผู้ปกครอง" {{ old('relationship', $parent['relationship']) == 'ผู้ปกครอง' ? 'selected' : '' }}>ผู้ปกครอง</option>
                                    <option value="ญาติ" {{ old('relationship', $parent['relationship']) == 'ญาติ' ? 'selected' : '' }}>ญาติ</option>
                                    <option value="อื่นๆ" {{ old('relationship', $parent['relationship']) == 'อื่นๆ' ? 'selected' : '' }}>อื่นๆ</option>
                                </select>
                                @error('relationship')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="phone" class="form-label small text-secondary">เบอร์โทรศัพท์ <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                    id="phone" name="phone" value="{{ old('phone', $parent['phone']) }}" placeholder="0xx-xxx-xxxx" required>
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label small text-secondary">อีเมล</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                    id="email" name="email" value="{{ old('email', $parent['email'] ?? '') }}" placeholder="example@email.com">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label small text-secondary">ที่อยู่</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" 
                                    id="address" name="address" rows="3">{{ old('address', $parent['address'] ?? '') }}</textarea>
                                @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <!-- ข้อมูลนักเรียนที่เกี่ยวข้อง -->
                    <div class="col-lg-6">
                        <div class="p-4 h-100">
                            <h2 class="fs-5 fw-semibold text-dark mb-4">เชื่อมโยงกับนักเรียน</h2>
                            
                            <div class="mb-4">
                                <div class="alert alert-info bg-info-light d-flex" role="alert">
                                    <div class="me-3">
                                        <i class="bi bi-info-circle-fill text-info"></i>
                                    </div>
                                    <div>
                                        <h6 class="alert-heading fw-bold mb-1">ข้อมูลนักเรียนที่เกี่ยวข้อง</h6>
                                        <p class="mb-0 small">คุณสามารถเปลี่ยนแปลงนักเรียนที่เชื่อมโยงกับผู้ปกครองคนนี้ได้</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label for="student_id" class="form-label small text-secondary">เลือกนักเรียน <span class="text-danger">*</span></label>
                                <select class="form-select @error('student_id') is-invalid @enderror" id="student_id" name="student_id" required>
                                    <option value="">กรุณาเลือกนักเรียน</option>
                                    @foreach($students as $student)
                                    <option value="{{ $student['id'] }}" {{ old('student_id', $parent['student_id']) == $student['id'] ? 'selected' : '' }}>
                                        {{ $student['name'] }} ({{ $student['id'] }}) - {{ $student['class'] }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('student_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <div class="card bg-light border-0">
                                    <div class="card-header bg-light border-0">
                                        <h6 class="mb-0">ค้นหานักเรียนด้วยรหัส</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" id="search_student_id" 
                                                placeholder="ระบุรหัสนักเรียน">
                                            <button class="btn btn-outline-secondary" type="button" id="search_student_button">
                                                <i class="bi bi-search me-1"></i>ค้นหา
                                            </button>
                                        </div>
                                        <div id="search_result" class="small mt-2"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <div class="alert alert-light border d-flex" role="alert">
                                    <div class="me-3">
                                        <i class="bi bi-person-badge text-primary"></i>
                                    </div>
                                    <div>
                                        <h6 class="alert-heading fw-bold mb-1">ข้อมูลนักเรียนปัจจุบัน</h6>
                                        <p class="mb-0 small">
                                            <strong>ชื่อ:</strong> {{ $parent['student_name'] ?? 'ไม่พบข้อมูล' }}<br>
                                            <strong>รหัสนักเรียน:</strong> {{ $parent['student_id'] ?? 'ไม่พบข้อมูล' }}<br>
                                            <strong>ชั้นเรียน:</strong> {{ $parent['student_class'] ?? 'ไม่พบข้อมูล' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="border-top pt-4 mt-4">
                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="bi bi-save me-2"></i>บันทึกการเปลี่ยนแปลง
                                    </button>
                                    <a href="{{ route('behavior.parents.show', $parent['id']) }}" class="btn btn-outline-secondary">
                                        ยกเลิก
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // ฟังก์ชั่นค้นหานักเรียนจากรหัส
        document.getElementById('search_student_button').addEventListener('click', function() {
            searchStudent();
        });
        
        // กด Enter ในช่องค้นหาเพื่อค้นหา
        document.getElementById('search_student_id').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                searchStudent();
            }
        });
        
        function searchStudent() {
            const searchStudentId = document.getElementById('search_student_id').value.trim();
            const resultElement = document.getElementById('search_result');
            const studentSelect = document.getElementById('student_id');
            
            if (!searchStudentId) {
                resultElement.innerHTML = '<span class="text-danger">กรุณาระบุรหัสนักเรียน</span>';
                return;
            }
            
            resultElement.innerHTML = '<span class="text-info">กำลังค้นหา...</span>';
            
            // ค้นหาจาก options ที่มีในตัวเลือก
            let found = false;
            for (let i = 0; i < studentSelect.options.length; i++) {
                const option = studentSelect.options[i];
                const optionText = option.text || '';
                
                if (optionText.includes(searchStudentId)) {
                    studentSelect.value = option.value;
                    resultElement.innerHTML = `<span class="text-success">พบนักเรียน: ${optionText}</span>`;
                    found = true;
                    break;
                }
            }
            
            if (!found) {
                resultElement.innerHTML = '<span class="text-danger">ไม่พบนักเรียนที่มีรหัสนี้ในระบบ</span>';
            }
        }
    });
</script>
@endsection

@section('styles')
<style>
    /* Background light colors */
    .bg-info-light {
        background-color: rgba(13, 202, 240, 0.1) !important;
    }
    
    /* Animation effects */
    .fade-in {
        animation: fadeIn 0.5s ease-in-out;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
</style>
@endsection