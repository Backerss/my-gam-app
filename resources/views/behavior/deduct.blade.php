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

    <!-- Search Bar -->
    <div class="mb-4">
        <div class="input-group">
            <span class="input-group-text bg-white border-end-0">
                <i class="bi bi-search text-muted"></i>
            </span>
            <input type="text" class="form-control border-start-0" placeholder="ค้นหานักเรียนด้วยชื่อหรือรหัส...">
        </div>
    </div>

    <!-- Class Selector -->
    <div class="mb-4 fade-in">
        <div class="d-flex overflow-auto pb-2 gap-2 scrollbar-hide">
            <button class="btn btn-primary rounded-pill px-3">ทั้งหมด</button>
            <button class="btn btn-outline-secondary rounded-pill px-3">ม.1/1</button>
            <button class="btn btn-outline-secondary rounded-pill px-3">ม.1/2</button>
            <button class="btn btn-outline-secondary rounded-pill px-3">ม.2/1</button>
            <button class="btn btn-outline-secondary rounded-pill px-3">ม.2/2</button>
            <button class="btn btn-outline-secondary rounded-pill px-3">ม.3/1</button>
        </div>
    </div>

    <!-- Student List -->
    <div class="card shadow slide-in-up">
        <!-- List Header -->
        <div class="card-header bg-light py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 small fw-medium text-dark">รายการนักเรียน</h5>
                <div class="small text-muted">พบ 4 คน</div>
            </div>
        </div>
        
        <div class="list-group list-group-flush">
            <!-- Student Item -->
            <div class="list-group-item p-3 student-item" onclick="openDeductModal(1)">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="student-avatar me-3">
                            ธง
                        </div>
                        <div>
                            <h6 class="mb-1">ธงชัย ใจดี</h6>
                            <div class="d-flex align-items-center small">
                                <span class="text-muted">รหัส: ST001</span>
                                <span class="mx-2 text-muted">•</span>
                                <span class="text-muted">ม.1/1</span>
                                <span class="ms-2 badge bg-success-light text-success">คะแนนดี</span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="me-3 text-end">
                            <div class="fw-semibold">95 คะแนน</div>
                            <div class="small text-success">+5 เดือนนี้</div>
                        </div>
                        <i class="bi bi-chevron-right text-muted"></i>
                    </div>
                </div>
            </div>

            <!-- More student items... -->
        </div>
        
        <!-- Pagination -->
        <div class="card-footer bg-white py-3">
            <nav aria-label="Page navigation">
                <ul class="pagination mb-0 justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">ก่อนหน้า</span>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">ถัดไป</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Deduct Points Modal -->
    <div id="deductModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalStudentName">หักคะแนนพฤติกรรม - ชื่อนักเรียน</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closeDeductModal()"></button>
                </div>
                <div class="modal-body">
                    <!-- Current Points Info -->
                    <div class="bg-primary-light rounded p-3 mb-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="small text-primary mb-1">คะแนนปัจจุบัน</p>
                                <h3 class="fw-bold text-primary mb-0">95</h3>
                            </div>
                            <div class="text-end">
                                <p class="small text-primary mb-1">ประวัติย้อนหลัง</p>
                                <p class="small text-primary mb-0">6 ครั้งในเดือนนี้</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Category Buttons -->
                    <div class="mb-4 slide-in-up">
                        <p class="small fw-medium text-dark mb-2">หมวดหมู่พฤติกรรม</p>
                        <div class="d-flex overflow-auto gap-2 pb-2 scrollbar-hide">
                            <button class="btn btn-primary btn-sm rounded-pill">ทั้งหมด</button>
                            <button class="btn btn-outline-secondary btn-sm rounded-pill">ในห้องเรียน</button>
                            <button class="btn btn-outline-secondary btn-sm rounded-pill">วินัย</button>
                            <button class="btn btn-outline-secondary btn-sm rounded-pill">การแต่งกาย</button>
                            <button class="btn btn-outline-secondary btn-sm rounded-pill">อื่นๆ</button>
                        </div>
                    </div>

                    <!-- Rules -->
                    <div class="mb-4">
                        <p class="small fw-medium text-dark mb-2">เลือกกฎการหักคะแนน</p>
                        
                        <div class="form-check border rounded p-3 mb-2">
                            <input class="form-check-input" type="radio" name="rule" id="rule1">
                            <label class="form-check-label w-100" for="rule1">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="fw-medium">มาสาย</div>
                                        <small class="text-muted">ในห้องเรียน</small>
                                    </div>
                                    <span class="badge bg-danger-light text-danger">-5 คะแนน</span>
                                </div>
                            </label>
                        </div>
                        
                        <!-- More rules... -->
                    </div>

                    <!-- Additional fields -->
                    <div class="mb-3">
                        <label for="comments" class="form-label small fw-medium text-dark">หมายเหตุเพิ่มเติม</label>
                        <textarea id="comments" class="form-control" rows="3" placeholder="เพิ่มบันทึกรายละเอียดเกี่ยวกับพฤติกรรม..."></textarea>
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-6">
                            <label for="date" class="form-label small fw-medium text-dark">วันที่</label>
                            <input type="date" id="date" class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="time" class="form-label small fw-medium text-dark">เวลา</label>
                            <input type="time" id="time" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" onclick="closeDeductModal()">ยกเลิก</button>
                    <button type="button" class="btn btn-primary">ยืนยันการหักคะแนน</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function openDeductModal(studentId) {
        // In a real app, you'd fetch student data based on the ID
        const studentNames = {
            1: 'ธงชัย ใจดี',
            2: 'สมศรี รักเรียน',
            3: 'ประเสริฐ มุ่งมั่น',
            4: 'มนัสนันท์ พากเพียร'
        };
        
        document.getElementById('modalStudentName').textContent = `หักคะแนนพฤติกรรม - ${studentNames[studentId]}`;
        var myModal = new bootstrap.Modal(document.getElementById('deductModal'));
        myModal.show();
    }
    
    function closeDeductModal() {
        var myModal = bootstrap.Modal.getInstance(document.getElementById('deductModal'));
        if (myModal) {
            myModal.hide();
        }
    }
</script>
@endsection