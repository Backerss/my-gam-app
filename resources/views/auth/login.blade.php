<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#4F46E5">
    <title>เข้าสู่ระบบ - {{ config('app.name', 'Student Behavior System') }}</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- ใช้ Vite เพื่อนำเข้า CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full relative">
        <!-- Animation elements (decorative) -->
        <div class="absolute -top-20 -right-20 w-40 h-40 bg-indigo-400 rounded-full opacity-10 blur-3xl"></div>
        <div class="absolute -bottom-20 -left-20 w-40 h-40 bg-purple-400 rounded-full opacity-10 blur-3xl"></div>
        
        <!-- Card -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden fade-in">
            <!-- Card header with logo -->
            <div class="bg-gradient p-6 text-center">
                <div class="flex justify-center mb-3">
                    <div class="bg-white rounded-full p-3 shadow-lg inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-600" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                        </svg>
                    </div>
                </div>
                <h2 class="text-xl font-bold text-white mb-1">ระบบตัดคะแนนพฤติกรรมเด็ก</h2>
                <p class="text-indigo-100 text-sm">เข้าสู่ระบบเพื่อจัดการคะแนนพฤติกรรม</p>
            </div>
            
            <!-- Login form -->
            <div class="p-6">
                @if($errors->any())
                <div class="bg-red-50 text-red-700 p-3 rounded-lg mb-4 text-sm">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
                @endif
                
                <form method="POST" action="{{ route('login') }}" class="slide-in-up">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">อีเมล</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="your@email.com">
                    </div>
                    
                    <div class="mb-6">
                        <div class="flex items-center justify-between mb-1">
                            <label for="password" class="block text-sm font-medium text-gray-700">รหัสผ่าน</label>
                            <a href="#" class="text-xs text-indigo-600 hover:text-indigo-500">ลืมรหัสผ่าน?</a>
                        </div>
                        <input type="password" id="password" name="password" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="••••••••">
                    </div>
                    
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <input type="checkbox" id="remember" name="remember" 
                                class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="remember" class="ml-2 block text-sm text-gray-700">
                                จดจำฉันไว้
                            </label>
                        </div>
                    </div>
                    
                    <button type="submit" 
                        class="w-full bg-gradient flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-lg text-white hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        เข้าสู่ระบบ
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="text-center mt-6">
            <p class="text-sm text-gray-600">
                © {{ date('Y') }} {{ config('app.name', 'Student Behavior System') }}. สงวนลิขสิทธิ์.
            </p>
        </div>
    </div>
</body>
</html>