@extends('layouts.app')

@section('content')
<div class="fade-in">
    <!-- Page Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">แก้ไขข้อมูลนักเรียน</h1>
        <p class="text-gray-600 mt-1">อัพเดทข้อมูลนักเรียน รหัส {{ $student['student_id'] }}</p>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6">
        <form action="{{ route('behavior.students.update', $student['id']) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">ชื่อ-สกุล</label>
                    <input type="text" name="name" id="name" value="{{ $student['name'] }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                </div>
                
                <div>
                    <label for="class" class="block text-sm font-medium text-gray-700 mb-1">ชั้นเรียน</label>
                    <select name="class" id="class" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @foreach($classes as $class)
                        <option value="{{ $class }}" {{ $student['class'] === $class ? 'selected' : '' }}>{{ $class }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div>
                    <label for="student_id" class="block text-sm font-medium text-gray-700 mb-1">รหัสนักเรียน</label>
                    <input type="text" id="student_id" value="{{ $student['student_id'] }}" class="block w-full rounded-md border-gray-300 bg-gray-100 shadow-sm" readonly disabled>
                    <p class="mt-1 text-xs text-gray-500">ไม่สามารถแก้ไขรหัสนักเรียนได้</p>
                </div>
                
                <div>
                    <label for="id_card" class="block text-sm font-medium text-gray-700 mb-1">เลขบัตรประชาชน</label>
                    <input type="text" id="id_card" value="{{ $student['id_card'] }}" class="block w-full rounded-md border-gray-300 bg-gray-100 shadow-sm" readonly disabled>
                    <p class="mt-1 text-xs text-gray-500">ไม่สามารถแก้ไขเลขบัตรประชาชนได้</p>
                </div>
                
                <div class="md:col-span-2">
                    <label for="address" class="block text-sm font-medium text-gray-700 mb-1">ที่อยู่</label>
                    <textarea name="address" id="address" rows="3" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ $student['address'] }}</textarea>
                </div>
                
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">เบอร์โทรศัพท์</label>
                    <input type="text" name="phone" id="phone" value="{{ $student['phone'] }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                
                <div>
                    <label for="current_score" class="block text-sm font-medium text-gray-700 mb-1">คะแนนพฤติกรรมปัจจุบัน</label>
                    <input type="number" id="current_score" value="{{ $student['current_score'] }}" class="block w-full rounded-md border-gray-300 bg-gray-100 shadow-sm" readonly disabled>
                    <p class="mt-1 text-xs text-gray-500">แก้ไขคะแนนได้ผ่านหน้าบันทึกพฤติกรรมเท่านั้น</p>
                </div>
            </div>
            
            <div class="border-t border-gray-200 pt-6 mt-2">
                <h2 class="text-lg font-medium text-gray-800 mb-3">ข้อมูลผู้ปกครอง</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="parent_name" class="block text-sm font-medium text-gray-700 mb-1">ชื่อผู้ปกครอง</label>
                        <input type="text" name="parent_name" id="parent_name" value="{{ $student['parent_name'] }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    
                    <div>
                        <label for="parent_phone" class="block text-sm font-medium text-gray-700 mb-1">เบอร์โทรผู้ปกครอง</label>
                        <input type="text" name="parent_phone" id="parent_phone" value="{{ $student['parent_phone'] }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                </div>
            </div>
            
            <div class="flex justify-end space-x-3 mt-6">
                <a href="{{ route('behavior.students.show', $student['id']) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    ยกเลิก
                </a>
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    บันทึกข้อมูล
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

@section('styles')
<style>
    input:disabled, textarea:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }
</style>
@endsection