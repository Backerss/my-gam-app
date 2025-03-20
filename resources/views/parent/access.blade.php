<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าดูข้อมูลนักเรียน - สำหรับผู้ปกครอง</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full mx-4">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient p-6 text-center">
                <h1 class="text-xl font-bold text-white mb-2">ระบบดูข้อมูลพฤติกรรมนักเรียน</h1>
                <p class="text-indigo-100">สำหรับผู้ปกครอง</p>
            </div>

            <!-- Form -->
            <div class="p-6">
                @if ($errors->any())
                    <div class="mb-4 bg-red-50 p-3 rounded-lg">
                        <p class="text-red-800 text-sm">{{ $errors->first() }}</p>
                    </div>
                @endif

                <form method="POST" action="{{ route('parent.verify') }}" class="space-y-4">
                    @csrf
                    <div class="space-y-4">
                        <!-- รหัสนักเรียน -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                รหัสนักเรียนหรือชื่อ-นามสกุล <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                name="student_identifier" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="เช่น 6585971001 หรือ ชื่อ-นามสกุล"
                                required
                            >
                            <p class="mt-1 text-sm text-gray-500">
                                รหัสนักเรียน: 65(ปีที่เข้า)85971(เลข 5 ตัวท้ายบัตรประชาชน)001(ลำดับ)
                            </p>
                        </div>

                        <!-- เลขบัตรประชาชนนักเรียน -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                เลขบัตรประชาชนนักเรียน <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                name="student_id_card" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="กรอกเลขบัตรประชาชนนักเรียน 13 หลัก"
                                maxlength="13"
                                required
                            >
                            <p class="mt-1 text-sm text-gray-500">
                                ใช้สำหรับยืนยันตัวตนนักเรียน
                            </p>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        ค้นหาข้อมูล
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- อัพเดท JavaScript validation -->
    <script>
    document.querySelector('form').addEventListener('submit', function(e) {
        const studentInput = document.querySelector('input[name="student_identifier"]');
        const idCardInput = document.querySelector('input[name="student_id_card"]');
        
        const studentValue = studentInput.value.trim();
        const idCardValue = idCardInput.value.trim();
        
        let hasError = false;

        // ตรวจสอบรหัสนักเรียน (ถ้าเป็นตัวเลข)
        if (/^\d+$/.test(studentValue) && studentValue.length !== 10) {
            alert('รหัสนักเรียนต้องเป็นตัวเลข 10 หลักเท่านั้น\nตัวอย่าง: 6585971001');
            studentInput.focus();
            hasError = true;
        }

        // ตรวจสอบเลขบัตรประชาชน
        if (!/^\d{13}$/.test(idCardValue)) {
            alert('กรุณากรอกเลขบัตรประชาชนนักเรียน 13 หลักให้ถูกต้อง');
            idCardInput.focus();
            hasError = true;
        }

        if (hasError) {
            e.preventDefault();
        }
    });

    // จำกัดการกรอกเฉพาะตัวเลขในช่องบัตรประชาชน
    document.querySelector('input[name="student_id_card"]').addEventListener('keypress', function(e) {
        if (!/^\d$/.test(e.key)) {
            e.preventDefault();
        }
    });
    </script>
</body>
</html>