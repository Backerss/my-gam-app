@extends('layouts.app')

@section('content')
<div class="fade-in">
    <!-- Page Header -->
    <div class="bg-white rounded-lg shadow-sm mb-4 p-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="fs-4 fw-bold text-dark mb-0">เพิ่มผู้ปกครองใหม่</h1>
            <a href="{{ route('behavior.parents.index') }}" class="btn btn-outline-secondary d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left me-2" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
                กลับไปหน้ารายการ
            </a>
        </div>
    </div>

    <!-- Form Card -->
    <div class="card shadow-lg rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <form action="{{ route('behavior.parents.store') }}" method="POST">
                @csrf
                
                <div class="row g-0">
                    <!-- ข้อมูลส่วนตัวผู้ปกครอง -->
                    <div class="col-lg-6 border-end">
                        <div class="p-4">
                            <h2 class="fs-5 fw-semibold text-dark mb-3">ข้อมูลผู้ปกครอง</h2>
                            
                            @if ($errors->any())
                            <div class="alert alert-danger mb-3">
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
                                    id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                                @error('first_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="last_name" class="form-label small text-secondary">นามสกุล <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" 
                                    id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                                @error('last_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="relation_type" class="form-label small text-secondary">ความสัมพันธ์กับผู้เรียน <span class="text-danger">*</span></label>
                                <select class="form-select @error('relation_type') is-invalid @enderror" 
                                    id="relation_type" name="relation_type" required>
                                    <option value="" selected disabled>กรุณาเลือกความสัมพันธ์</option>
                                    <option value="บิดา" {{ old('relation_type') == 'บิดา' ? 'selected' : '' }}>บิดา</option>
                                    <option value="มารดา" {{ old('relation_type') == 'มารดา' ? 'selected' : '' }}>มารดา</option>
                                    <option value="ผู้ปกครอง" {{ old('relation_type') == 'ผู้ปกครอง' ? 'selected' : '' }}>ผู้ปกครอง</option>
                                    <option value="ญาติ" {{ old('relation_type') == 'ญาติ' ? 'selected' : '' }}>ญาติ</option>
                                    <option value="อื่นๆ" {{ old('relation_type') == 'อื่นๆ' ? 'selected' : '' }}>อื่นๆ</option>
                                </select>
                                @error('relation_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="phone" class="form-label small text-secondary">เบอร์โทรศัพท์ <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                    id="phone" name="phone" value="{{ old('phone') }}" placeholder="0xx-xxx-xxxx" required>
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <!-- ข้อมูลนักเรียนที่เกี่ยวข้อง -->
                    <div class="col-lg-6">
                        <div class="p-4">
                            <h2 class="fs-5 fw-semibold text-dark mb-3">เชื่อมโยงกับนักเรียน</h2>
                            
                            <div class="mb-3">
                                <label for="student_id" class="form-label small text-secondary">เลือกนักเรียน <span class="text-danger">*</span></label>
                                <select class="form-select @error('student_id') is-invalid @enderror" id="student_id" name="student_id" required>
                                    <option value="" selected disabled>กรุณาเลือกนักเรียน</option>
                                    @foreach($students as $student)
                                    <option value="{{ $student['id'] }}" {{ old('student_id') == $student['id'] ? 'selected' : '' }}>
                                        {{ $student['name'] }} ({{ $student['id'] }}) - {{ $student['class'] }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('student_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mt-4">
                                <div class="card bg-light">
                                    <div class="card-header bg-light">
                                        <span class="fw-medium">ค้นหานักเรียนด้วยรหัส</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" id="search_student_id" 
                                                placeholder="ระบุรหัสนักเรียน">
                                            <button class="btn btn-outline-secondary" type="button" id="search_student_button">
                                                <i class="bi bi-search me-1"></i>ค้นหา
                                            </button>
                                        </div>
                                        <div id="search_result" class="small"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-save me-1"></i>บันทึกข้อมูล
                                    </button>
                                    <a href="{{ route('behavior.parents.index') }}" class="btn btn-outline-secondary">
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
                resultElement.innerHTML = '<span class="text-danger">ไม่พบนักเรียนที่มีรหัสนี้</span>';
            }
        });
        
        // ให้กด Enter ในช่องค้นหาแล้วค้นหาได้เลย
        document.getElementById('search_student_id').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                document.getElementById('search_student_button').click();
            }
        });
    });
</script>
@endsection