@extends('layouts.app')

@section('content')
<div class="fade-in">
    <!-- Hero Header Section with Animated Elements -->
    <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-indigo-700 rounded-xl p-8 mb-8 shadow-xl text-white relative overflow-hidden">
        <div class="absolute -top-24 -right-24">
            <div class="text-white/5">
                <svg width="400" height="400" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg" class="transform rotate-12 animate-pulse">
                    <path d="M49 8H7C4.79086 8 3 9.79086 3 12V44C3 46.2091 4.79086 48 7 48H49C51.2091 48 53 46.2091 53 44V12C53 9.79086 51.2091 8 49 8Z" stroke="currentColor" stroke-width="2"/>
                    <path d="M8 16H30M8 24H20M8 32H16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    <circle cx="42" cy="28" r="8" stroke="currentColor" stroke-width="2"/>
                    <path d="M36 34L33 37" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </div>
        </div>
        <div class="relative z-10">
            <div class="flex items-center">
                <div class="p-3 bg-white/10 rounded-lg mr-4 backdrop-blur-sm shadow-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl sm:text-4xl font-bold mb-1 tracking-tight">ตั้งค่าระบบ</h1>
                    <p class="text-indigo-100 text-lg">ปรับแต่งการทำงานและการแสดงผลของระบบพฤติกรรมนักเรียน</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Settings Container with Animated Entry -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Sidebar Navigation -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 sticky top-24">
                <!-- Settings Categories -->
                <div class="p-4 bg-gray-50 border-b border-gray-100">
                    <h2 class="font-semibold text-gray-800">หมวดหมู่การตั้งค่า</h2>
                </div>
                <nav class="flex flex-col p-3">
                    <button class="settings-nav-item active group" data-tab="general">
                        <div class="p-2 bg-indigo-100 rounded-lg text-indigo-600 group-hover:bg-indigo-200 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <div class="text-sm font-medium text-gray-900">ตั้งค่าทั่วไป</div>
                            <div class="text-xs text-gray-500">ข้อมูลโรงเรียนและการทำงานพื้นฐาน</div>
                        </div>
                    </button>
                    
                    <button class="settings-nav-item group" data-tab="scores">
                        <div class="p-2 bg-gray-100 rounded-lg text-gray-600 group-hover:bg-indigo-200 group-hover:text-indigo-600 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <div class="text-sm font-medium text-gray-900">คะแนนพฤติกรรม</div>
                            <div class="text-xs text-gray-500">กำหนดเกณฑ์คะแนนและการตัดคะแนน</div>
                        </div>
                    </button>
                    
                    <button class="settings-nav-item group" data-tab="notifications">
                        <div class="p-2 bg-gray-100 rounded-lg text-gray-600 group-hover:bg-indigo-200 group-hover:text-indigo-600 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <div class="text-sm font-medium text-gray-900">การแจ้งเตือน</div>
                            <div class="text-xs text-gray-500">ตั้งค่าระบบแจ้งเตือนและการส่งข้อความ</div>
                        </div>
                    </button>
                    
                    <button class="settings-nav-item group" data-tab="backup">
                        <div class="p-2 bg-gray-100 rounded-lg text-gray-600 group-hover:bg-indigo-200 group-hover:text-indigo-600 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <div class="text-sm font-medium text-gray-900">สำรองข้อมูล</div>
                            <div class="text-xs text-gray-500">ตั้งค่าการสำรองและกู้คืนข้อมูล</div>
                        </div>
                    </button>
                </nav>
            </div>
        </div>
        
        <!-- Settings Content -->
        <div class="lg:col-span-3">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                <!-- General Settings Tab -->
                <div id="general-tab" class="settings-tab active">
                    <div class="border-b border-gray-200">
                        <div class="px-6 py-4">
                            <h2 class="text-lg font-semibold text-gray-800 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                ตั้งค่าข้อมูลโรงเรียน
                            </h2>
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <!-- School Info Form -->
                        <form action="#" method="POST" class="space-y-6 max-w-3xl" id="school-settings-form" onsubmit="event.preventDefault(); saveSettings('school');">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label for="school_name" class="block text-sm font-medium text-gray-700">ชื่อโรงเรียน</label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                            </svg>
                                        </div>
                                        <input type="text" id="school_name" name="school_name" value="โรงเรียนมัธยมตัวอย่าง" class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition-all duration-200">
                                    </div>
                                </div>
                                
                                <div class="space-y-2">
                                    <label for="school_id" class="block text-sm font-medium text-gray-700">รหัสโรงเรียน</label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                            </svg>
                                        </div>
                                        <input type="text" id="school_id" name="school_id" value="1234567890" class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition-all duration-200">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="space-y-2">
                                <label for="school_address" class="block text-sm font-medium text-gray-700">ที่อยู่โรงเรียน</label>
                                <div class="relative rounded-md shadow-sm">
                                    <div class="absolute top-2 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <textarea id="school_address" name="school_address" rows="3" class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition-all duration-200">123 ถนนตัวอย่าง ตำบลตัวอย่าง อำเภอเมือง จังหวัดตัวอย่าง 12345</textarea>
                                </div>
                            </div>
                            
                            <div>
                                <label for="school_type" class="block text-sm font-medium text-gray-700">ประเภทโรงเรียน</label>
                                <div class="mt-2 grid grid-cols-3 gap-3">
                                    <div>
                                        <input type="radio" name="school_type" id="type_elementary" value="elementary" class="peer hidden" checked>
                                        <label for="type_elementary" class="flex p-3 items-center justify-center text-gray-800 bg-white border border-gray-200 rounded-lg cursor-pointer hover:border-indigo-600 peer-checked:border-indigo-600 peer-checked:bg-indigo-50 transition-all duration-200">
                                            <div class="block">
                                                <div class="flex items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                    </svg>
                                                    ประถมศึกษา
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    
                                    <div>
                                        <input type="radio" name="school_type" id="type_middle" value="middle" class="peer hidden">
                                        <label for="type_middle" class="flex p-3 items-center justify-center text-gray-800 bg-white border border-gray-200 rounded-lg cursor-pointer hover:border-indigo-600 peer-checked:border-indigo-600 peer-checked:bg-indigo-50 transition-all duration-200">
                                            <div class="block">
                                                <div class="flex items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                                        <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                                    </svg>
                                                    มัธยมศึกษาตอนต้น
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    
                                    <div>
                                        <input type="radio" name="school_type" id="type_high" value="high" class="peer hidden">
                                        <label for="type_high" class="flex p-3 items-center justify-center text-gray-800 bg-white border border-gray-200 rounded-lg cursor-pointer hover:border-indigo-600 peer-checked:border-indigo-600 peer-checked:bg-indigo-50 transition-all duration-200">
                                            <div class="block">
                                                <div class="flex items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                                    </svg>
                                                    มัธยมศึกษาตอนปลาย
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex justify-end">
                                <button type="button" class="save-settings bg-gradient-to-r from-indigo-600 to-indigo-700 text-white px-5 py-2 rounded-lg hover:from-indigo-700 hover:to-indigo-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 shadow-md transform transition-all duration-200 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    บันทึกข้อมูล
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <div class="border-t border-b border-gray-200 bg-gray-50">
                        <div class="px-6 py-4">
                            <h2 class="text-lg font-semibold text-gray-800 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                ตั้งค่าปีการศึกษา
                            </h2>
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <!-- Academic Year Form -->
                        <form action="#" method="POST" class="space-y-6 max-w-3xl" id="academic-settings-form" onsubmit="event.preventDefault(); saveSettings('academic');">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label for="academic_year" class="block text-sm font-medium text-gray-700">ปีการศึกษาปัจจุบัน</label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <input type="text" id="academic_year" name="academic_year" value="2566" class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition-all duration-200">
                                    </div>
                                </div>
                                
                                <div class="space-y-2">
                                    <label for="semester" class="block text-sm font-medium text-gray-700">ภาคเรียน</label>
                                    <div class="relative">
                                        <select id="semester" name="semester" class="block w-full rounded-md border-gray-300 pl-10 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition-all duration-200">
                                            <option value="1" selected>1</option>
                                            <option value="2">2</option>
                                        </select>
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label for="term_start_date" class="block text-sm font-medium text-gray-700">วันเริ่มต้นภาคเรียน</label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <input type="date" id="term_start_date" name="term_start_date" value="2023-05-15" class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition-all duration-200">
                                    </div>
                                </div>
                                
                                <div class="space-y-2">
                                    <label for="term_end_date" class="block text-sm font-medium text-gray-700">วันสิ้นสุดภาคเรียน</label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <input type="date" id="term_end_date" name="term_end_date" value="2023-10-15" class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition-all duration-200">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex justify-end">
                                <button type="button" class="save-settings bg-gradient-to-r from-indigo-600 to-indigo-700 text-white px-5 py-2 rounded-lg hover:from-indigo-700 hover:to-indigo-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 shadow-md transform transition-all duration-200 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    บันทึกข้อมูล
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <div class="border-t border-b border-gray-200 bg-gray-50">
                        <div class="px-6 py-4">
                            <h2 class="text-lg font-semibold text-gray-800 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                ตั้งค่าระบบ
                            </h2>
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <!-- System Settings Form -->
                        <form action="#" method="POST" class="space-y-6 max-w-3xl" id="system-settings-form" onsubmit="event.preventDefault(); saveSettings('system');">
                            @csrf
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <div class="bg-white p-5 rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition-all duration-200">
                                    <div class="flex items-start mb-5">
                                        <div class="flex items-center h-5">
                                            <input type="checkbox" id="notifications_enabled" name="notifications_enabled" class="h-5 w-5 text-indigo-600 rounded border-gray-300 focus:ring-indigo-500 transition-all duration-200" checked>
                                        </div>
                                        <div class="ml-3">
                                            <label for="notifications_enabled" class="text-sm font-medium text-gray-700 block">เปิดใช้งานการแจ้งเตือนอัตโนมัติ</label>
                                            <p class="text-xs text-gray-500">แจ้งเตือนเมื่อมีการเปลี่ยนแปลงคะแนนนักเรียน</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input type="checkbox" id="dashboard_summary" name="dashboard_summary" class="h-5 w-5 text-indigo-600 rounded border-gray-300 focus:ring-indigo-500 transition-all duration-200" checked>
                                        </div>
                                        <div class="ml-3">
                                            <label for="dashboard_summary" class="text-sm font-medium text-gray-700 block">แสดงข้อมูลสรุปบนหน้าแดชบอร์ด</label>
                                            <p class="text-xs text-gray-500">แสดงสถิติและข้อมูลสรุปบนหน้าหลัก</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="bg-white p-5 rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition-all duration-200">
                                    <div class="flex items-start mb-5">
                                        <div class="flex items-center h-5">
                                            <input type="checkbox" id="teacher_access" name="teacher_access" class="h-5 w-5 text-indigo-600 rounded border-gray-300 focus:ring-indigo-500 transition-all duration-200">
                                        </div>
                                        <div class="ml-3">
                                            <label for="teacher_access" class="text-sm font-medium text-gray-700 block">อนุญาตให้ครูทั่วไปเข้าถึงรายงานทั้งหมด</label>
                                            <p class="text-xs text-gray-500">ครูสามารถดูรายงานรวมของทุกระดับชั้นได้</p>
                                        </div>
                                    </div>
                                    
                                    <div class="space-y-2">
                                        <label for="automatic_backup" class="block text-sm font-medium text-gray-700">การสำรองข้อมูลอัตโนมัติ</label>
                                        <div class="relative">
                                            <select id="automatic_backup" name="automatic_backup" class="block w-full rounded-md border-gray-300 pl-10 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition-all duration-200">
                                                <option value="none">ไม่ต้องการ</option>
                                                <option value="daily">ทุกวัน</option>
                                                <option value="weekly" selected>ทุกสัปดาห์</option>
                                                <option value="monthly">ทุกเดือน</option>
                                            </select>
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-6 flex justify-end">
                                <button type="button" class="save-settings bg-gradient-to-r from-indigo-600 to-indigo-700 text-white px-5 py-2 rounded-lg hover:from-indigo-700 hover:to-indigo-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 shadow-md transform transition-all duration-200 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    บันทึกข้อมูล
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Information Alert -->
                    <div class="p-6 border-t border-gray-100">
                        <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded-lg">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-blue-800">
                                        การเปลี่ยนแปลงการตั้งค่าบางอย่างอาจส่งผลต่อการทำงานของระบบ โปรดพิจารณาอย่างรอบคอบก่อนทำการเปลี่ยนแปลง
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Scores Settings Tab (Hidden) -->
                <div id="scores-tab" class="settings-tab hidden">
                    <div class="flex flex-col items-center justify-center p-12">
                        <div class="text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-16 w-16 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            <h3 class="mt-4 text-xl font-medium text-gray-900">กำลังพัฒนาฟีเจอร์</h3>
                            <p class="mt-2 text-gray-500">ระบบนี้กำลังอยู่ในระหว่างการพัฒนา และจะเปิดให้ใช้งานเร็วๆ นี้</p>
                            <p class="mt-1 text-sm text-indigo-600">กรุณาลองอีกครั้งในภายหลัง</p>
                        </div>
                    </div>
                </div>
                
                <!-- Notifications Settings Tab (Hidden) -->
                <div id="notifications-tab" class="settings-tab hidden">
                    <div class="flex flex-col items-center justify-center p-12">
                        <div class="text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-16 w-16 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <h3 class="mt-4 text-xl font-medium text-gray-900">กำลังพัฒนาฟีเจอร์</h3>
                            <p class="mt-2 text-gray-500">ระบบนี้กำลังอยู่ในระหว่างการพัฒนา และจะเปิดให้ใช้งานเร็วๆ นี้</p>
                            <p class="mt-1 text-sm text-indigo-600">กรุณาลองอีกครั้งในภายหลัง</p>
                        </div>
                    </div>
                </div>
                
                <!-- Backup Settings Tab (Hidden) -->
                <div id="backup-tab" class="settings-tab hidden">
                    <div class="flex flex-col items-center justify-center p-12">
                        <div class="text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-16 w-16 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                            </svg>
                            <h3 class="mt-4 text-xl font-medium text-gray-900">กำลังพัฒนาฟีเจอร์</h3>
                            <p class="mt-2 text-gray-500">ระบบนี้กำลังอยู่ในระหว่างการพัฒนา และจะเปิดให้ใช้งานเร็วๆ นี้</p>
                            <p class="mt-1 text-sm text-indigo-600">กรุณาลองอีกครั้งในภายหลัง</p>
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
    document.addEventListener('DOMContentLoaded', function() {
        // Tab navigation
        const tabButtons = document.querySelectorAll('.settings-nav-item');
        const tabs = document.querySelectorAll('.settings-tab');
        
        tabButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                tabButtons.forEach(btn => {
                    btn.classList.remove('active');
                    const icon = btn.querySelector('div:first-child');
                    icon.classList.remove('bg-indigo-100', 'text-indigo-600');
                    icon.classList.add('bg-gray-100', 'text-gray-600');
                });
                
                // Add active class to clicked button
                this.classList.add('active');
                const icon = this.querySelector('div:first-child');
                icon.classList.remove('bg-gray-100', 'text-gray-600');
                icon.classList.add('bg-indigo-100', 'text-indigo-600');
                
                // Show correct tab
                const tabName = this.getAttribute('data-tab');
                tabs.forEach(tab => {
                    tab.classList.add('hidden');
                });
                document.getElementById(`${tabName}-tab`).classList.remove('hidden');
                
                // Check if this is not the general tab
                if (tabName !== 'general') {
                    // Display in-development notification
                    setTimeout(() => {
                        showNotification('กำลังพัฒนาฟีเจอร์', 'ฟีเจอร์นี้อยู่ระหว่างการพัฒนาและจะเปิดให้ใช้งานในเร็วๆ นี้', 'info');
                    }, 500);
                }
            });
        });
        
        // Save settings buttons
        const saveButtons = document.querySelectorAll('.save-settings');
        saveButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Animation effect
                this.classList.add('scale-95');
                setTimeout(() => {
                    this.classList.remove('scale-95');
                }, 100);
                
                // Show success notification
                showNotification('บันทึกการตั้งค่าเรียบร้อย', 'การตั้งค่าของคุณได้รับการบันทึกเรียบร้อยแล้ว', 'success');
            });
        });
        
        // Helper function to show notifications
        function showNotification(title, message, type = 'success') {
            // Create notification element
            const notification = document.createElement('div');
            notification.className = `fixed bottom-6 right-6 bg-white rounded-lg shadow-xl border-l-4 ${type === 'success' ? 'border-green-500' : 'border-blue-500'} p-4 z-50 transform transition-all duration-500 translate-y-20 opacity-0`;
            notification.style.maxWidth = '400px';
            
            // Set notification content
            notification.innerHTML = `
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        ${type === 'success' ? 
                            `<svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>` : 
                            `<svg class="h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>`
                        }
                    </div>
                    <div class="ml-3 w-0 flex-1">
                        <h3 class="text-sm font-medium text-gray-800">${title}</h3>
                        <div class="mt-1">
                            <p class="text-sm text-gray-500">${message}</p>
                        </div>
                    </div>
                    <div class="ml-4 flex-shrink-0 flex">
                        <button class="inline-flex text-gray-400 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            `;
            
            // Append to body
            document.body.appendChild(notification);
            
            // Show animation
            setTimeout(() => {
                notification.classList.remove('translate-y-20', 'opacity-0');
            }, 10);
            
            // Set up close button
            const closeButton = notification.querySelector('button');
            closeButton.addEventListener('click', () => {
                hideNotification(notification);
            });
            
            // Auto close after 4 seconds
            setTimeout(() => {
                hideNotification(notification);
            }, 4000);
        }
        
        function hideNotification(notification) {
            notification.classList.add('translate-y-20', 'opacity-0');
            setTimeout(() => {
                notification.remove();
            }, 500);
        }
    });

    function saveSettings(type) {
        // Animation effect
        const button = document.querySelector(`#${type}-settings-form .save-settings`);
        button.classList.add('scale-95');
        setTimeout(() => {
            button.classList.remove('scale-95');
        }, 100);
        
        // Show success notification
        showNotification('บันทึกการตั้งค่าเรียบร้อย', 'การตั้งค่าของคุณได้รับการบันทึกเรียบร้อยแล้ว', 'success');
    }
</script>
@endsection

@section('styles')
<style>
    /* Additional animations and styling */
    .settings-nav-item {
        display: flex;
        align-items: center;
        padding: 0.75rem;
        margin: 0.25rem 0;
        border-radius: 0.5rem;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    
    .settings-nav-item:hover {
        background-color: #F9FAFB;
    }
    
    .settings-nav-item.active {
        background-color: #EEF2FF;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .settings-tab {
        animation: fadeIn 0.3s ease-out;
    }
    
    /* Better focus styles */
    input:focus, select:focus, textarea:focus {
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2) !important;
    }
    
    /* Improved animations */
    .save-settings {
        transition: all 0.2s ease;
    }
    
    .save-settings:hover {
        transform: translateY(-1px);
    }
    
    .save-settings:active {
        transform: scale(0.98);
    }
    
    /* Animated elements */
    @keyframes pulse {
        0% { opacity: 0.8; }
        50% { opacity: 1; }
        100% { opacity: 0.8; }
    }
    
    .animate-pulse {
        animation: pulse 3s infinite;
    }
</style>
@endsection