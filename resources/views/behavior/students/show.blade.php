@extends('layouts.app')

@section('content')
<div class="fade-in">
    <!-- Page Header with Gradient Background -->
    <div class="bg-gradient-to-r from-indigo-500 to-indigo-600 rounded-xl shadow-lg p-6 mb-6 text-white">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold">{{ $student['name'] }}</h1>
                <div class="flex items-center mt-1">
                    <span class="text-sm text-white opacity-90">รหัสนักเรียน: {{ $student['student_id'] }}</span>
                    <span class="mx-2">•</span>
                    <span class="text-sm text-white opacity-90">{{ $student['class'] }}</span>
                </div>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('behavior.students.edit', $student['id']) }}" class="flex items-center px-4 py-2 bg-white text-indigo-600 rounded-lg hover:bg-gray-100 transition-colors shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    แก้ไขข้อมูล
                </a>
                <a href="{{ route('behavior.reports.student.export', $student['id']) }}" class="flex items-center px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    ส่งออก PDF
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <!-- Student Info Card -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="border-b border-gray-200 bg-gray-50 p-4 flex justify-between items-center">
                    <h2 class="font-semibold text-lg text-gray-800">ข้อมูลส่วนตัว</h2>
                    <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full">ข้อมูลพื้นฐาน</span>
                </div>
                
                <div class="p-5">
                    <div class="flex items-center justify-center mb-6">
                        @if(isset($student['photo']))
                            <img src="{{ asset('storage/' . $student['photo']) }}" alt="{{ $student['name'] }}" class="h-32 w-32 rounded-full object-cover border-4 border-indigo-100">
                        @else
                            <div class="h-32 w-32 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-500 text-4xl font-bold">
                                {{ substr($student['name'], 0, 1) }}
                            </div>
                        @endif
                    </div>
                    
                    <div class="space-y-3">
                        <div class="flex items-center border-b pb-3 border-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                            </svg>
                            <div>
                                <p class="text-xs text-gray-500">บัตรประชาชน</p>
                                <p class="font-medium">{{ $student['id_card'] ?? 'ไม่ระบุ' }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center border-b pb-3 border-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <div>
                                <p class="text-xs text-gray-500">เบอร์โทรศัพท์</p>
                                <p class="font-medium">{{ $student['phone'] ?? 'ไม่ระบุ' }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center border-b pb-3 border-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <div>
                                <p class="text-xs text-gray-500">ที่อยู่</p>
                                <p class="font-medium">{{ $student['address'] ?? 'ไม่ระบุ' }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <div>
                                <p class="text-xs text-gray-500">ผู้ปกครอง</p>
                                <p class="font-medium">{{ $student['parent_name'] ?? 'ไม่ระบุ' }} ({{ $student['parent_phone'] ?? 'ไม่ระบุ' }})</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Behavior Info -->
        <div class="lg:col-span-2">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Behavior Score -->
                <div class="bg-white rounded-lg shadow p-5 border-l-4 border-green-500">
                    <div class="flex items-center">
                        <div class="bg-green-100 p-3 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 mb-1">คะแนนพฤติกรรมปัจจุบัน</p>
                            <p class="text-xl font-bold">{{ $student['current_score'] }}</p>
                        </div>
                    </div>
                </div>
                
                <!-- Score Change -->
                <div class="bg-white rounded-lg shadow p-5 border-l-4 {{ $student['score_change'] >= 0 ? 'border-blue-500' : 'border-red-500' }}">
                    <div class="flex items-center">
                        <div class="{{ $student['score_change'] >= 0 ? 'bg-blue-100' : 'bg-red-100' }} p-3 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 {{ $student['score_change'] >= 0 ? 'text-blue-600' : 'text-red-600' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 mb-1">การเปลี่ยนแปลง</p>
                            <p class="text-xl font-bold {{ $student['score_change'] > 0 ? 'text-green-600' : ($student['score_change'] < 0 ? 'text-red-600' : 'text-gray-600') }}">
                                {{ $student['score_change'] > 0 ? '+' : '' }}{{ $student['score_change'] }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Incident History Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="border-b border-gray-200 bg-gray-50 p-4 flex justify-between items-center">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="font-medium text-gray-800">ประวัติการเปลี่ยนแปลงคะแนน</h3>
                    </div>
                    <span class="bg-indigo-100 text-indigo-800 text-xs px-3 py-1 rounded-full">
                        {{ count($student['incidents']) }} รายการ
                    </span>
                </div>
                
                <div class="overflow-x-auto">
                    @if(count($student['incidents']) > 0)
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">วันที่</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">รายละเอียด</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">คะแนน</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($student['incidents'] as $incident)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 {{ $incident['points'] > 0 ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }} rounded-full flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    @if($incident['points'] > 0)
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                                    @else
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                                    @endif
                                                </svg>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ date('d/m/Y', strtotime($incident['date'])) }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">{{ $incident['description'] }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full {{ $incident['points'] > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $incident['points'] > 0 ? '+' : '' }}{{ $incident['points'] }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="p-8 text-center text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <p class="mt-2">ไม่พบประวัติการเปลี่ยนแปลงคะแนน</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <!-- Back Button -->
    <div class="flex justify-start mt-6">
        <a href="{{ route('behavior.students') }}" class="flex items-center text-indigo-600 hover:text-indigo-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            กลับไปหน้ารายการนักเรียน
        </a>
    </div>
</div>
@endsection

@section('styles')
<style>
    .bg-gradient {
        background: linear-gradient(to right, #4f46e5, #6366f1);
    }
</style>
@endsection