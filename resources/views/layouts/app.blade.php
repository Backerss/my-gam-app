<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel App</title>
    <meta name="theme-color" content="#4F46E5">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Prompt', sans-serif;
        }
        
        .bg-gradient {
            background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);
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
<body class="font-sans antialiased bg-gray-50 text-gray-900">
    <div class="min-h-screen flex flex-col">
        <!-- Top Navigation -->
        <header class="bg-gradient shadow-md sticky top-0 z-40">
            <div class="max-w-full px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <!-- Mobile menu button -->
                        <button id="mobile-menu-button" type="button" class="md:hidden p-2 rounded-md text-white hover:bg-indigo-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    
                        <div class="text-xl font-bold text-white flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                            </svg>
                            {{ config('app.name', 'Student Behavior System') }}
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <!-- Notification button -->
                        <button type="button" id="notification-button" class="p-2 rounded-full text-white hover:bg-indigo-700 relative">
                            <span class="absolute top-0 right-0 inline-flex items-center justify-center w-4 h-4 text-xs font-bold leading-none text-white transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">3</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </button>
                        
                        <!-- Notifications Dropdown -->
                        <div id="notification-dropdown" class="origin-top-right absolute right-0 mt-2 w-80 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden z-50 slide-in-up">
                            <div class="py-2" role="menu" aria-orientation="vertical">
                                <div class="px-4 py-2 border-b border-gray-100">
                                    <div class="flex justify-between items-center">
                                        <h3 class="text-sm font-semibold text-gray-700">การแจ้งเตือน</h3>
                                        <a href="{{ route('behavior.notifications') }}" class="text-xs text-indigo-600 hover:text-indigo-800">ดูทั้งหมด</a>
                                    </div>
                                </div>
                                
                                <!-- Notification items -->
                                <div class="max-h-60 overflow-y-auto">
                                    <!-- Unread notification -->
                                    <a href="#" class="block px-4 py-3 hover:bg-gray-50 transition-colors border-l-4 border-indigo-500">
                                        <div class="flex">
                                            <div class="flex-shrink-0 mr-3">
                                                <div class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-500">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-900">มีนักเรียนถูกตัดคะแนน</p>
                                                <p class="text-xs text-gray-500 mt-1">นักเรียนรหัส 12345 ถูกตัดคะแนน 5 คะแนน</p>
                                                <p class="text-xs text-gray-400 mt-1">1 นาทีที่แล้ว</p>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <!-- Read notification -->
                                    <a href="#" class="block px-4 py-3 hover:bg-gray-50 transition-colors">
                                        <div class="flex">
                                            <div class="flex-shrink-0 mr-3">
                                                <div class="h-8 w-8 rounded-full bg-green-100 flex items-center justify-center text-green-500">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-700">นำเข้าข้อมูลสำเร็จ</p>
                                                <p class="text-xs text-gray-500 mt-1">การนำเข้าข้อมูลนักเรียนเสร็จสมบูรณ์</p>
                                                <p class="text-xs text-gray-400 mt-1">3 ชั่วโมงที่แล้ว</p>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <a href="#" class="block px-4 py-3 hover:bg-gray-50 transition-colors">
                                        <div class="flex">
                                            <div class="flex-shrink-0 mr-3">
                                                <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-500">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-700">ถึงเวลารายงานประจำสัปดาห์</p>
                                                <p class="text-xs text-gray-500 mt-1">รายงานสรุปคะแนนความประพฤตินักเรียน</p>
                                                <p class="text-xs text-gray-400 mt-1">1 วันที่แล้ว</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                
                                <!-- Footer -->
                                <div class="px-4 py-2 border-t border-gray-100">
                                    <button type="button" class="w-full py-2 px-3 text-xs font-medium text-center text-white bg-indigo-600 rounded-md hover:bg-indigo-700 transition-colors">
                                        ทำเครื่องหมายว่าอ่านแล้วทั้งหมด
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- User profile dropdown -->
                        <div class="relative">
                            <button id="profile-dropdown-button" class="flex items-center text-sm font-medium text-white hover:bg-indigo-700 rounded-full p-2">
                                <span class="mr-2 hidden sm:inline">Administrator</span>
                                <div class="h-8 w-8 rounded-full bg-white flex items-center justify-center text-indigo-600 font-bold">
                                    A
                                </div>
                            </button>
                            
                            <!-- Dropdown menu -->
                            <div id="profile-dropdown" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden z-50">
                                <div class="py-1" role="menu" aria-orientation="vertical">
                                    <a href="{{ route('behavior.profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">ข้อมูลส่วนตัว</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">ตั้งค่า</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">ออกจากระบบ</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="flex flex-1 overflow-hidden">
            <!-- Include unified navigation component -->
            @include('components.navigation')

            <!-- Main Content with responsive margin -->
            <main class="flex-1 overflow-y-auto p-4 has-mobile-nav main-content">
                <div class="max-w-7xl mx-auto fade-in pb-16 md:pb-0">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script>
        // Toggle sidebar on mobile
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('hidden');
            document.getElementById('sidebar').classList.toggle('open');
            
            // Show/hide mobile navigation when sidebar is toggled
            const mobileNav = document.querySelector('.navigation-container nav.hidden');
            if (mobileNav) {
                if (document.getElementById('sidebar').classList.contains('open')) {
                    mobileNav.style.display = 'none';
                } else {
                    mobileNav.style.display = 'flex';
                }
            }
        });
        
        // Toggle profile dropdown
        document.getElementById('profile-dropdown-button').addEventListener('click', function() {
            document.getElementById('profile-dropdown').classList.toggle('hidden');
        });
        
        // Close dropdown when clicking outside
        window.addEventListener('click', function(event) {
            if (!event.target.closest('#profile-dropdown-button') && !event.target.closest('#profile-dropdown')) {
                document.getElementById('profile-dropdown').classList.add('hidden');
            }
        });

        // Toggle notification dropdown
        document.getElementById('notification-button').addEventListener('click', function(event) {
            event.stopPropagation();
            
            // จัดการกับตำแหน่ง dropdown
            const button = this;
            const dropdown = document.getElementById('notification-dropdown');
            
            // คำนวณตำแหน่งของ dropdown ตามตำแหน่งของปุ่ม
            const buttonRect = button.getBoundingClientRect();
            dropdown.style.top = (buttonRect.bottom + window.scrollY) + 'px';
            dropdown.style.right = (window.innerWidth - buttonRect.right) + 'px';
            
            // สลับการแสดง/ซ่อน dropdown
            dropdown.classList.toggle('hidden');
            
            // ซ่อน profile dropdown ถ้ากำลังแสดงอยู่
            document.getElementById('profile-dropdown').classList.add('hidden');
        });
        
        // Close notification dropdown when clicking outside
        window.addEventListener('click', function(event) {
            if (!event.target.closest('#notification-button') && !event.target.closest('#notification-dropdown')) {
                document.getElementById('notification-dropdown').classList.add('hidden');
            }
        });

        // On page load, ensure mobile navigation is visible on small screens
        document.addEventListener('DOMContentLoaded', function() {
            if (window.innerWidth < 768) {
                const mobileNav = document.querySelector('.navigation-container nav.hidden');
                if (mobileNav) {
                    mobileNav.style.display = 'flex';
                }
            }
        });

        // ปุ่มทำเครื่องหมายว่าอ่านแล้วทั้งหมด
        document.querySelector('#notification-dropdown .px-4.py-2.border-t button').addEventListener('click', function() {
            // ส่ง request ไปยัง endpoint สำหรับทำเครื่องหมายว่าอ่านแล้ว
            fetch('{{ route("behavior.notifications.mark-read") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                // อัพเดท UI
                const badge = document.querySelector('#notification-button .absolute');
                badge.textContent = '0';
                badge.classList.add('hidden');
                
                // ลบเส้นสีที่แสดงว่ายังไม่ได้อ่าน
                document.querySelectorAll('#notification-dropdown .border-l-4').forEach(el => {
                    el.classList.remove('border-l-4', 'border-indigo-500');
                });
                
                // แสดงข้อความสำเร็จ
                alert('ทำเครื่องหมายว่าอ่านแล้วทั้งหมด');
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
    @yield('scripts')
</body>
</html>