<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#4F46E5">
    
    <title>{{ config('app.name', 'ระบบตัดคะแนนพฤติกรรมเด็ก') }}</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    
    <style>
        body {
            font-family: 'Prompt', sans-serif;
        }        
        .feature-card {
            background-color: white;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .header-section {
            padding-bottom: 8rem;
        }

        .feature-section {
            margin-top: -6rem;
        }

        .card-border-top-indigo {
            border-top: 4px solid #6610f2;
        }

        .card-border-top-green {
            border-top: 4px solid #198754;
        }

        .card-border-top-orange {
            border-top: 4px solid #fd7e14;
        }

        .feature-icon {
            padding: 0.75rem;
            border-radius: 50%;
            display: inline-flex;
        }

        .icon-indigo {
            background-color: #e0cffc;
            color: #6610f2;
        }

        .icon-green {
            background-color: #d1e7dd;
            color: #198754;
        }

        .icon-orange {
            background-color: #ffe5d0;
            color: #fd7e14;
        }

        .stats-card {
            padding: 1rem;
            border-radius: 0.5rem;
            text-align: center;
        }

        .bg-indigo-light {
            background-color: #e0cffc;
        }

        .text-indigo {
            color: #6610f2;
        }

        .bg-green-light {
            background-color: #d1e7dd;
        }

        .text-green {
            color: #198754;
        }

        .bg-yellow-light {
            background-color: #fff3cd;
        }

        .text-yellow {
            color: #ffc107;
        }

        .bg-red-light {
            background-color: #f8d7da;
        }

        .text-red {
            color: #dc3545;
        }

        .footer-divider {
            border-top: 1px solid rgba(255,255,255,0.2);
            margin-top: 2rem;
            padding-top: 1.5rem;
        }
    </style>

</head>
<body class="bg-light">
    <div class="min-vh-100">
        <!-- Header with Gradient -->
        <div class="bg-gradient shadow header-section">
            <nav class="container-fluid py-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="me-2 text-white" width="32" height="32" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                        </svg>
                        <h4 class="fw-bold text-white mb-0">ระบบตัดคะแนนพฤติกรรมนักเรียน</h4>
                    </div>
                    
                    <div class="d-none d-sm-flex">
                        @if (Route::has('login'))
                            <div class="d-flex gap-2">
                                @auth
                                    <a href="{{ url('/behavior') }}" class="btn btn-light text-primary">แดชบอร์ด</a>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-light text-primary">เข้าสู่ระบบ</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="btn btn-primary ms-2">ลงทะเบียน</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </nav>
            
            <div class="container-fluid py-5">
                <div class="row align-items-center">
                    <div class="col-md text-center">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="img-fluid" style="max-height: 150px;">
                        <h2 class="display-5 fw-bold text-white mb-3">ระบบสารสนเทศจัดการคะแนนวินัยโรงเรียนนวมินทราชูทิศมัชฌิ</h2>
                        <p class="text-white opacity-75">
                            บันทึก ติดตาม และวิเคราะห์พฤติกรรมนักเรียนอย่างเป็นระบบ เพื่อการพัฒนาที่ยั่งยืน
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main Content - Feature Cards -->
        <div class="container feature-section">
            <div class="row g-4">
                <!-- Feature Card 1 -->
                <div class="col-md-4">
                    <div class="card shadow feature-card card-border-top-indigo">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="feature-icon icon-indigo">
                                    <i class="bi bi-gear-fill"></i>
                                </div>
                                <h3 class="h5 fw-semibold text-dark ms-3 mb-0">บันทึกพฤติกรรม</h3>
                            </div>
                            <p class="text-muted">บันทึกข้อมูลพฤติกรรมนักเรียนได้อย่างรวดเร็ว ทั้งการหักคะแนนและการเพิ่มคะแนนจากพฤติกรรมที่ดี</p>
                            <a href="{{ route('behavior.deduct') }}" class="text-primary text-decoration-none d-inline-flex align-items-center">
                                ใช้งานเลย
                                <i class="bi bi-chevron-right ms-1 small"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Feature Card 2 -->
                <div class="col-md-4">
                    <div class="card shadow feature-card card-border-top-green">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="feature-icon icon-green">
                                    <i class="bi bi-bar-chart-line-fill"></i>
                                </div>
                                <h3 class="h5 fw-semibold text-dark ms-3 mb-0">รายงานและกราฟ</h3>
                            </div>
                            <p class="text-muted">วิเคราะห์ข้อมูลด้วยกราฟและรายงานที่หลากหลาย เพื่อติดตามพัฒนาการและแนวโน้มพฤติกรรม</p>
                            <a href="{{ route('behavior.reports') }}" class="text-success text-decoration-none d-inline-flex align-items-center">
                                ดูรายงาน
                                <i class="bi bi-chevron-right ms-1 small"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Feature Card 3 -->
                <div class="col-md-4">
                    <div class="card shadow feature-card card-border-top-orange">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="feature-icon icon-orange">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                                <h3 class="h5 fw-semibold text-dark ms-3 mb-0">จัดการนักเรียน</h3>
                            </div>
                            <p class="text-muted">จัดการข้อมูลนักเรียน ดูประวัติ และติดตามพฤติกรรมรายบุคคลอย่างละเอียด</p>
                            <a href="#" class="text-warning text-decoration-none d-inline-flex align-items-center">
                                จัดการนักเรียน
                                <i class="bi bi-chevron-right ms-1 small"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Statistics Section -->

        </div>
        
        <!-- Call To Action -->
        <div class="bg-secondary" style="padding-top: 20vh;">
            
        </div>
        
        <!-- Footer -->
        <footer class="bg-dark text-white-50 py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-4 mb-md-0">
                        <h3 class="h5 text-white mb-2">ระบบจัดการคะแนนพฤติกรรมนักเรียนและติดตาม</h3>
                        <p class="small">ระบบจัดการและติดตามพฤติกรรมนักเรียนอย่างมีประสิทธิภาพ</p>
                    </div>
                    
                    <div class="col-md-8">
                        <div class="row">

                            <div class="col-6">

                            </div>

                            <div class="col-6">
                                <h4 class="small fw-semibold text-white mb-2">เมนูหลัก</h4>
                                <ul class="nav flex-column small">
                                    <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-white-50">แดชบอร์ด</a></li>
                                    <li class="nav-item mb-1"><a href="{{ route('behavior.deduct') }}" class="nav-link p-0 text-white-50">หักคะแนนพฤติกรรม</a></li>
                                    <li class="nav-item mb-1"><a href="{{ route('behavior.reports') }}" class="nav-link p-0 text-white-50">รายงานพฤติกรรม</a></li>
                                    <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-white-50">จัดการนักเรียน</a></li>
                                </ul>
                            </div>
                        
                        </div>
                    </div>
                </div>
                
            </div>
        </footer>
    </div>
</body>
</html>