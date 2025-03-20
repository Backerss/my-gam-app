@extends('layouts.app')

@section('content')
<div class="fade-in p-4 sm:p-6">
    <!-- Header Card -->
    <div class="bg-gradient rounded-2xl shadow-lg p-6 mb-8 text-white transform hover:scale-[1.02] transition-transform">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-6">
            <div class="flex flex-col sm:flex-row items-center sm:items-start text-center sm:text-left gap-4 sm:gap-6">
                <!-- Profile Image -->
                <div class="relative group">
                    <div class="h-24 w-24 sm:h-28 sm:w-28 rounded-2xl bg-white flex items-center justify-center text-indigo-600 text-4xl font-bold shadow-inner border-4 border-indigo-100 transform transition-all group-hover:rotate-6">
                        {{ substr($user['name'], 0, 1) }}
                    </div>
                    <div class="absolute -bottom-2 -right-2 h-8 w-8 bg-green-500 rounded-full flex items-center justify-center shadow-lg border-2 border-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>

                <div class="space-y-2">
                    <h1 class="text-2xl sm:text-3xl font-bold">{{ $user['name'] }}</h1>
                    <div class="flex flex-wrap items-center justify-center sm:justify-start gap-2 text-sm sm:text-base text-indigo-100">
                        <span class="bg-indigo-600/30 px-3 py-1 rounded-full">{{ $user['email'] }}</span>
                        <span class="bg-indigo-600/30 px-3 py-1 rounded-full">
                            @switch($user['role_category'])
                                @case('administrative')
                                    คณะกรรมการอำนวยการ
                                    @break
                                @case('coordination')
                                    คณะกรรมการประสานงาน
                                    @break
                                @case('operations')
                                    คณะกรรมการดำเนินงาน
                                    @break
                            @endswitch
                        </span>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-3">
                <button onclick="openEditProfileModal()" class="flex items-center px-4 py-2 bg-white text-indigo-600 rounded-xl hover:bg-indigo-50 transition-colors shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                    </svg>
                    <span class="hidden sm:inline">แก้ไขข้อมูล</span>
                </button>
                <button class="flex items-center px-4 py-2 bg-white/10 text-white rounded-xl hover:bg-white/20 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="hidden sm:inline">ตั้งค่า</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Info Card -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Personal Info -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform hover:scale-[1.01] transition-transform">
                <div class="border-b border-gray-200 bg-gray-50 px-6 py-4 flex items-center justify-between">
                    <h2 class="text-lg font-medium text-gray-800">ข้อมูลส่วนตัว</h2>
                    <span class="text-xs text-gray-500">อัพเดทล่าสุด: {{ \Carbon\Carbon::parse($user['created_at'])->diffForHumans() }}</span>
                </div>
                
                <!-- Info Grid -->
                <div class="p-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        @php
                            $info_items = [
                                ['icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z', 'label' => 'ชื่อ-นามสกุล', 'value' => $user['name']],
                                ['icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'label' => 'อีเมล', 'value' => $user['email']],
                                ['icon' => 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z', 'label' => 'เบอร์โทรศัพท์', 'value' => $user['phone'] ?? '-'],
                                ['icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z', 'label' => 'วันที่เข้าร่วม', 'value' => \Carbon\Carbon::parse($user['created_at'])->format('d/m/Y')]
                            ];
                        @endphp

                        @foreach($info_items as $item)
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 rounded-lg bg-indigo-50 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}" />
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-500">{{ $item['label'] }}</p>
                                <p class="text-gray-800 truncate">{{ $item['value'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Additional Info/Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="bg-white rounded-xl shadow p-4 border-l-4 border-green-500">
                    <div class="flex items-center">
                        <div class="bg-green-100 p-2 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-500">สถานะ</p>
                            <p class="font-semibold text-gray-800">กำลังใช้งาน</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow p-4 border-l-4 border-blue-500">
                    <div class="flex items-center">
                        <div class="bg-blue-100 p-2 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-500">เข้าสู่ระบบล่าสุด</p>
                            <p class="font-semibold text-gray-800">2 ชั่วโมงที่แล้ว</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow p-4 border-l-4 border-purple-500">
                    <div class="flex items-center">
                        <div class="bg-purple-100 p-2 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-500">บันทึกล่าสุด</p>
                            <p class="font-semibold text-gray-800">12 รายการ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Role Info Card -->
        <div class="space-y-6">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform hover:scale-[1.01] transition-transform">
                <div class="border-b border-gray-200 bg-gray-50 px-6 py-4">
                    <h2 class="text-lg font-medium text-gray-800">บทบาทและสิทธิ์</h2>
                </div>
                <div class="p-6">
                    @php
                        $roleData = json_decode($user['role_data'], true);
                    @endphp
                    <div class="space-y-6">
                        <!-- Role Category -->
                        <div>
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 rounded-lg bg-indigo-50 flex items-center justify-center mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">ประเภทคณะกรรมการ</p>
                                    <p class="font-semibold text-gray-800">
                                        @switch($user['role_category'])
                                            @case('administrative')
                                                คณะกรรมการอำนวยการ
                                                @break
                                            @case('coordination')
                                                คณะกรรมการประสานงาน
                                                @break
                                            @case('operations')
                                                คณะกรรมการดำเนินงาน
                                                @break
                                        @endswitch
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Role Position -->
                        <div>
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-lg bg-indigo-50 flex items-center justify-center mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">ตำแหน่ง</p>
                                    <p class="font-semibold text-gray-800">
                                        @switch($user['role_category'])
                                            @case('administrative')
                                                @switch($roleData['admin_role'])
                                                    @case('director')
                                                        ผู้อำนวยการ
                                                        @break
                                                    @case('deputy_director')
                                                        รองผู้อำนวยการ
                                                        @break
                                                    @case('grade_head')
                                                        หัวหน้าระดับชั้น {{ strtoupper($roleData['grade_level']) }}
                                                        @break
                                                @endswitch
                                                @break
                                            @case('coordination')
                                                @switch($roleData['coordination_role'])
                                                    @case('grade_head')
                                                        หัวหน้าระดับชั้น {{ strtoupper($roleData['grade_level_coord']) }}
                                                        @break
                                                    @case('disciplinary')
                                                        ครูในงานฝ่ายปกครอง
                                                        @break
                                                @endswitch
                                                @break
                                            @case('operations')
                                                ครูที่ปรึกษาชั้น {{ strtoupper($roleData['grade_level_ops']) }}/{{ $roleData['classroom_number'] }}
                                                @break
                                        @endswitch
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Permissions -->
                        <div class="pt-6 border-t border-gray-200">
                            <h3 class="text-sm font-medium text-gray-500 mb-4">สิทธิ์การใช้งาน</h3>
                            <div class="space-y-3">
                                @php
                                    $permissions = [
                                        ['name' => 'ดูข้อมูลนักเรียน', 'granted' => true],
                                        ['name' => 'แก้ไขคะแนนพฤติกรรม', 'granted' => true],
                                        ['name' => 'ออกรายงาน', 'granted' => true],
                                        ['name' => 'จัดการผู้ใช้', 'granted' => false]
                                    ];
                                @endphp

                                @foreach($permissions as $permission)
                                <div class="flex items-center">
                                    <div class="{{ $permission['granted'] ? 'bg-green-100 text-green-600' : 'bg-gray-100 text-gray-400' }} p-1 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            @if($permission['granted'])
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            @else
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            @endif
                                        </svg>
                                    </div>
                                    <span class="ml-3 text-sm {{ $permission['granted'] ? 'text-gray-800' : 'text-gray-500' }}">
                                        {{ $permission['name'] }}
                                    </span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-sm font-medium text-gray-500 mb-4">การดำเนินการด่วน</h3>
                <div class="grid grid-cols-2 gap-4">
                    <button class="flex flex-col items-center justify-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                        </svg>
                        <span class="text-sm text-gray-600">เปลี่ยนรหัสผ่าน</span>
                    </button>
                    <button class="flex flex-col items-center justify-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                        </svg>
                        <span class="text-sm text-gray-600">ออกรายงาน</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
<div id="editProfileModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
    <div class="min-h-screen text-center p-4">
        <div class="inline-block w-full max-w-xl bg-white rounded-2xl text-left shadow-xl transform transition-all">
            <form method="POST" action="{{ route('behavior.profile.update') }}">
                @csrf
                @method('PUT')
                
                <div class="bg-white rounded-2xl overflow-hidden">
                    <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-medium text-gray-900">แก้ไขข้อมูลส่วนตัว</h3>
                            <button type="button" onclick="closeEditProfileModal()" class="text-gray-400 hover:text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <div class="p-6 space-y-6">
                        <!-- Form Fields -->
                        @foreach([
                            ['type' => 'text', 'name' => 'name', 'label' => 'ชื่อ-นามสกุล', 'value' => $user['name'], 'required' => true],
                            ['type' => 'email', 'name' => 'email', 'label' => 'อีเมล', 'value' => $user['email'], 'required' => true],
                            ['type' => 'tel', 'name' => 'phone', 'label' => 'เบอร์โทรศัพท์', 'value' => $user['phone']],
                            ['type' => 'password', 'name' => 'current_password', 'label' => 'รหัสผ่านปัจจุบัน'],
                            ['type' => 'password', 'name' => 'password', 'label' => 'รหัสผ่านใหม่ (เว้นว่างไว้ถ้าไม่ต้องการเปลี่ยน)'],
                            ['type' => 'password', 'name' => 'password_confirmation', 'label' => 'ยืนยันรหัสผ่านใหม่'],
                        ] as $field)
                        <div>
                            <label for="{{ $field['name'] }}" class="block text-sm font-medium text-gray-700 mb-1">
                                {{ $field['label'] }}
                                @if(isset($field['required']) && $field['required'])
                                    <span class="text-red-500">*</span>
                                @endif
                            </label>
                            <input 
                                type="{{ $field['type'] }}" 
                                id="{{ $field['name'] }}" 
                                name="{{ $field['name'] }}" 
                                value="{{ $field['value'] ?? '' }}"
                                class="form-control block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                                {{ isset($field['required']) && $field['required'] ? 'required' : '' }}
                            >
                        </div>
                        @endforeach
                    </div>
                    
                    <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                        <div class="flex justify-end space-x-3">
                            <button type="button" onclick="closeEditProfileModal()" class="px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                                ยกเลิก
                            </button>
                            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg transition-colors">
                                บันทึกการเปลี่ยนแปลง
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
function openEditProfileModal() {
    document.getElementById('editProfileModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeEditProfileModal() {
    document.getElementById('editProfileModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Close modal when clicking outside
document.getElementById('editProfileModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeEditProfileModal();
    }
});

// Close modal on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeEditProfileModal();
    }
});
</script>
@endsection