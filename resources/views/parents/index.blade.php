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
                <h1 class="text-3xl font-bold mb-2">จัดการข้อมูลผู้ปกครอง</h1>
                <p class="text-indigo-100 max-w-lg">ระบบจัดการข้อมูลผู้ปกครองและการเชื่อมโยงกับนักเรียน</p>
            </div>
            <div class="mt-4 md:mt-0 flex flex-wrap gap-3">
                <a href="{{ route('behavior.parents.create') }}"
                    class="flex items-center px-4 py-2 bg-white text-indigo-700 rounded-lg hover:bg-indigo-50 transition-colors shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    เพิ่มผู้ปกครอง
                </a>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div id="notification" class="fixed bottom-4 right-4 bg-green-500 text-white px-4 sm:px-6 py-2 sm:py-3 rounded-lg shadow-lg flex items-center z-50 max-w-[90%] sm:max-w-md">
        <svg class="h-5 w-5 sm:h-6 sm:w-6 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
        <span class="text-sm sm:text-base">{{ session('success') }}</span>
    </div>
    @endif
    
    <!-- Filter and Search Section -->
    <div class="bg-white p-4 rounded-xl shadow-sm mb-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <!-- Search Box -->
            <div class="relative flex-grow max-w-lg">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input id="search-parents" type="text"
                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="ค้นหาผู้ปกครอง (ชื่อ, เบอร์โทร)">
            </div>

            <div class="flex items-center space-x-2">
                <button id="reset-filter"
                    class="px-3 py-2 border border-gray-300 rounded-lg text-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500">
                    รีเซ็ตตัวกรอง
                </button>
            </div>
        </div>
    </div>

    <!-- Parents Table with Hover Effects -->
    <div class="rounded-xl shadow-md overflow-hidden bg-white">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200" id="parents-table">
                <thead class="bg-gray-50">
                    <tr>
                        <th onclick="sortTable(0)" 
                            class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            รหัสผู้ปกครอง <span class="ml-1">↕</span>
                        </th>
                        <th onclick="sortTable(1)" 
                            class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ชื่อ-นามสกุล <span class="ml-1">↕</span>
                        </th>
                        <th onclick="sortTable(2)" 
                            class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ความสัมพันธ์ <span class="ml-1">↕</span>
                        </th>
                        <th onclick="sortTable(3)" 
                            class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            เบอร์โทรศัพท์ <span class="ml-1">↕</span>
                        </th>
                        <th onclick="sortTable(4)" 
                            class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            นักเรียน <span class="ml-1">↕</span>
                        </th>
                        <th 
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            การจัดการ
                        </th>
                    </tr>
                </thead>
                <tbody id="parents-table-body" class="bg-white divide-y divide-gray-200 ml-4">
                    @forelse ($parents as $index => $parent)
                        <tr class="parent-row hover:bg-gray-50" style="animation-delay: {{ $index * 0.05 }}s;"
                            data-parent-id="{{ $parent['id'] }}"
                            data-parent-name="{{ $parent['first_name'] }} {{ $parent['last_name'] }}"
                            data-parent-relationship="{{ $parent['relationship'] }}"
                            data-parent-phone="{{ $parent['phone'] }}"
                            data-student-name="{{ $parent['student_name'] }}">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold">
                                            {{ substr($parent['id'], 1, 3) }}
                                        </div>
                                    </div>
                                    <div class="ml-4 text-sm font-medium text-gray-900">{{ $parent['id'] }}</div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $parent['first_name'] }} {{ $parent['last_name'] }}</div>
                                <div class="text-xs text-gray-500">สร้างเมื่อ {{ $parent['created_at'] }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $parent['relationship'] }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="text-sm text-gray-900">{{ $parent['phone'] }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $parent['student_name'] }}</div>
                                <div class="text-xs text-gray-500">{{ $parent['student_id'] }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="flex justify-center space-x-2">
                                    <svg onclick="viewParent('{{ $parent['id'] }}')" 
                                        class="h-5 w-5 text-indigo-600 hover:text-indigo-900 cursor-pointer"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    <svg onclick="editParent('{{ $parent['id'] }}')" 
                                        class="h-5 w-5 text-blue-600 hover:text-blue-900 cursor-pointer"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    <svg onclick="deleteParent('{{ $parent['id'] }}')" 
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
                                <span class="text-gray-500 text-lg font-medium">ไม่พบข้อมูลผู้ปกครอง</span>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-6 py-3 bg-gray-50 border-t text-gray-500 text-sm" id="table-info">
            แสดง <span class="font-medium">{{ count($parents) }}</span> รายการ จากทั้งหมด <span class="font-medium">{{ count($parents) }}</span> รายการ
        </div>
    </div>

    <!-- Parent Action Forms (Hidden) -->
    <form id="view-form" action="" method="GET" class="hidden"></form>
    <form id="edit-form" action="" method="GET" class="hidden"></form>
    <form id="delete-form" action="" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Search functionality
        document.getElementById('search-parents').addEventListener('keyup', function(e) {
            const searchString = e.target.value.toLowerCase();
            filterTable(searchString);
        });

        // Reset filter
        document.getElementById('reset-filter').addEventListener('click', function() {
            document.getElementById('search-parents').value = '';
            filterTable('');
        });

        // Handle notification auto-close
        const notification = document.getElementById('notification');
        if (notification) {
            setTimeout(() => {
                notification.style.opacity = '0';
                notification.style.transition = 'opacity 1s';
                setTimeout(() => {
                    notification.remove();
                }, 1000);
            }, 3000);
        }
    });

    function filterTable(searchString) {
        const rows = document.querySelectorAll('.parent-row');
        let visibleCount = 0;

        rows.forEach(row => {
            const parentName = row.getAttribute('data-parent-name').toLowerCase();
            const parentPhone = row.getAttribute('data-parent-phone').toLowerCase();
            const parentRelationship = row.getAttribute('data-parent-relationship').toLowerCase();
            const studentName = row.getAttribute('data-student-name').toLowerCase();

            if (
                parentName.includes(searchString) || 
                parentPhone.includes(searchString) || 
                parentRelationship.includes(searchString) ||
                studentName.includes(searchString)
            ) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        // Update table info
        document.getElementById('table-info').innerHTML = `แสดง <span class="font-medium">${visibleCount}</span> รายการ จากทั้งหมด <span class="font-medium">{{ count($parents) }}</span> รายการ`;
    }

    // Table sorting
    function sortTable(columnIndex) {
        const table = document.getElementById('parents-table-body');
        const rows = Array.from(table.getElementsByTagName('tr'));
        
        // Get current sort direction
        const th = document.querySelector(`th:nth-child(${columnIndex + 1})`);
        let sortDirection = th.getAttribute('data-sort') === 'asc' ? 'desc' : 'asc';
        
        // Reset all sorting arrows
        document.querySelectorAll('th').forEach(header => {
            const span = header.querySelector('span');
            if (span) span.textContent = '↕';
        });
        
        // Update sort direction and icon for clicked column
        th.setAttribute('data-sort', sortDirection);
        const span = th.querySelector('span');
        if (span) span.textContent = sortDirection === 'asc' ? '↑' : '↓';
        
        // Sort rows
        rows.sort((a, b) => {
            const aValue = a.getElementsByTagName('td')[columnIndex].textContent.trim();
            const bValue = b.getElementsByTagName('td')[columnIndex].textContent.trim();
            
            // Handle numeric sorting
            if (columnIndex === 0) { // ID column
                return sortDirection === 'asc' ? 
                    a.getAttribute('data-parent-id').localeCompare(b.getAttribute('data-parent-id'), 'th') : 
                    b.getAttribute('data-parent-id').localeCompare(a.getAttribute('data-parent-id'), 'th');
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

    // Parent actions
    function viewParent(id) {
        const form = document.getElementById('view-form');
        form.action = "{{ route('behavior.parents.show', ['id' => '_id_']) }}".replace('_id_', id);
        form.submit();
    }

    function editParent(id) {
        const form = document.getElementById('edit-form');
        form.action = "{{ route('behavior.parents.edit', ['id' => '_id_']) }}".replace('_id_', id);
        form.submit();
    }

    function deleteParent(id) {
        if (confirm('คุณต้องการลบข้อมูลผู้ปกครองคนนี้ใช่หรือไม่?')) {
            const form = document.getElementById('delete-form');
            form.action = "{{ route('behavior.parents.destroy', ['id' => '_id_']) }}".replace('_id_', id);
            form.submit();
        }
    }
</script>
@endsection

@section('styles')
<style>
    /* Animation effects */
    .fade-in {
        animation: fadeIn 0.5s ease-in-out;
    }

    .parent-row {
        animation: fadeInUp 0.3s ease-out forwards;
        opacity: 0;
        transform: translateY(10px);
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes fadeInUp {
        from { 
            opacity: 0;
            transform: translateY(10px);
        }
        to { 
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Table hover effects */
    tr.hover:bg-gray-50 {
        transition: all 0.2s ease;
    }

    /* Action buttons hover animations */
    svg.cursor-pointer {
        transition: transform 0.2s ease;
    }
    
    svg.cursor-pointer:hover {
        transform: scale(1.15);
    }
</style>
@endsection