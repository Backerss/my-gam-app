@extends('layouts.app')

@section('content')
<div class="fade-in">
    <!-- Header -->
    <div class="bg-white rounded-lg shadow-sm mb-4 p-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="fs-4 fw-bold text-dark mb-0">แก้ไขข้อมูลนักเรียน</h1>
            <a href="{{ route('behavior.students') }}" class="btn btn-outline-secondary d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left me-2" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
                กลับไปหน้ารายการ
            </a>
        </div>
    </div>

    <!-- แจ้งเตือน -->
    <div class="alert alert-warning d-flex align-items-center mb-4" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-3" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
        <div>
            ตรวจสอบข้อมูลนักเรียน ข้อมูลที่แก้ไขจะถูกบันทึกลงในระบบ
        </div>
    </div>

    <div class="card shadow-lg rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <form action="{{ route('behavior.students.update', $student['student_id']) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row g-0">
                    <!-- ข้อมูลพื้นฐาน -->
                    <div class="col-lg-4 border-end">
                        <div class="p-4">
                            <h2 class="fs-5 fw-semibold text-dark mb-3">ข้อมูลพื้นฐาน</h2>
                            
                            <div class="mb-3">
                                <label for="name" class="form-label small text-gray-500">ชื่อ-สกุล</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $student['name'] }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="student_id" class="form-label small text-gray-500">รหัสนักเรียน</label>
                                <input type="text" class="form-control" id="student_id" name="student_id" value="{{ $student['student_id'] }}" readonly>
                                <small class="text-muted">ไม่สามารถแก้ไขรหัสนักเรียนได้</small>
                            </div>

                            <div class="mb-3">
                                <label for="class" class="form-label small text-gray-500">ชั้นเรียน</label>
                                <select class="form-select" id="class" name="class" required>
                                    <option value="">เลือกชั้นเรียน</option>
                                    <option value="ม.1/1" {{ $student['class'] == 'ม.1/1' ? 'selected' : '' }}>ม.1/1</option>
                                    <option value="ม.1/2" {{ $student['class'] == 'ม.1/2' ? 'selected' : '' }}>ม.1/2</option>
                                    <option value="ม.2/1" {{ $student['class'] == 'ม.2/1' ? 'selected' : '' }}>ม.2/1</option>
                                    <option value="ม.2/2" {{ $student['class'] == 'ม.2/2' ? 'selected' : '' }}>ม.2/2</option>
                                    <option value="ม.3/1" {{ $student['class'] == 'ม.3/1' ? 'selected' : '' }}>ม.3/1</option>
                                    <option value="ม.3/2" {{ $student['class'] == 'ม.3/2' ? 'selected' : '' }}>ม.3/2</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="id_card" class="form-label small text-gray-500">เลขบัตรประชาชน</label>
                                <input type="text" class="form-control" id="id_card" name="id_card" value="{{ $student['id_card'] ?? '' }}">
                            </div>
                        </div>
                    </div>

                    <!-- ข้อมูลติดต่อ -->
                    <div class="col-lg-4 border-end">
                        <div class="p-4">
                            <h2 class="fs-5 fw-semibold text-dark mb-3">ข้อมูลติดต่อ</h2>
                            
                            <div class="mb-3">
                                <label for="phone" class="form-label small text-gray-500">เบอร์โทรศัพท์</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $student['phone'] ?? '' }}">
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label small text-gray-500">ที่อยู่</label>
                                <textarea class="form-control" id="address" name="address" rows="3">{{ $student['address'] ?? '' }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="parent_name" class="form-label small text-gray-500">ชื่อผู้ปกครอง</label>
                                <input type="text" class="form-control" id="parent_name" name="parent_name" value="{{ $student['parent_name'] ?? '' }}">
                            </div>

                            <div class="mb-3">
                                <label for="parent_phone" class="form-label small text-gray-500">เบอร์โทรผู้ปกครอง</label>
                                <input type="text" class="form-control" id="parent_phone" name="parent_phone" value="{{ $student['parent_phone'] ?? '' }}">
                            </div>
                        </div>
                    </div>

                    <!-- ข้อมูลคะแนน -->
                    <div class="col-lg-4">
                        <div class="p-4">
                            <h2 class="fs-5 fw-semibold text-dark mb-3">ข้อมูลคะแนนพฤติกรรม</h2>
                            
                            <div class="mb-4">
                                <label for="current_score" class="form-label small text-gray-500">คะแนนปัจจุบัน</label>
                                <div class="position-relative">
                                    <input type="number" class="form-control form-control-lg fw-bold" id="current_score" name="current_score" value="{{ $student['current_score'] ?? '95' }}" min="0" max="100">
                                    <div class="progress mt-2" style="height: 8px;">
                                        <div class="progress-bar {{ ($student['current_score'] ?? 95) >= 80 ? 'bg-success' : (($student['current_score'] ?? 95) >= 60 ? 'bg-warning' : 'bg-danger') }}" role="progressbar" style="width: {{ $student['current_score'] ?? 95 }}%" aria-valuenow="{{ $student['current_score'] ?? 95 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <small class="text-muted">คะแนนเริ่มต้น 100 คะแนน</small>
                            </div>

                            <div class="alert alert-primary bg-primary-light border-0 d-flex align-items-center" role="alert" style="background-color: #e7f1ff;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill me-2 text-primary" viewBox="0 0 16 16">
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                </svg>
                                <div>
                                    การแก้ไขคะแนนพฤติกรรมโดยตรงจะถูกบันทึกเป็นประวัติในระบบ
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer with Submit Button -->
                <div class="card-footer bg-light border-top p-4 d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-secondary" onclick="history.back()">ยกเลิก</button>
                    <button type="submit" class="btn btn-primary px-4">บันทึกข้อมูล</button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Danger Zone -->
    <div class="card border-danger mt-4">
        <div class="card-header bg-danger bg-opacity-10 border-danger">
            <h3 class="card-title fs-5 fw-semibold text-danger mb-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill me-2" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                Danger Zone
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <h5 class="card-title">ลบข้อมูลนักเรียน</h5>
                    <p class="card-text text-muted">การลบข้อมูลนักเรียนจะไม่สามารถกู้คืนได้ และข้อมูลประวัติพฤติกรรมทั้งหมดจะถูกลบด้วย</p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteStudentModal">
                        ลบข้อมูลนักเรียน
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteStudentModal" tabindex="-1" aria-labelledby="deleteStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteStudentModalLabel">ยืนยันการลบข้อมูลนักเรียน</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-exclamation-triangle text-danger mb-3" viewBox="0 0 16 16">
                        <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                        <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
                    </svg>
                    <h4 class="fw-bold">คุณแน่ใจหรือไม่?</h4>
                    <p>การลบข้อมูลนักเรียน <strong>"{{ $student['name'] }}"</strong> จะไม่สามารถกู้คืนได้<br>และข้อมูลพฤติกรรมทั้งหมดจะถูกลบด้วย</p>
                </div>
                <form action="#" method="POST" id="deleteForm" onsubmit="simulateDelete(event)">
                    @csrf
                    @method('DELETE')
                    <div class="mb-3">
                        <label for="confirmText" class="form-label">พิมพ์ <strong>ลบข้อมูล</strong> เพื่อยืนยัน</label>
                        <input type="text" class="form-control" id="confirmText" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-danger" id="deleteButton" disabled>ลบข้อมูลนักเรียน</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('confirmText').addEventListener('input', function(e) {
        const deleteButton = document.getElementById('deleteButton');
        deleteButton.disabled = this.value !== 'ลบข้อมูล';
    });
    
    function simulateDelete(event) {
        event.preventDefault();
        alert('ระบบอยู่ระหว่างการพัฒนา: ในอนาคตระบบจะลบข้อมูลนักเรียนตามที่ร้องขอ');
        // ปิด modal
        const modal = bootstrap.Modal.getInstance(document.getElementById('deleteStudentModal'));
        if (modal) modal.hide();
    }
</script>
@endsection