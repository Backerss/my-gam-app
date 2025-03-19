<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#4F46E5">
    
    <title>{{ config('app.name', 'ระบบตัดคะแนนพฤติกรรมเด็ก') }}</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Prompt', sans-serif;
        }
        
        .bg-gradient {
            background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);
        }
        
        .feature-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
<body class="antialiased bg-gray-50">
    <div class="relative min-h-screen">
        <!-- Header with Gradient -->
        <div class="bg-gradient shadow-lg pb-32">
            <nav class="px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                        </svg>
                        <h1 class="text-2xl font-bold text-white">ระบบตัดคะแนนพฤติกรรมนักเรียน</h1>
                    </div>
                    
                    <div class="hidden sm:flex space-x-4">
                        @if (Route::has('login'))
                            <div class="flex space-x-2">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="px-4 py-2 bg-white text-indigo-600 rounded-lg font-medium hover:bg-gray-50">แดชบอร์ด</a>
                                @else
                                    <a href="{{ route('login') }}" class="px-4 py-2 bg-white text-indigo-600 rounded-lg font-medium hover:bg-gray-50">เข้าสู่ระบบ</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="px-4 py-2 bg-indigo-500 text-white rounded-lg font-medium hover:bg-indigo-600">ลงทะเบียน</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </nav>
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-10 text-center">
                <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">ระบบจัดการและติดตามพฤติกรรมนักเรียน</h2>
                <p class="text-indigo-100 max-w-2xl mx-auto text-lg">
                    บันทึก ติดตาม และวิเคราะห์พฤติกรรมนักเรียนอย่างเป็นระบบ เพื่อการพัฒนาที่ยั่งยืน
                </p>
            </div>
        </div>
        
        <!-- Main Content - Feature Cards -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-24">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Feature Card 1 -->
                <div class="bg-white rounded-xl shadow-lg p-6 feature-card border-t-4 border-indigo-500">
                    <div class="flex items-center mb-4">
                        <div class="bg-indigo-100 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 ml-4">บันทึกพฤติกรรม</h3>
                    </div>
                    <p class="text-gray-600">บันทึกข้อมูลพฤติกรรมนักเรียนได้อย่างรวดเร็ว ทั้งการหักคะแนนและการเพิ่มคะแนนจากพฤติกรรมที่ดี</p>
                    <a href="{{ route('behavior.deduct') }}" class="mt-4 inline-flex items-center text-indigo-600 hover:text-indigo-800">
                        ใช้งานเลย
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
                
                <!-- Feature Card 2 -->
                <div class="bg-white rounded-xl shadow-lg p-6 feature-card border-t-4 border-green-500">
                    <div class="flex items-center mb-4">
                        <div class="bg-green-100 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 ml-4">รายงานและกราฟ</h3>
                    </div>
                    <p class="text-gray-600">วิเคราะห์ข้อมูลด้วยกราฟและรายงานที่หลากหลาย เพื่อติดตามพัฒนาการและแนวโน้มพฤติกรรม</p>
                    <a href="{{ route('reports.behavior') }}" class="mt-4 inline-flex items-center text-green-600 hover:text-green-800">
                        ดูรายงาน
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
                
                <!-- Feature Card 3 -->
                <div class="bg-white rounded-xl shadow-lg p-6 feature-card border-t-4 border-orange-500">
                    <div class="flex items-center mb-4">
                        <div class="bg-orange-100 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 ml-4">จัดการนักเรียน</h3>
                    </div>
                    <p class="text-gray-600">จัดการข้อมูลนักเรียน ดูประวัติ และติดตามพฤติกรรมรายบุคคลอย่างละเอียด</p>
                    <a href="#" class="mt-4 inline-flex items-center text-orange-600 hover:text-orange-800">
                        จัดการนักเรียน
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Statistics Section -->
            <div class="mt-12 bg-white rounded-xl shadow-lg p-6 mb-12">
                <h3 class="text-xl font-bold text-gray-800 mb-6">ข้อมูลสรุปทั้งโรงเรียน</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="bg-indigo-50 rounded-lg p-4 text-center">
                        <p class="text-sm text-gray-600 mb-1">จำนวนนักเรียนทั้งหมด</p>
                        <p class="text-2xl font-bold text-indigo-700">142</p>
                    </div>
                    
                    <div class="bg-green-50 rounded-lg p-4 text-center">
                        <p class="text-sm text-gray-600 mb-1">คะแนนพฤติกรรมเฉลี่ย</p>
                        <p class="text-2xl font-bold text-green-700">92.5</p>
                    </div>
                    
                    <div class="bg-yellow-50 rounded-lg p-4 text-center">
                        <p class="text-sm text-gray-600 mb-1">จำนวนเหตุการณ์เดือนนี้</p>
                        <p class="text-2xl font-bold text-yellow-700">37</p>
                    </div>
                    
                    <div class="bg-red-50 rounded-lg p-4 text-center">
                        <p class="text-sm text-gray-600 mb-1">นักเรียนที่ต้องเฝ้าระวัง</p>
                        <p class="text-2xl font-bold text-red-700">12</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Call To Action -->
        <div class="bg-gradient shadow-inner">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-center">
                <h2 class="text-2xl font-bold text-white mb-4">เริ่มต้นใช้งานระบบวันนี้</h2>
                <p class="text-indigo-100 max-w-2xl mx-auto mb-6">
                    เครื่องมือที่ช่วยให้การติดตามพฤติกรรมนักเรียนเป็นเรื่องง่ายและมีประสิทธิภาพ
                </p>
                
                <div class="mt-6">
                    <a href="{{ route('login') }}" class="px-6 py-3 bg-white text-indigo-600 rounded-lg font-medium hover:bg-gray-100 shadow-md">
                        เข้าสู่ระบบ
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <footer class="bg-gray-800 text-gray-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="md:flex md:justify-between">
                    <div class="mb-6 md:mb-0">
                        <h3 class="text-lg font-semibold text-white mb-2">ระบบตัดคะแนนพฤติกรรมนักเรียน</h3>
                        <p class="text-sm">ระบบจัดการและติดตามพฤติกรรมนักเรียนอย่างมีประสิทธิภาพ</p>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-8 md:gap-16">
                        <div>
                            <h4 class="text-sm font-semibold text-white mb-2">เมนูหลัก</h4>
                            <ul class="text-sm space-y-2">
                                <li><a href="#" class="hover:text-white">แดชบอร์ด</a></li>
                                <li><a href="{{ route('behavior.deduct') }}" class="hover:text-white">หักคะแนนพฤติกรรม</a></li>
                                <li><a href="{{ route('reports.behavior') }}" class="hover:text-white">รายงานพฤติกรรม</a></li>
                                <li><a href="#" class="hover:text-white">จัดการนักเรียน</a></li>
                            </ul>
                        </div>
                        
                        <div>
                            <h4 class="text-sm font-semibold text-white mb-2">ช่วยเหลือ</h4>
                            <ul class="text-sm space-y-2">
                                <li><a href="#" class="hover:text-white">คู่มือการใช้งาน</a></li>
                                <li><a href="#" class="hover:text-white">คำถามที่พบบ่อย</a></li>
                                <li><a href="#" class="hover:text-white">ติดต่อเรา</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="border-t border-gray-700 mt-8 pt-6 flex flex-col md:flex-row md:justify-between">
                    <p class="text-xs mb-2 md:mb-0">&copy; {{ date('Y') }} ระบบตัดคะแนนพฤติกรรมนักเรียน. สงวนลิขสิทธิ์.</p>
                    <p class="text-xs">เวอร์ชั่น 1.0.0</p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>