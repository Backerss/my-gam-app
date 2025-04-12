@extends('layouts.app')

@section('content')
    <div class="fade-in">
        <!-- Hero Header Section with Background -->
        <div class="bg-primary rounded-xl p-6 mb-8 shadow-lg text-white relative overflow-hidden">
            <div class="absolute top-0 right-0 opacity-10">
                <svg xmlns="http://www.w3.org/2000/svg" width="300" height="300" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1" class="transform rotate-12">
                    <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 00-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 010 7.75"></path>
                </svg>
            </div>
            <div class="relative z-10 flex flex-col md:flex-row md:justify-between md:items-center">
                <div>
                    <h1 class="text-3xl font-bold mb-2">จัดการนักเรียน</h1>
                    <p class="text-indigo-100 max-w-lg">ระบบจัดการข้อมูลนักเรียน ติดตามพฤติกรรม
                        และบันทึกประวัติการเปลี่ยนแปลงคะแนน</p>
                </div>
                <div class="mt-4 md:mt-0 flex flex-wrap gap-3">
                    <a href="{{ route('behavior.students.create') }}"
                        class="flex items-center px-4 py-2 bg-white text-indigo-700 rounded-lg hover:bg-indigo-50 transition-colors shadow">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        เพิ่มนักเรียน
                    </a>
                    <button type="button" onclick="openImportModal()"
                        class="flex items-center px-4 py-2 bg-indigo-800 text-white border border-indigo-300 rounded-lg hover:bg-indigo-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                        นำเข้า CSV
                    </button>
                </div>
            </div>
        </div>

        <!-- Dashboard Cards with Animation -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-8">
            <div
                class="bg-white rounded-xl shadow-md p-6 border-t-4 border-indigo-500 hover:shadow-lg transition-shadow transform hover:-translate-y-1 duration-300">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">นักเรียนทั้งหมด</p>
                        <p class="text-3xl font-bold text-gray-800">{{ count($students) }}</p>
                    </div>
                    <div class="bg-indigo-100 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-indigo-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-3 flex items-center justify-between">
                    <span class="bg-indigo-100 text-indigo-800 text-xs px-2 py-1 rounded-full">ทั้งหมด</span>
                    <span class="text-sm text-gray-500">อัพเดทล่าสุด: <span
                            class="font-medium">{{ now()->format('d/m/Y') }}</span></span>
                </div>
            </div>

            <div
                class="bg-white rounded-xl shadow-md p-6 border-t-4 border-green-500 hover:shadow-lg transition-shadow transform hover:-translate-y-1 duration-300">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">คะแนนเฉลี่ย</p>
                        <p class="text-3xl font-bold text-gray-800">
                            {{ number_format(collect($students)->avg('current_score'), 1) }}</p>
                    </div>
                    <div class="bg-green-100 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-2">
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar bg-success" role="progressbar"
                            style="width: {{ min(collect($students)->avg('current_score'), 100) }}%;"
                            aria-valuenow="{{ min(collect($students)->avg('current_score'), 100) }}" aria-valuemin="0"
                            aria-valuemax="100">
                        </div>
                    </div>
                </div>
                <div class="mt-1 flex items-center justify-between">
                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">คะแนน</span>
                    <span class="text-sm text-gray-500">
                        @php
                            $trend = collect($students)->avg('score_change');
                            $trendClass = $trend > 0 ? 'text-green-600' : ($trend < 0 ? 'text-red-600' : 'text-gray-600');
                            $trendSymbol = $trend > 0 ? '↑' : ($trend < 0 ? '↓' : '→');
                        @endphp
                        <span class="{{ $trendClass }} font-medium">{{ $trendSymbol }}
                            {{ $trend > 0 ? '+' : '' }}{{ number_format($trend, 1) }}</span>
                    </span>
                </div>
            </div>

            <div
                class="bg-white rounded-xl shadow-md p-6 border-t-4 border-amber-500 hover:shadow-lg transition-shadow transform hover:-translate-y-1 duration-300">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">ชั้นเรียน</p>
                        <p class="text-3xl font-bold text-gray-800">{{ count($classDistribution) }}</p>
                    </div>
                    <div class="bg-amber-100 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-amber-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="flex gap-1 mt-1 flex-wrap">
                        @foreach(array_keys($classDistribution) as $class)
                            <span class="bg-amber-100 text-amber-800 text-xs px-2 py-1 rounded-full">{{ $class }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Search with Filter Controls -->
        <div class="bg-white rounded-xl shadow-md mb-6 p-5">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="w-full md:w-1/2 relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input id="search-students" type="text"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        placeholder="ค้นหานักเรียน (รหัส, ชื่อ, ชั้น)">
                </div>

                <div class="flex flex-wrap gap-2">
                    <select id="class-filter"
                        class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="">ชั้นเรียนทั้งหมด</option>
                        @foreach(array_keys($classDistribution) as $class)
                            <option value="{{ $class }}">{{ $class }}</option>
                        @endforeach
                    </select>

                    <select id="score-filter"
                        class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="">คะแนนทั้งหมด</option>
                        <option value="90-100">90-100 คะแนน</option>
                        <option value="80-89">80-89 คะแนน</option>
                        <option value="70-79">70-79 คะแนน</option>
                        <option value="60-69">60-69 คะแนน</option>
                        <option value="0-59">ต่ำกว่า 60 คะแนน</option>
                    </select>

                    <button id="reset-filter"
                        class="px-3 py-2 border border-gray-300 rounded-lg text-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500">
                        รีเซ็ตตัวกรอง
                    </button>
                </div>
            </div>
        </div>

        <!-- Student Table with Hover Effects -->
        <div class="rounded-xl shadow-md overflow-hidden bg-white">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200" id="students-table">
                    <thead class="bg-gray-50">
                        <tr>
                            <th onclick="sortTable(0)" 
                                class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                รหัสนักเรียน <span class="ml-1">↕</span>
                            </th>
                            <th onclick="sortTable(1)" 
                                class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ชื่อ-นามสกุล <span class="ml-1">↕</span>
                            </th>
                            <th onclick="sortTable(2)" 
                                class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ชั้นเรียน <span class="ml-1">↕</span>
                            </th>
                            <th onclick="sortTable(3)" 
                                class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                คะแนนพฤติกรรม <span class="ml-1">↕</span>
                            </th>
                            <th onclick="sortTable(4)" 
                                class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                พฤติกรรม <span class="ml-1">↕</span>
                            </th>
                            <th 
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                การจัดการ
                            </th>
                        </tr>
                    </thead>
                    <tbody id="students-table-body" class="bg-white divide-y divide-gray-200 ml-4">
                        @forelse ($students as $index => $student)
                            <tr class="student-row hover:bg-gray-50" style="animation-delay: {{ $index * 0.05 }}s;"
                                data-student-id="{{ $student['id'] }}"
                                data-student-name="{{ $student['name'] }}"
                                data-student-class="{{ $student['class'] }}"
                                data-student-score="{{ $student['current_score'] }}">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex ms-3 items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold">
                                                {{ substr($student['id'], 2, 3) }}
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $student['id'] }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $student['name'] }}</div>
                                            <div class="text-xs text-gray-500">{{ $student['id'] }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-100 text-indigo-800">
                                        {{ $student['class'] }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex flex-col">
                                        <div class="relative">
                                            <div class="flex items-center mb-1">
                                                <div class="w-full bg-gray-200 flex-grow mr-2">
                                                    <div class="h-2.5 {{ $student['current_score'] >= 90 ? 'bg-green-500' : ($student['current_score'] >= 80 ? 'bg-green-400' : ($student['current_score'] >= 70 ? 'bg-yellow-400' : ($student['current_score'] >= 60 ? 'bg-orange-400' : 'bg-red-500'))) }}"
                                                        style="width: {{ min($student['current_score'], 100) }}%">
                                                    </div>
                                                </div>
                                                <div class="text-sm font-semibold mr-1">{{ $student['current_score'] }}</div>
                                                <span class="text-xs font-bold {{ $student['current_score'] >= 90 ? 'text-green-600' : ($student['current_score'] >= 80 ? 'text-green-500' : ($student['current_score'] >= 70 ? 'text-yellow-600' : ($student['current_score'] >= 60 ? 'text-orange-600' : 'text-red-600'))) }}">
                                                    @if($student['current_score'] >= 90)
                                                        😄
                                                    @elseif($student['current_score'] >= 80)
                                                        🙂
                                                    @elseif($student['current_score'] >= 70)
                                                        😐
                                                    @elseif($student['current_score'] >= 60)
                                                        😕
                                                    @else
                                                        😟
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                    <div class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-indigo-800 bg-indigo-100 mx-auto">
                                        1 ครั้ง
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex justify-center space-x-2">
                                        <svg onclick="viewStudent('{{ $student['id'] }}')" 
                                            class="h-5 w-5 text-indigo-600 hover:text-indigo-900 cursor-pointer"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <svg onclick="editStudent('{{ $student['id'] }}')" 
                                            class="h-5 w-5 text-blue-600 hover:text-blue-900 cursor-pointer"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        <svg onclick="deleteStudent('{{ $student['id'] }}')" 
                                            class="h-5 w-5 text-red-600 hover:text-red-900 cursor-pointer"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <span class="text-gray-500 text-lg font-medium">ไม่พบข้อมูลนักเรียน</span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-3 bg-gray-50 border-t text-gray-500 text-sm" id="table-info">
                แสดง <span class="font-medium">{{ count($students) }}</span> รายการ จากทั้งหมด <span class="font-medium">{{ count($students) }}</span> รายการ
            </div>
        </div>
    </div>

    <!-- Import CSV Modal -->
    <div id="import-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl p-6 w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-medium text-gray-900">นำเข้าข้อมูลนักเรียน</h3>
                <button type="button" class="text-gray-400 hover:text-gray-500" onclick="closeImportModal()">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="mb-4">
                <div class="p-4 bg-yellow-50 border-l-4 border-yellow-400 rounded-md">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-yellow-700">
                                ฟีเจอร์นี้กำลังพัฒนา โปรดเตรียมไฟล์ CSV ที่มีรูปแบบถูกต้อง
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <form id="import-form" class="space-y-4">
                <div>
                    <label for="file-upload" class="block text-sm font-medium text-gray-700 mb-1">อัพโหลดไฟล์ CSV</label>
                    <div
                        class="flex justify-center items-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                viewBox="0 0 48 48" aria-hidden="true">
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="file-upload"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span>อัพโหลดไฟล์</span>
                                    <input id="file-upload" name="file-upload" type="file" class="sr-only" accept=".csv">
                                </label>
                                <p class="pl-1">หรือลากและวางที่นี่</p>
                            </div>
                            <p class="text-xs text-gray-500">CSV เท่านั้น (สูงสุด 10MB)</p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between pt-4">
                    <button type="button"
                        class="py-2 px-4 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50"
                        onclick="closeImportModal()">
                        ยกเลิก
                    </button>
                    <button type="button"
                        class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700"
                        onclick="alert('ฟีเจอร์นี้กำลังพัฒนา')">
                        นำเข้า
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Student Action Forms (Hidden) -->
    <form id="view-form" action="" method="GET" class="hidden"></form>
    <form id="edit-form" action="" method="GET" class="hidden"></form>
    <form id="delete-form" action="" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>

@endsection

@section('styles')
    <style>
        /* Animation effects */
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Apply staggered animations to table rows */
        .student-row {
            animation: rowFadeIn 0.5s ease-in-out;
            animation-fill-mode: both;
            opacity: 0;
        }

        @keyframes rowFadeIn {
            from {
                opacity: 0;
                transform: translateX(-10px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Hover effects */
        .student-row:hover {
            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.2);
        }

        /* Table sorting styles */
        th.sorted-asc,
        th.sorted-desc {
            background-color: rgba(99, 102, 241, 0.1);
        }

        /* Modal backdrop */
        #import-modal {
            backdrop-filter: blur(3px);
            transition: all 0.3s ease;
        }

        #import-modal>div {
            transition: all 0.3s ease;
            transform: scale(0.95);
        }

        #import-modal.active>div {
            transform: scale(1);
        }
    </style>
@endsection

@section('scripts')
    <script>
        // Animation for elements on page load
        document.addEventListener('DOMContentLoaded', function () {
            // Apply animation to each row with increasing delay
            const rows = document.querySelectorAll('.student-row');

            // วิธีที่ปลอดภัย: ใช้ setTimeout แทน animation-delay เพื่อป้องกันปัญหา
            rows.forEach((row, index) => {
                setTimeout(() => {
                    row.style.opacity = 1;
                }, 50 * index);
            });

            setupFilters();
        });

        // Search and filter functionality
        function setupFilters() {
            const searchInput = document.getElementById('search-students');
            const classFilter = document.getElementById('class-filter');
            const scoreFilter = document.getElementById('score-filter');
            const resetButton = document.getElementById('reset-filter');
            const tableRows = document.querySelectorAll('#students-table-body tr');
            const tableInfo = document.getElementById('table-info');

            function applyFilters() {
                const searchString = searchInput.value.toLowerCase();
                const classValue = classFilter.value.toLowerCase();
                const scoreRange = scoreFilter.value;

                let visibleCount = 0;

                tableRows.forEach(row => {
                    const studentId = row.getAttribute('data-student-id').toLowerCase();
                    const studentName = row.getAttribute('data-student-name').toLowerCase();
                    const studentClass = row.getAttribute('data-student-class').toLowerCase();
                    const studentScore = parseInt(row.getAttribute('data-student-score'));

                    // Check if row matches all filters
                    const matchesSearch = studentId.includes(searchString) ||
                        studentName.includes(searchString) ||
                        studentClass.includes(searchString);

                    const matchesClass = !classValue || studentClass === classValue;

                    let matchesScore = true;
                    if (scoreRange) {
                        if (scoreRange === '90-100') {
                            matchesScore = studentScore >= 90 && studentScore <= 100;
                        } else if (scoreRange === '80-89') {
                            matchesScore = studentScore >= 80 && studentScore < 90;
                        } else if (scoreRange === '70-79') {
                            matchesScore = studentScore >= 70 && studentScore < 80;
                        } else if (scoreRange === '60-69') {
                            matchesScore = studentScore >= 60 && studentScore < 70;
                        } else if (scoreRange === '0-59') {
                            matchesScore = studentScore < 60;
                        }
                    }

                    const isVisible = matchesSearch && matchesClass && matchesScore;

                    if (isVisible) {
                        row.style.display = '';
                        visibleCount++;
                    } else {
                        row.style.display = 'none';
                    }
                });

                // Update table info
                tableInfo.innerHTML = `แสดง <span class="font-medium">${visibleCount}</span> รายการ จากทั้งหมด <span class="font-medium">${tableRows.length}</span> รายการ`;
            }

            // Add event listeners
            searchInput.addEventListener('input', applyFilters);
            classFilter.addEventListener('change', applyFilters);
            scoreFilter.addEventListener('change', applyFilters);

            resetButton.addEventListener('click', function () {
                searchInput.value = '';
                classFilter.value = '';
                scoreFilter.value = '';
                applyFilters();
            });
        }

        // Table sorting functionality
        let currentSortColumn = -1;
        let sortDirection = 'asc';

        function sortTable(columnIndex) {
            const table = document.querySelector('#students-table-body');
            const rows = Array.from(table.querySelectorAll('tr'));
            const headers = document.querySelectorAll('th');

            // Remove sorted classes from all headers
            headers.forEach(header => {
                header.classList.remove('sorted-asc', 'sorted-desc');
            });

            // Toggle sort direction if clicking the same column
            if (currentSortColumn === columnIndex) {
                sortDirection = sortDirection === 'asc' ? 'desc' : 'asc';
            } else {
                sortDirection = 'asc';
            }

            currentSortColumn = columnIndex;

            // Add sorted class to current header
            headers[columnIndex].classList.add(sortDirection === 'asc' ? 'sorted-asc' : 'sorted-desc');

            // Sort the rows
            rows.sort((a, b) => {
                let aValue, bValue;

                if (columnIndex === 0) { // ID column
                    aValue = a.getAttribute('data-student-id');
                    bValue = b.getAttribute('data-student-id');
                } else if (columnIndex === 1) { // Name column
                    aValue = a.getAttribute('data-student-name');
                    bValue = b.getAttribute('data-student-name');
                } else if (columnIndex === 3) { // Score column
                    aValue = parseInt(a.getAttribute('data-student-score'));
                    bValue = parseInt(b.getAttribute('data-student-score'));
                    return sortDirection === 'asc' ? aValue - bValue : bValue - aValue;
                }

                // String comparison
                if (sortDirection === 'asc') {
                    return aValue.localeCompare(bValue, 'th');
                } else {
                    return bValue.localeCompare(aValue, 'th');
                }
            });

            // Apply new order
            rows.forEach(row => {
                table.appendChild(row);
            });
        }

        // Modal functionality
        function openImportModal() {
            const modal = document.getElementById('import-modal');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.add('active');
            }, 10);
        }

        function closeImportModal() {
            const modal = document.getElementById('import-modal');
            modal.classList.remove('active');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        // Student actions
        function viewStudent(id) {
            const form = document.getElementById('view-form');
            form.action = "{{ route('behavior.students.show', ['id' => '_id_']) }}".replace('_id_', id);
            form.submit();
        }

        function editStudent(id) {
            const form = document.getElementById('edit-form');
            form.action = "{{ route('behavior.students.edit', ['id' => '_id_']) }}".replace('_id_', id);
            form.submit();
        }

        function deleteStudent(id) {
            if (confirm('คุณต้องการลบข้อมูลนักเรียนคนนี้ใช่หรือไม่?')) {
                const form = document.getElementById('delete-form');
                form.action = "{{ route('behavior.students.destroy', ['id' => '_id_']) }}".replace('_id_', id);
                form.submit();
            }
        }
    </script>
@endsection