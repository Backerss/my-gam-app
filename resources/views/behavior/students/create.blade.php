@extends('layouts.app')

@section('content')
<div class="fade-in">
    <!-- Page Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">เพิ่มนักเรียนใหม่</h1>
        <p class="text-gray-600 mt-1">กรอกข้อมูลนักเรียนเพื่อเพิ่มเข้าระบบ</p>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6">
        <form action="{{ route('behavior.students') }}" method="POST">
            @csrf
            
            <!-- ข้อความแจ้งว่ากำลังพัฒนา -->
            <div class="mb-6 p-4 bg-yellow-50 border-l-4 border-yellow-400">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-yellow-800">แจ้งผู้ใช้งาน</h3>
                        <div class="mt-2 text-sm text-yellow-700">
                            <p>ฟีเจอร์นี้อยู่ระหว่างการพัฒนา ข้อมูลที่กรอกจะไม่ถูกบันทึก</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="student_id" class="block text-sm font-medium text-gray-700 mb-1">รหัสนักเรียน <span class="text-red-500">*</span></label>
                    <input type="text" name="student_id" id="student_id" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                </div>
                
                <div>
                    <label for="id_card" class="block text-sm font-medium text-gray-700 mb-1">เลขบัตรประชาชน <span class="text-red-500">*</span></label>
                    <input type="text" name="id_card" id="id_card" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                </div>
                
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">ชื่อ-สกุล <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="name" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                </div>
                
                <div>
                    <label for="class" class="block text-sm font-medium text-gray-700 mb-1">ชั้นเรียน <span class="text-red-500">*</span></label>
                    <select name="class" id="class" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">เลือกชั้นเรียน</option>
                        @foreach($classes as $class)
                        <option value="{{ $class }}">{{ $class }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="md:col-span-2">
                    <label for="address" class="block text-sm font-medium text-gray-700 mb-1">ที่อยู่</label>
                    <textarea name="address" id="address" rows="3" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                </div>
                
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">เบอร์โทรศัพท์</label>
                    <input type="text" name="phone" id="phone" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
            </div>
            
            <div class="border-t border-gray-200 pt-6 mt-2">
                <h2 class="text-lg font-medium text-gray-800 mb-3">ข้อมูลผู้ปกครอง</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="parent_name" class="block text-sm font-medium text-gray-700 mb-1">ชื่อผู้ปกครอง</label>
                        <input type="text" name="parent_name" id="parent_name" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    
                    <div>
                        <label for="parent_phone" class="block text-sm font-medium text-gray-700 mb-1">เบอร์โทรผู้ปกครอง</label>
                        <input type="text" name="parent_phone" id="parent_phone" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                </div>
            </div>
            
            <div class="flex justify-end space-x-3 mt-6">
                <a href="{{ route('behavior.students') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    ยกเลิก
                </a>
                <button type="submit" disabled class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-gray-400 cursor-not-allowed">
                    บันทึกข้อมูล (กำลังพัฒนา)
                </button>
            </div>
        </form>
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