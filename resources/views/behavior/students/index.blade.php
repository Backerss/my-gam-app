@extends('layouts.app')

@section('content')
<div class="fade-in">
    <!-- Page Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">จัดการนักเรียน</h1>
        <div class="flex space-x-2">
            <!-- เปลี่ยนจาก alert เป็นลิงก์ไปยังหน้า create -->
            <a href="{{ route('behavior.students.create') }}" class="flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                เพิ่มนักเรียน
            </a>
            <button type="button" onclick="alert('ฟีเจอร์นี้กำลังพัฒนา')" class="flex items-center px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                </svg>
                นำเข้า CSV
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow p-5 border-l-4 border-indigo-500">
            <p class="text-sm text-gray-500 mb-1">นักเรียนทั้งหมด</p>
            <div class="flex justify-between items-center">
                <p class="text-2xl font-bold">{{ count($students) }}</p>
                <span class="bg-indigo-100 text-indigo-800 text-xs px-2 py-1 rounded-full">ทั้งหมด</span>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-5 border-l-4 border-green-500">
            <p class="text-sm text-gray-500 mb-1">คะแนนเฉลี่ย</p>
            <div class="flex justify-between items-center">
                <p class="text-2xl font-bold">{{ number_format(collect($students)->avg('current_score'), 1) }}</p>
                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">คะแนน</span>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-5 border-l-4 border-yellow-500">
            <p class="text-sm text-gray-500 mb-1">ชั้นเรียน</p>
            <div class="flex justify-between items-center">
                <p class="text-2xl font-bold">{{ count($classDistribution) }}</p>
                <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full">ห้อง</span>
            </div>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="mb-6">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input id="search-students" type="text" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="ค้นหานักเรียน (รหัส, ชื่อ, ชั้น)">
        </div>
    </div>

    <!-- Student Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">รหัส</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ชื่อ-สกุล</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ชั้น</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">คะแนน</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">พฤติกรรม</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">จัดการ</th>
                    </tr>
                </thead>
                <tbody id="students-table-body" class="bg-white divide-y divide-gray-200">
                    @foreach ($students as $student)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $student['id'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $student['name'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $student['class'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-full bg-gray-200 rounded-full h-2.5 mr-2 max-w-[100px]">
                                    @php
                                        $colorClass = 'bg-green-500';
                                        if ($student['current_score'] < 80) $colorClass = 'bg-yellow-500';
                                        if ($student['current_score'] < 70) $colorClass = 'bg-orange-500';
                                        if ($student['current_score'] < 60) $colorClass = 'bg-red-500';
                                    @endphp
                                    <div class="{{ $colorClass }} h-2.5 rounded-full" style="width: {{ $student['current_score'] }}%"></div>
                                </div>
                                <span class="text-sm font-medium">{{ $student['current_score'] }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100">
                                {{ $student['behavior_count'] }} ครั้ง
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end space-x-2">
                                <a href="{{ route('behavior.students.show', $student['id']) }}" class="text-indigo-600 hover:text-indigo-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <!-- เปลี่ยนจาก alert เป็นลิงก์ไปยังหน้า edit -->
                                <a href="{{ route('behavior.students.edit', $student['id']) }}" class="text-blue-600 hover:text-blue-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                </a>
                                <!-- เปลี่ยนจาก alert เป็น form สำหรับลบข้อมูล -->
                                <form action="{{ route('behavior.students.destroy', $student['id']) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete(event, this.parentNode)" class="text-red-600 hover:text-red-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Search functionality
    document.getElementById('search-students').addEventListener('keyup', function(e) {
        const searchString = e.target.value.toLowerCase();
        const tableRows = document.querySelectorAll('#students-table-body tr');
        
        tableRows.forEach(row => {
            const studentId = row.children[0].textContent.toLowerCase();
            const studentName = row.children[1].textContent.toLowerCase();
            const studentClass = row.children[2].textContent.toLowerCase();
            
            if (studentId.includes(searchString) || studentName.includes(searchString) || studentClass.includes(searchString)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // ฟังก์ชันยืนยันการลบข้อมูล
    function confirmDelete(event, form) {
        event.preventDefault();
        if (confirm('คุณต้องการลบข้อมูลนักเรียนนี้ใช่หรือไม่?')) {
            form.submit();
        }
    }
</script>
@endsection