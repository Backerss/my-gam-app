@extends('layouts.app')

@section('content')
<div class="fade-in">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <i class="fas fa-cogs me-2"></i>ตั้งค่าระบบ
                            </h5>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <ul class="nav nav-tabs mb-4" id="settingsTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="school-tab" data-bs-toggle="tab" data-bs-target="#school" type="button" role="tab" aria-controls="school" aria-selected="true">
                                    <i class="fas fa-school me-2"></i>ข้อมูลโรงเรียน
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="rules-tab" data-bs-toggle="tab" data-bs-target="#rules" type="button" role="tab" aria-controls="rules" aria-selected="false">
                                    <i class="fas fa-gavel me-2"></i>กฎระเบียบและคะแนน
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="system-tab" data-bs-toggle="tab" data-bs-target="#system" type="button" role="tab" aria-controls="system" aria-selected="false">
                                    <i class="fas fa-sliders-h me-2"></i>ตั้งค่าทั่วไป
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content" id="settingsTabContent">
                            <!-- ข้อมูลโรงเรียน -->
                            <div class="tab-pane fade show active" id="school" role="tabpanel" aria-labelledby="school-tab">
                                <form action="#" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
                                    @csrf
                                    <div class="card border mb-4">
                                        <div class="card-header bg-light">
                                            <h6 class="mb-0">ข้อมูลทั่วไปของโรงเรียน</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="school_name" class="form-label">ชื่อโรงเรียน <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="school_name" name="school_name" value="{{ old('school_name', $settings['school_name'] ?? 'โรงเรียนมัธยมตัวอย่าง') }}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="school_id" class="form-label">รหัสโรงเรียน <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="school_id" name="school_id" value="{{ old('school_id', $settings['school_id'] ?? '1234567890') }}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <label for="school_address" class="form-label">ที่อยู่</label>
                                                    <textarea class="form-control" id="school_address" name="school_address" rows="3">{{ old('school_address', $settings['school_address'] ?? '123 ถนนตัวอย่าง แขวง/ตำบล ตัวอย่าง เขต/อำเภอ ตัวอย่าง จังหวัด กรุงเทพมหานคร 10000') }}</textarea>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="school_type" class="form-label">ประเภทโรงเรียน <span class="text-danger">*</span></label>
                                                    <select class="form-select" id="school_type" name="school_type" required>
                                                        <option value="elementary" {{ (old('school_type', $settings['school_type'] ?? '') == 'elementary') ? 'selected' : '' }}>ประถมศึกษา</option>
                                                        <option value="middle" {{ (old('school_type', $settings['school_type'] ?? 'middle') == 'middle') ? 'selected' : '' }}>มัธยมศึกษาตอนต้น</option>
                                                        <option value="high" {{ (old('school_type', $settings['school_type'] ?? '') == 'high') ? 'selected' : '' }}>มัธยมศึกษาตอนปลาย</option>
                                                        <option value="full" {{ (old('school_type', $settings['school_type'] ?? '') == 'full') ? 'selected' : '' }}>มัธยมศึกษา (ม.1-ม.6)</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="school_logo" class="form-label">โลโก้โรงเรียน</label>
                                                    <input type="file" class="form-control" id="school_logo" name="school_logo">
                                                    <small class="text-muted">รองรับไฟล์ PNG, JPG ขนาดไม่เกิน 2MB</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card border mb-4">
                                        <div class="card-header bg-light">
                                            <h6 class="mb-0">ข้อมูลผู้บริหาร</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="director_name" class="form-label">ชื่อผู้อำนวยการ</label>
                                                    <input type="text" class="form-control" id="director_name" name="director_name" value="{{ old('director_name', $settings['director_name'] ?? '') }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="deputy_name" class="form-label">ชื่อรองผู้อำนวยการฝ่ายกิจการนักเรียน</label>
                                                    <input type="text" class="form-control" id="deputy_name" name="deputy_name" value="{{ old('deputy_name', $settings['deputy_name'] ?? '') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save me-2"></i>บันทึกข้อมูลโรงเรียน
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <!-- กฎระเบียบและคะแนน -->
                            <div class="tab-pane fade" id="rules" role="tabpanel" aria-labelledby="rules-tab">
                                <form action="#" method="POST" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="card border mb-4">
                                        <div class="card-header bg-light">
                                            <h6 class="mb-0">คะแนนความประพฤติพื้นฐาน</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="base_score" class="form-label">คะแนนเริ่มต้นประจำปีการศึกษา <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" id="base_score" name="base_score" value="{{ old('base_score', $settings['base_score'] ?? 100) }}" min="0" max="1000" required>
                                                    <small class="text-muted">คะแนนเริ่มต้นเมื่อเข้าสู่ปีการศึกษาใหม่</small>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="critical_score" class="form-label">คะแนนขั้นวิกฤต <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" id="critical_score" name="critical_score" value="{{ old('critical_score', $settings['critical_score'] ?? 60) }}" min="0" max="100" required>
                                                    <small class="text-muted">คะแนนที่ต้องเข้าสู่กระบวนการดูแลเป็นพิเศษ</small>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch mb-3">
                                                <input class="form-check-input" type="checkbox" id="reset_yearly" name="reset_yearly" {{ old('reset_yearly', $settings['reset_yearly'] ?? true) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="reset_yearly">รีเซ็ตคะแนนทุกปีการศึกษา</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card border mb-4">
                                        <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                            <h6 class="mb-0">หมวดหมู่ความประพฤติ</h6>
                                            <button type="button" class="btn btn-sm btn-outline-primary" id="addCategoryBtn">
                                                <i class="fas fa-plus me-1"></i>เพิ่มหมวดหมู่
                                            </button>
                                        </div>
                                        <div class="card-body">
                                            <div id="categories-container">
                                                @foreach (old('categories', $settings['categories'] ?? [
                                                    ['id' => 'attendance', 'name' => 'การเข้าเรียน', 'description' => 'การมาโรงเรียนและเข้าเรียนตามเวลา'],
                                                    ['id' => 'uniform', 'name' => 'เครื่องแต่งกาย', 'description' => 'การแต่งกายตามระเบียบของโรงเรียน'],
                                                    ['id' => 'behavior', 'name' => 'พฤติกรรมทั่วไป', 'description' => 'พฤติกรรมการปฏิบัติตามระเบียบโรงเรียน']
                                                ]) as $index => $category)
                                                <div class="card border mb-3 category-item">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-4 mb-3">
                                                                <label for="category_id_{{ $index }}" class="form-label">รหัส</label>
                                                                <input type="text" class="form-control" id="category_id_{{ $index }}" name="categories[{{ $index }}][id]" value="{{ $category['id'] }}" required>
                                                            </div>
                                                            <div class="col-md-8 mb-3">
                                                                <label for="category_name_{{ $index }}" class="form-label">ชื่อหมวดหมู่</label>
                                                                <input type="text" class="form-control" id="category_name_{{ $index }}" name="categories[{{ $index }}][name]" value="{{ $category['name'] }}" required>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="category_desc_{{ $index }}" class="form-label">คำอธิบาย</label>
                                                                <textarea class="form-control" id="category_desc_{{ $index }}" name="categories[{{ $index }}][description]" rows="2">{{ $category['description'] }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="text-end mt-2">
                                                            <button type="button" class="btn btn-sm btn-outline-danger remove-category">
                                                                <i class="fas fa-trash me-1"></i>ลบหมวดหมู่
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save me-2"></i>บันทึกกฎระเบียบและคะแนน
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <!-- ตั้งค่าทั่วไป -->
                            <div class="tab-pane fade" id="system" role="tabpanel" aria-labelledby="system-tab">
                                <form action="#" method="POST" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="card border mb-4">
                                        <div class="card-header bg-light">
                                            <h6 class="mb-0">การแจ้งเตือน</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-check form-switch mb-3">
                                                <input class="form-check-input" type="checkbox" id="enable_parent_notification" name="enable_parent_notification" {{ old('enable_parent_notification', $settings['enable_parent_notification'] ?? true) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="enable_parent_notification">การแจ้งเตือนผู้ปกครองเมื่อมีการหักคะแนน</label>
                                            </div>
                                            <div class="form-check form-switch mb-3">
                                                <input class="form-check-input" type="checkbox" id="enable_teacher_notification" name="enable_teacher_notification" {{ old('enable_teacher_notification', $settings['enable_teacher_notification'] ?? true) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="enable_teacher_notification">การแจ้งเตือนครูประจำชั้นเมื่อมีการหักคะแนน</label>
                                            </div>
                                            <div class="form-check form-switch mb-3">
                                                <input class="form-check-input" type="checkbox" id="enable_critical_alert" name="enable_critical_alert" {{ old('enable_critical_alert', $settings['enable_critical_alert'] ?? true) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="enable_critical_alert">การแจ้งเตือนเมื่อคะแนนถึงขั้นวิกฤต</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card border mb-4">
                                        <div class="card-header bg-light">
                                            <h6 class="mb-0">ปีการศึกษา</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="current_year" class="form-label">ปีการศึกษาปัจจุบัน <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" id="current_year" name="current_year" value="{{ old('current_year', $settings['current_year'] ?? date('Y') + 543) }}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="current_semester" class="form-label">ภาคเรียนปัจจุบัน <span class="text-danger">*</span></label>
                                                    <select class="form-select" id="current_semester" name="current_semester" required>
                                                        <option value="1" {{ (old('current_semester', $settings['current_semester'] ?? 1) == 1) ? 'selected' : '' }}>ภาคเรียนที่ 1</option>
                                                        <option value="2" {{ (old('current_semester', $settings['current_semester'] ?? '') == 2) ? 'selected' : '' }}>ภาคเรียนที่ 2</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card border mb-4">
                                        <div class="card-header bg-light">
                                            <h6 class="mb-0">ข้อมูลการเข้าถึง</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="parent_access_duration" class="form-label">ระยะเวลาการเข้าถึงข้อมูลของผู้ปกครอง (ชั่วโมง)</label>
                                                    <input type="number" class="form-control" id="parent_access_duration" name="parent_access_duration" value="{{ old('parent_access_duration', $settings['parent_access_duration'] ?? 24) }}" min="1" max="168">
                                                    <small class="text-muted">จำนวนชั่วโมงที่ผู้ปกครองสามารถเข้าดูข้อมูลได้หลังจากยืนยันตัวตน</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save me-2"></i>บันทึกการตั้งค่าทั่วไป
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Initialize Bootstrap validation
    (() => {
        'use strict';

        const forms = document.querySelectorAll('.needs-validation');
        
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();

    // Handle category management
    document.addEventListener('DOMContentLoaded', function() {
        // Add new category
        document.getElementById('addCategoryBtn').addEventListener('click', function() {
            const categoriesContainer = document.getElementById('categories-container');
            const categoryItems = document.querySelectorAll('.category-item');
            const newIndex = categoryItems.length;
            
            const newCategoryHtml = `
                <div class="card border mb-3 category-item">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="category_id_${newIndex}" class="form-label">รหัส</label>
                                <input type="text" class="form-control" id="category_id_${newIndex}" name="categories[${newIndex}][id]" required>
                            </div>
                            <div class="col-md-8 mb-3">
                                <label for="category_name_${newIndex}" class="form-label">ชื่อหมวดหมู่</label>
                                <input type="text" class="form-control" id="category_name_${newIndex}" name="categories[${newIndex}][name]" required>
                            </div>
                            <div class="col-md-12">
                                <label for="category_desc_${newIndex}" class="form-label">คำอธิบาย</label>
                                <textarea class="form-control" id="category_desc_${newIndex}" name="categories[${newIndex}][description]" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="text-end mt-2">
                            <button type="button" class="btn btn-sm btn-outline-danger remove-category">
                                <i class="fas fa-trash me-1"></i>ลบหมวดหมู่
                            </button>
                        </div>
                    </div>
                </div>
            `;
            
            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = newCategoryHtml.trim();
            const newCategory = tempDiv.firstChild;
            
            categoriesContainer.appendChild(newCategory);
            
            // Add event listener for the new remove button
            newCategory.querySelector('.remove-category').addEventListener('click', removeCategory);
        });
        
        // Remove category
        document.querySelectorAll('.remove-category').forEach(button => {
            button.addEventListener('click', removeCategory);
        });
        
        function removeCategory() {
            if (confirm('คุณแน่ใจหรือไม่ที่จะลบหมวดหมู่นี้?')) {
                this.closest('.category-item').remove();
            }
        }
    });

    // ป้องกันการ submit form ทั้งหมดในหน้านี้
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            alert('ฟีเจอร์นี้อยู่ระหว่างการพัฒนา');
            return false;
        });
    });
</script>
@endsection