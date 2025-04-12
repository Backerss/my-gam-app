<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ระบบสารสนเทศจัดการคะแนนวินัยโรงเรียนนวมินทราชูทิศมัชฌิ') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <meta name="theme-color" content="#4F46E5">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Prompt', sans-serif;
        }
        
        .bg-gradient {
            background: #1020AD;
        }
        
        /* Animation */
        .fade-in {
            animation: fadeIn 0.3s ease-in;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .slide-in-up {
            animation: slideInUp 0.3s ease-out;
        }
        
        @keyframes slideInUp {
            from {
                transform: translateY(10px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        /* Scrollbar */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        
        /* Content padding for mobile navigation */
        @media (max-width: 768px) {
            .has-mobile-nav {
                padding-bottom: 4rem;
            }
        }

        /* Main content transition */
        .main-content {
            transition: margin-left 0.3s ease-in-out;
        }
        
        @media (min-width: 768px) {
            .main-content {
                margin-left: 256px;
            }
        }
    </style>
</head>
<body class="bg-light text-dark">
    <div class="min-vh-100 d-flex flex-column">
        <!-- Top Navigation -->
        <header class="bg-gradient shadow-sm sticky-top">
            <div class="container-fluid px-3 px-sm-4 px-lg-5">
                <div class="d-flex justify-content-between" style="height: 64px;">
                    <div class="d-flex align-items-center">
                        <!-- Mobile menu button -->
                        <button id="mobile-menu-button" type="button" class="d-md-none p-2 rounded text-white btn btn-link border-0">
                            <i class="bi bi-list fs-4"></i>
                        </button>
                    
                        <div class="fs-5 fw-bold text-white d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="32" height="32" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                            </svg>
                            ระบบสารสนเทศจัดการคะแนนวินัยโรงเรียนนวมินทราชูทิศมัชฌิ
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center gap-3">
                        <!-- Notification button -->
                        <button type="button" id="notification-button" class="btn btn-link p-2 rounded-circle text-white border-0 position-relative">
                            <span class="position-absolute top-0 end-0 badge rounded-pill bg-danger" style="transform: translate(30%, -30%);">3</span>
                            <i class="bi bi-bell fs-5"></i>
                        </button>
                        
                        <!-- User profile dropdown -->
                        <div class="dropdown">
                            <button id="profile-dropdown-button" class="btn btn-link border-0 d-flex align-items-center text-white rounded-pill px-2 py-1">
                                <span class="me-2 d-none d-sm-inline ">Administrator</span>
                                <div class="rounded-circle bg-white text-primary d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px;">
                                    A
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Notifications Dropdown -->
        <div id="notification-dropdown" class="card shadow position-absolute end-0 mt-2" style="width: 320px; display: none; z-index: 1050;">
            <div class="py-2">
                <div class="px-3 py-2 border-bottom">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">การแจ้งเตือน</h6>
                        <a href="{{ route('behavior.notifications') }}" class="text-primary small">ดูทั้งหมด</a>
                    </div>
                </div>
                
                <!-- Notification items -->
                <div style="max-height: 240px; overflow-y: auto;">
                    <!-- Unread notification -->
                    <a href="#" class="d-block px-3 py-3 hover-bg-light border-start border-4 border-primary text-decoration-none">
                        <div class="d-flex">
                            <div class="me-3">
                                <div class="rounded-circle bg-primary-light text-primary d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                    <i class="bi bi-exclamation-triangle small"></i>
                                </div>
                            </div>
                            <div>
                                <p class="mb-1 small fw-medium text-dark">มีนักเรียนถูกตัดคะแนน</p>
                                <p class="mb-1 x-small text-muted">นักเรียนรหัส 12345 ถูกตัดคะแนน 5 คะแนน</p>
                                <p class="mb-0 x-small text-muted">1 นาทีที่แล้ว</p>
                            </div>
                        </div>
                    </a>
                    
                    <!-- More notifications... -->
                </div>
                
                <!-- Footer -->
                <div class="px-3 py-2 border-top">
                    <button type="button" class="btn btn-primary btn-sm w-100 py-2">
                        ทำเครื่องหมายว่าอ่านแล้วทั้งหมด
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Profile Dropdown -->
        <div id="profile-dropdown" class="card shadow position-absolute end-0 mt-2" style="width: 200px; display: none; z-index: 1050;">
            <div class="py-1">
                <a href="{{ route('behavior.profile.show') }}" class="dropdown-item py-2 px-3">ข้อมูลส่วนตัว</a>
                <a href="#" class="dropdown-item py-2 px-3">ตั้งค่า</a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item py-2 px-3 text-start w-100">ออกจากระบบ</button>
                </form>
            </div>
        </div>

        <div class="d-flex flex-grow-1 overflow-hidden">
            <!-- Include unified navigation component -->
            @include('components.navigation')

            <!-- Main Content with responsive margin -->
            <main class="flex-grow-1 overflow-auto p-4 has-mobile-nav main-content">
                <div class="container-xl mx-auto fade-in pb-4 pb-md-0">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle sidebar on mobile
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('d-none');
            sidebar.classList.toggle('open');
            
            // Show/hide mobile navigation when sidebar is toggled
            const mobileNav = document.querySelector('.navigation-container nav.d-md-none');
            if (mobileNav) {
                if (sidebar.classList.contains('open')) {
                    mobileNav.style.display = 'none';
                } else {
                    mobileNav.style.display = 'flex';
                }
            }
        });
        
        // Toggle profile dropdown
        document.getElementById('profile-dropdown-button').addEventListener('click', function(e) {
            e.preventDefault();
            const dropdown = document.getElementById('profile-dropdown');
            dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
            
            // Update position
            const buttonRect = this.getBoundingClientRect();
            dropdown.style.top = (buttonRect.bottom + window.scrollY) + 'px';
            dropdown.style.right = (window.innerWidth - buttonRect.right) + 'px';
            
            // Hide notification dropdown
            document.getElementById('notification-dropdown').style.display = 'none';
        });
        
        // Toggle notification dropdown
        document.getElementById('notification-button').addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const dropdown = document.getElementById('notification-dropdown');
            dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
            
            // Update position
            const buttonRect = this.getBoundingClientRect();
            dropdown.style.top = (buttonRect.bottom + window.scrollY) + 'px';
            dropdown.style.right = (window.innerWidth - buttonRect.right) + 'px';
            
            // Hide profile dropdown
            document.getElementById('profile-dropdown').style.display = 'none';
        });
        
        // Close dropdowns when clicking outside
        window.addEventListener('click', function(e) {
            if (!e.target.closest('#profile-dropdown-button') && !e.target.closest('#profile-dropdown')) {
                document.getElementById('profile-dropdown').style.display = 'none';
            }
            if (!e.target.closest('#notification-button') && !e.target.closest('#notification-dropdown')) {
                document.getElementById('notification-dropdown').style.display = 'none';
            }
        });

        // Mobile navigation
        document.addEventListener('DOMContentLoaded', function() {
            if (window.innerWidth < 768) {
                const mobileNav = document.querySelector('.navigation-container nav.d-md-none');
                if (mobileNav) {
                    mobileNav.style.display = 'flex';
                }
            }
        });
    </script>
    @yield('scripts')
</body>
</html>