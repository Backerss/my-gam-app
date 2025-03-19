@extends('layouts.app')

@section('content')
<div> <!-- Removed mb-16 since we're handling that in the main layout -->
    <!-- Page Header -->
    <div class="mb-6">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-800">การหักคะแนนพฤติกรรม</h1>
            <div class="flex space-x-2">
                <button class="flex items-center px-3 py-2 bg-indigo-100 text-indigo-700 rounded-lg hover:bg-indigo-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    เพิ่มนักเรียน
                </button>
                <button class="flex items-center px-3 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                    </svg>
                    กรอง
                </button>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow p-4 border-l-4 border-indigo-500">
            <p class="text-sm text-gray-500 mb-1">จำนวนนักเรียนทั้งหมด</p>
            <div class="flex justify-between items-center">
                <p class="text-2xl font-bold">142</p>
                <span class="bg-indigo-100 text-indigo-800 text-xs px-2 py-1 rounded-full">ทั้งหมด</span>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow p-4 border-l-4 border-green-500">
            <p class="text-sm text-gray-500 mb-1">คะแนนพฤติกรรมเฉลี่ย</p>
            <div class="flex justify-between items-center">
                <p class="text-2xl font-bold">92.5</p>
                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">+2.1 เดือนนี้</span>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow p-4 border-l-4 border-red-500">
            <p class="text-sm text-gray-500 mb-1">นักเรียนที่ถูกตัดคะแนนล่าสุด</p>
            <div class="flex justify-between items-center">
                <p class="text-2xl font-bold">12</p>
                <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full">วันนี้</span>
            </div>
        </div>
    </div>

    <!-- Search Bar with Improved Design -->
    <div class="mb-6">
        <div class="relative rounded-lg shadow-sm">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input type="text" class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="ค้นหานักเรียนด้วยชื่อหรือรหัส...">
        </div>
    </div>

    <!-- Class Selector with Fade Animation -->
    <div class="mb-6 fade-in">
        <div class="flex overflow-x-auto pb-2 gap-2 scrollbar-hide">
            <button class="px-4 py-2 bg-gradient text-white rounded-full font-medium flex-shrink-0 shadow-md">ทั้งหมด</button>
            <button class="px-4 py-2 bg-white text-gray-700 rounded-full font-medium border border-gray-300 flex-shrink-0 hover:bg-gray-50 transition-colors">ม.1/1</button>
            <button class="px-4 py-2 bg-white text-gray-700 rounded-full font-medium border border-gray-300 flex-shrink-0 hover:bg-gray-50 transition-colors">ม.1/2</button>
            <button class="px-4 py-2 bg-white text-gray-700 rounded-full font-medium border border-gray-300 flex-shrink-0 hover:bg-gray-50 transition-colors">ม.2/1</button>
            <button class="px-4 py-2 bg-white text-gray-700 rounded-full font-medium border border-gray-300 flex-shrink-0 hover:bg-gray-50 transition-colors">ม.2/2</button>
            <button class="px-4 py-2 bg-white text-gray-700 rounded-full font-medium border border-gray-300 flex-shrink-0 hover:bg-gray-50 transition-colors">ม.3/1</button>
        </div>
    </div>

    <!-- Student List with Improved Design -->
    <div class="bg-white rounded-lg shadow overflow-hidden slide-in-up">
        <!-- List Header -->
        <div class="bg-gray-50 border-b border-gray-200 px-4 py-3">
            <div class="flex justify-between items-center">
                <h2 class="text-sm font-medium text-gray-700">รายการนักเรียน</h2>
                <div class="text-xs text-gray-500">พบ 4 คน</div>
            </div>
        </div>
        
        <div class="divide-y divide-gray-200">
            <!-- Student Item -->
            <div class="p-4 hover:bg-gray-50 cursor-pointer transition-colors" onclick="openDeductModal(1)">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="h-12 w-12 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold mr-4 shadow-sm">
                            ธง
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-800">ธงชัย ใจดี</h3>
                            <div class="flex items-center mt-1">
                                <span class="text-xs text-gray-500">รหัส: ST001</span>
                                <span class="mx-1.5 text-gray-300">•</span>
                                <span class="text-xs text-gray-500">ม.1/1</span>
                                <span class="ml-2 px-1.5 py-0.5 text-xs bg-green-100 text-green-800 rounded">คะแนนดี</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="mr-4 text-right">
                            <div class="text-sm font-semibold text-gray-700">95 คะแนน</div>
                            <div class="text-xs text-green-600">+5 เดือนนี้</div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Student Item -->
            <div class="p-4 hover:bg-gray-50 cursor-pointer transition-colors" onclick="openDeductModal(2)">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="h-12 w-12 rounded-full bg-green-100 flex items-center justify-center text-green-600 font-bold mr-4 shadow-sm">
                            สม
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-800">สมศรี รักเรียน</h3>
                            <div class="flex items-center mt-1">
                                <span class="text-xs text-gray-500">รหัส: ST002</span>
                                <span class="mx-1.5 text-gray-300">•</span>
                                <span class="text-xs text-gray-500">ม.1/1</span>
                                <span class="ml-2 px-1.5 py-0.5 text-xs bg-blue-100 text-blue-800 rounded">หัวหน้าห้อง</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="mr-4 text-right">
                            <div class="text-sm font-semibold text-gray-700">100 คะแนน</div>
                            <div class="text-xs text-green-600">+0 เดือนนี้</div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Student Item -->
            <div class="p-4 hover:bg-gray-50 cursor-pointer transition-colors" onclick="openDeductModal(3)">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="h-12 w-12 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 font-bold mr-4 shadow-sm">
                            ปร
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-800">ประเสริฐ มุ่งมั่น</h3>
                            <div class="flex items-center mt-1">
                                <span class="text-xs text-gray-500">รหัส: ST003</span>
                                <span class="mx-1.5 text-gray-300">•</span>
                                <span class="text-xs text-gray-500">ม.2/1</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="mr-4 text-right">
                            <div class="text-sm font-semibold text-gray-700">85 คะแนน</div>
                            <div class="text-xs text-red-600">-10 เดือนนี้</div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Student Item -->
            <div class="p-4 hover:bg-gray-50 cursor-pointer transition-colors" onclick="openDeductModal(4)">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="h-12 w-12 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-600 font-bold mr-4 shadow-sm">
                            มน
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-800">มนัสนันท์ พากเพียร</h3>
                            <div class="flex items-center mt-1">
                                <span class="text-xs text-gray-500">รหัส: ST004</span>
                                <span class="mx-1.5 text-gray-300">•</span>
                                <span class="text-xs text-gray-500">ม.2/1</span>
                                <span class="ml-2 px-1.5 py-0.5 text-xs bg-yellow-100 text-yellow-800 rounded">เฝ้าระวัง</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="mr-4 text-right">
                            <div class="text-sm font-semibold text-gray-700">70 คะแนน</div>
                            <div class="text-xs text-red-600">-15 เดือนนี้</div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Pagination -->
        <div class="bg-white px-4 py-3 border-t border-gray-200">
            <div class="flex items-center justify-between">
                <div class="flex-1 flex justify-between items-center">
                    <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        ก่อนหน้า
                    </button>
                    <div class="hidden md:flex">
                        <span class="relative inline-flex items-center px-4 py-2 border border-indigo-500 text-sm font-medium rounded-md text-white bg-indigo-600">1</span>
                        <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 mx-2">2</span>
                        <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">3</span>
                    </div>
                    <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        ถัดไป
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Improved Deduct Points Modal -->
    <div id="deductModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 hidden flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-xl max-w-md mx-auto w-full max-h-[90vh] overflow-y-auto">
            <div class="p-4 border-b border-gray-200 sticky top-0 bg-white z-10">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-medium" id="modalStudentName">หักคะแนนพฤติกรรม - ชื่อนักเรียน</h3>
                    <button onclick="closeDeductModal()" class="text-gray-400 hover:text-gray-500 transition-colors">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="p-4">
                <!-- Current Points Info -->
                <div class="bg-indigo-50 rounded-lg p-3 mb-4">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-indigo-700">คะแนนปัจจุบัน</p>
                            <p class="text-2xl font-bold text-indigo-800">95</p>
                        </div>
                        <div>
                            <p class="text-sm text-indigo-700 text-right">ประวัติย้อนหลัง</p>
                            <p class="text-sm text-indigo-600 text-right">6 ครั้งในเดือนนี้</p>
                        </div>
                    </div>
                </div>
                
                <!-- Behavior Categories with Animation -->
                <div class="mb-4 slide-in-up">
                    <p class="text-sm font-medium text-gray-700 mb-2">หมวดหมู่พฤติกรรม</p>
                    <div class="flex overflow-x-auto pb-2 gap-2 scrollbar-hide">
                        <button class="px-3 py-1.5 bg-gradient text-white rounded-full text-sm flex-shrink-0 shadow-sm">ทั้งหมด</button>
                        <button class="px-3 py-1.5 bg-white text-gray-700 rounded-full text-sm border border-gray-300 flex-shrink-0 hover:bg-gray-50 transition-colors">ในห้องเรียน</button>
                        <button class="px-3 py-1.5 bg-white text-gray-700 rounded-full text-sm border border-gray-300 flex-shrink-0 hover:bg-gray-50 transition-colors">วินัย</button>
                        <button class="px-3 py-1.5 bg-white text-gray-700 rounded-full text-sm border border-gray-300 flex-shrink-0 hover:bg-gray-50 transition-colors">การแต่งกาย</button>
                        <button class="px-3 py-1.5 bg-white text-gray-700 rounded-full text-sm border border-gray-300 flex-shrink-0 hover:bg-gray-50 transition-colors">อื่นๆ</button>
                    </div>
                </div>

                <!-- Behavior Point Rules with Better UI -->
                <div class="space-y-2 slide-in-up" style="animation-delay: 0.1s;">
                    <p class="text-sm font-medium text-gray-700 mb-2">เลือกกฎการหักคะแนน</p>
                    
                    <div class="bg-white border border-gray-200 rounded-lg p-3 hover:bg-gray-50 transition-colors cursor-pointer">
                        <div class="flex justify-between items-center">
                            <div class="flex items-start">
                                <input id="rule1" name="rule" type="radio" class="h-4 w-4 text-indigo-600 border-gray-300 mt-1 focus:ring-indigo-500">
                                <div class="ml-3">
                                    <label for="rule1" class="font-medium text-sm">มาสาย</label>
                                    <p class="text-gray-500 text-xs">ในห้องเรียน</p>
                                </div>
                            </div>
                            <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-1 rounded-full">-5 คะแนน</span>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-lg p-3 hover:bg-gray-50 transition-colors cursor-pointer">
                        <div class="flex justify-between items-center">
                            <div class="flex items-start">
                                <input id="rule2" name="rule" type="radio" class="h-4 w-4 text-indigo-600 border-gray-300 mt-1 focus:ring-indigo-500">
                                <div class="ml-3">
                                    <label for="rule2" class="font-medium text-sm">ไม่ส่งการบ้าน</label>
                                    <p class="text-gray-500 text-xs">ในห้องเรียน</p>
                                </div>
                            </div>
                            <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-1 rounded-full">-10 คะแนน</span>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-lg p-3 hover:bg-gray-50 transition-colors cursor-pointer">
                        <div class="flex justify-between items-center">
                            <div class="flex items-start">
                                <input id="rule3" name="rule" type="radio" class="h-4 w-4 text-indigo-600 border-gray-300 mt-1 focus:ring-indigo-500">
                                <div class="ml-3">
                                    <label for="rule3" class="font-medium text-sm">พฤติกรรมก่อกวน</label>
                                    <p class="text-gray-500 text-xs">วินัย</p>
                                </div>
                            </div>
                            <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-1 rounded-full">-15 คะแนน</span>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-lg p-3 hover:bg-gray-50 transition-colors cursor-pointer">
                        <div class="flex justify-between items-center">
                            <div class="flex items-start">
                                <input id="rule4" name="rule" type="radio" class="h-4 w-4 text-indigo-600 border-gray-300 mt-1 focus:ring-indigo-500">
                                <div class="ml-3">
                                    <label for="rule4" class="font-medium text-sm">แต่งกายไม่ถูกระเบียบ</label>
                                    <p class="text-gray-500 text-xs">การแต่งกาย</p>
                                </div>
                            </div>
                            <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-1 rounded-full">-5 คะแนน</span>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-lg p-3 hover:bg-gray-50 transition-colors cursor-pointer">
                        <div class="flex justify-between items-center">
                            <div class="flex items-start">
                                <input id="rule5" name="rule" type="radio" class="h-4 w-4 text-indigo-600 border-gray-300 mt-1 focus:ring-indigo-500">
                                <div class="ml-3">
                                    <label for="rule5" class="font-medium text-sm">ใช้โทรศัพท์ในห้องเรียน</label>
                                    <p class="text-gray-500 text-xs">วินัย</p>
                                </div>
                            </div>
                            <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-1 rounded-full">-20 คะแนน</span>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-lg p-3 hover:bg-gray-50 transition-colors cursor-pointer">
                        <div class="flex justify-between items-center">
                            <div class="flex items-start">
                                <input id="rule6" name="rule" type="radio" class="h-4 w-4 text-indigo-600 border-gray-300 mt-1 focus:ring-indigo-500">
                                <div class="ml-3">
                                    <label for="rule6" class="font-medium text-sm">หนีเรียน</label>
                                    <p class="text-gray-500 text-xs">วินัย</p>
                                </div>
                            </div>
                            <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-1 rounded-full">-25 คะแนน</span>
                        </div>
                    </div>
                </div>

                <!-- Additional Comments with Better UI -->
                <div class="mt-5 slide-in-up" style="animation-delay: 0.2s;">
                    <label for="comments" class="block text-sm font-medium text-gray-700 mb-1">หมายเหตุเพิ่มเติม</label>
                    <textarea id="comments" rows="3" class="shadow-sm block w-full border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="เพิ่มบันทึกรายละเอียดเกี่ยวกับพฤติกรรม..."></textarea>
                </div>
                
                <!-- Date and Time -->
                <div class="mt-4 slide-in-up" style="animation-delay: 0.3s;">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="date" class="block text-sm font-medium text-gray-700 mb-1">วันที่</label>
                            <input type="date" id="date" class="shadow-sm block w-full border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="time" class="block text-sm font-medium text-gray-700 mb-1">เวลา</label>
                            <input type="time" id="time" class="shadow-sm block w-full border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-4 border-t border-gray-200 sticky bottom-0 bg-white z-10">
                <div class="flex gap-3">
                    <button onclick="closeDeductModal()" class="flex-1 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        ยกเลิก
                    </button>
                    <button class="flex-1 bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        ยืนยันการหักคะแนน
                    </button>
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
        document.getElementById('deductModal').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }
    
    function closeDeductModal() {
        document.getElementById('deductModal').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }
</script>
@endsection