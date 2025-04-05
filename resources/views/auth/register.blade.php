<!-- filepath: c:\Code\web\app\my-laravel-app\resources\views\auth\register.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#4F46E5">

    <title>{{ config('app.name', 'ระบบตัดคะแนนพฤติกรรมเด็ก') }} - ลงทะเบียน</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Prompt', sans-serif;
            background-color: #f9fafb;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%234f46e5' fill-opacity='0.03'%3E%3Cpath opacity='.5' d='M96 95h4v1h-4v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9zm-1 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9z'/%3E%3Cpath d='M6 5V0H5v5H0v1h5v94h1V6h94V5H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            padding: 20px 0;
        }

        .register-container {
            max-width: 90%;
            width: 680px;
        }

        .custom-control {
            transition: box-shadow 0.2s ease, border-color 0.2s ease;
        }

        .custom-control:focus {
            border-color: #4F46E5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }


        .btn-custom-gradient {
            background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);
            transition: all 0.3s ease;
        }

        .btn-custom-gradient:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
        }

        .custom-logo {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 0.5rem;
        }

        .custom-logo:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);
            border-radius: 0.5rem;
            opacity: 0.8;
        }

        .custom-logo svg {
            position: relative;
            z-index: 1;
        }

        .card-animation {
            animation: cardAppear 0.6s ease-out;
        }

        @keyframes cardAppear {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .custom-select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
        }

        .hidden-form-group {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
            opacity: 0;
        }

        .hidden-form-group.active {
            max-height: 300px;
            opacity: 1;
        }
        
        .rounded-card {
            border-radius: 0.75rem;
        }
        
        .text-indigo {
            color: #4F46E5;
        }
        
        .text-indigo-light {
            color: #818cf8;
        }
        
        .border-custom {
            border-color: #e5e7eb;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="card-animation bg-white rounded-card shadow overflow-hidden">
            <!-- Header with logo -->
            <div class="bg-gradient p-4 p-md-5 d-flex flex-column align-items-center">
                <div class="custom-logo bg-white mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                    </svg>
                </div>
                <h1 class="fs-4 fw-bold text-white">ระบบตัดคะแนนพฤติกรรมนักเรียน</h1>
                <p class="text-white-50 mt-1">ลงทะเบียนเพื่อใช้งานระบบ</p>
            </div>

            <!-- Register Form -->
            <div class="p-4 p-md-5">
                @if ($errors->any())
                    <div class="mb-4 alert alert-danger p-3 rounded">
                        <p class="text-danger small fw-medium">ข้อมูลไม่ถูกต้อง โปรดตรวจสอบและลองใหม่อีกครั้ง</p>
                        <ul class="mt-2 small text-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- ข้อมูลพื้นฐาน -->
                    <h2 class="fs-5 fw-medium text-dark border-bottom border-secondary-subtle pb-2 mb-3">ข้อมูลส่วนตัว</h2>
                    
                    <!-- ชื่อจริงนามสกุล -->
                    <div class="mb-3">
                        <label for="name" class="form-label small fw-medium text-secondary mb-1">ชื่อจริงนามสกุล <span class="text-danger">*</span></label>
                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autocomplete="name"
                            class="form-control custom-control @error('name') is-invalid @enderror"
                            placeholder="ชื่อ-นามสกุล"
                        >
                        @error('name')
                            <div class="invalid-feedback small">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- อีเมล -->
                    <div class="mb-3">
                        <label for="email" class="form-label small fw-medium text-secondary mb-1">อีเมล <span class="text-danger">*</span></label>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                            class="form-control custom-control @error('email') is-invalid @enderror"
                            placeholder="example@school.ac.th"
                        >
                        @error('email')
                            <div class="invalid-feedback small">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- รหัสผ่าน -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="password" class="form-label small fw-medium text-secondary mb-1">รหัสผ่าน <span class="text-danger">*</span></label>
                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="new-password"
                                class="form-control custom-control @error('password') is-invalid @enderror"
                                placeholder="อย่างน้อย 8 ตัวอักษร"
                            >
                            @error('password')
                                <div class="invalid-feedback small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="password_confirmation" class="form-label small fw-medium text-secondary mb-1">ยืนยันรหัสผ่าน <span class="text-danger">*</span></label>
                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                class="form-control custom-control"
                                placeholder="ยืนยันรหัสผ่านอีกครั้ง"
                            >
                        </div>
                    </div>

                    <!-- ข้อมูลบทบาทและตำแหน่ง -->
                    <h2 class="fs-5 fw-medium text-dark border-bottom border-secondary-subtle pb-2 mb-3 mt-4">บทบาทและตำแหน่ง</h2>

                    <!-- เลือกตำแหน่ง -->
                    <div class="mb-3">
                        <label for="role_category" class="form-label small fw-medium text-secondary mb-1">คณะกรรมการ <span class="text-danger">*</span></label>
                        <select 
                            id="role_category" 
                            name="role_category" 
                            class="form-select custom-select custom-control"
                            required
                            onchange="showRoleOptions(this.value)"
                        >
                            <option value="" disabled selected>--- เลือกประเภทคณะกรรมการ ---</option>
                            <option value="administrative" {{ old('role_category') == 'administrative' ? 'selected' : '' }}>คณะกรรมการอำนวยการ</option>
                            <option value="coordination" {{ old('role_category') == 'coordination' ? 'selected' : '' }}>คณะกรรมการประสานงาน</option>
                            <option value="operations" {{ old('role_category') == 'operations' ? 'selected' : '' }}>คณะกรรมการดำเนินงาน</option>
                        </select>
                    </div>

                    <!-- ตำแหน่งในคณะกรรมการอำนวยการ -->
                    <div id="administrative_roles" class="hidden-form-group {{ old('role_category') == 'administrative' ? 'active' : '' }}">
                        <label for="admin_role" class="form-label small fw-medium text-secondary mb-1">ตำแหน่ง <span class="text-danger">*</span></label>
                        <select 
                            id="admin_role" 
                            name="admin_role" 
                            class="form-select custom-select custom-control"
                            {{ old('role_category') == 'administrative' ? 'required' : '' }}
                        >
                            <option value="" disabled selected>--- เลือกตำแหน่ง ---</option>
                            <option value="director" {{ old('admin_role') == 'director' ? 'selected' : '' }}>ผู้อำนวยการ</option>
                            <option value="deputy_director" {{ old('admin_role') == 'deputy_director' ? 'selected' : '' }}>รองผู้อำนวยการ</option>
                            <option value="grade_head" {{ old('admin_role') == 'grade_head' ? 'selected' : '' }}>หัวหน้าระดับชั้น</option>
                        </select>
                        
                        <!-- ถ้าเลือกเป็นหัวหน้าระดับชั้น ให้เลือกระดับชั้น -->
                        <div id="grade_level_admin" class="mt-3 hidden-form-group {{ old('admin_role') == 'grade_head' ? 'active' : '' }}">
                            <label for="grade_level" class="form-label small fw-medium text-secondary mb-1">ระดับชั้น <span class="text-danger">*</span></label>
                            <select 
                                id="grade_level_admin_select" 
                                name="grade_level" 
                                class="form-select custom-select custom-control"
                                {{ old('admin_role') == 'grade_head' ? 'required' : '' }}
                            >
                                <option value="" disabled selected>--- เลือกระดับชั้น ---</option>
                                <option value="m1" {{ old('grade_level') == 'm1' ? 'selected' : '' }}>มัธยมศึกษาปีที่ 1</option>
                                <option value="m2" {{ old('grade_level') == 'm2' ? 'selected' : '' }}>มัธยมศึกษาปีที่ 2</option>
                                <option value="m3" {{ old('grade_level') == 'm3' ? 'selected' : '' }}>มัธยมศึกษาปีที่ 3</option>
                                <option value="m4" {{ old('grade_level') == 'm4' ? 'selected' : '' }}>มัธยมศึกษาปีที่ 4</option>
                                <option value="m5" {{ old('grade_level') == 'm5' ? 'selected' : '' }}>มัธยมศึกษาปีที่ 5</option>
                                <option value="m6" {{ old('grade_level') == 'm6' ? 'selected' : '' }}>มัธยมศึกษาปีที่ 6</option>
                            </select>
                        </div>
                    </div>

                    <!-- ตำแหน่งในคณะกรรมการประสานงาน -->
                    <div id="coordination_roles" class="hidden-form-group {{ old('role_category') == 'coordination' ? 'active' : '' }}">
                        <label for="coordination_role" class="form-label small fw-medium text-secondary mb-1">ตำแหน่ง <span class="text-danger">*</span></label>
                        <select 
                            id="coordination_role" 
                            name="coordination_role" 
                            class="form-select custom-select custom-control"
                            {{ old('role_category') == 'coordination' ? 'required' : '' }}
                        >
                            <option value="" disabled selected>--- เลือกตำแหน่ง ---</option>
                            <option value="grade_head" {{ old('coordination_role') == 'grade_head' ? 'selected' : '' }}>หัวหน้าระดับชั้น มัธยมศึกษา</option>
                            <option value="disciplinary" {{ old('coordination_role') == 'disciplinary' ? 'selected' : '' }}>ครูในงานฝ่ายปกครอง</option>
                        </select>
                        
                        <!-- ถ้าเลือกเป็นหัวหน้าระดับชั้น ให้เลือกระดับชั้น -->
                        <div id="grade_level_coord" class="mt-3 hidden-form-group {{ old('coordination_role') == 'grade_head' ? 'active' : '' }}">
                            <label for="grade_level_coord_select" class="form-label small fw-medium text-secondary mb-1">ระดับชั้น <span class="text-danger">*</span></label>
                            <select 
                                id="grade_level_coord_select" 
                                name="grade_level_coord" 
                                class="form-select custom-select custom-control"
                                {{ old('coordination_role') == 'grade_head' ? 'required' : '' }}
                            >
                                <option value="" disabled selected>--- เลือกระดับชั้น ---</option>
                                <option value="m1" {{ old('grade_level_coord') == 'm1' ? 'selected' : '' }}>มัธยมศึกษาปีที่ 1</option>
                                <option value="m2" {{ old('grade_level_coord') == 'm2' ? 'selected' : '' }}>มัธยมศึกษาปีที่ 2</option>
                                <option value="m3" {{ old('grade_level_coord') == 'm3' ? 'selected' : '' }}>มัธยมศึกษาปีที่ 3</option>
                                <option value="m4" {{ old('grade_level_coord') == 'm4' ? 'selected' : '' }}>มัธยมศึกษาปีที่ 4</option>
                                <option value="m5" {{ old('grade_level_coord') == 'm5' ? 'selected' : '' }}>มัธยมศึกษาปีที่ 5</option>
                                <option value="m6" {{ old('grade_level_coord') == 'm6' ? 'selected' : '' }}>มัธยมศึกษาปีที่ 6</option>
                            </select>
                        </div>
                    </div>

                    <!-- ตำแหน่งในคณะกรรมการดำเนินงาน (แก้ไขส่วนที่ซ้ำซ้อน) -->
                    <div id="operations_roles" class="hidden-form-group {{ old('role_category') == 'operations' ? 'active' : '' }}">
                        <label for="classroom_info" class="form-label small fw-medium text-secondary mb-3">ข้อมูลชั้นเรียนที่เป็นที่ปรึกษา <span class="text-danger">*</span></label>
                        
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="grade_level_ops" class="form-label small fw-medium text-secondary mb-1">ระดับชั้น</label>
                                <select 
                                    id="grade_level_ops" 
                                    name="grade_level_ops" 
                                    class="form-select custom-select custom-control"
                                    {{ old('role_category') == 'operations' ? 'required' : '' }}
                                >
                                    <option value="" disabled selected>--- เลือกระดับชั้น ---</option>
                                    <option value="m1" {{ old('grade_level_ops') == 'm1' ? 'selected' : '' }}>มัธยมศึกษาปีที่ 1</option>
                                    <option value="m2" {{ old('grade_level_ops') == 'm2' ? 'selected' : '' }}>มัธยมศึกษาปีที่ 2</option>
                                    <option value="m3" {{ old('grade_level_ops') == 'm3' ? 'selected' : '' }}>มัธยมศึกษาปีที่ 3</option>
                                    <option value="m4" {{ old('grade_level_ops') == 'm4' ? 'selected' : '' }}>มัธยมศึกษาปีที่ 4</option>
                                    <option value="m5" {{ old('grade_level_ops') == 'm5' ? 'selected' : '' }}>มัธยมศึกษาปีที่ 5</option>
                                    <option value="m6" {{ old('grade_level_ops') == 'm6' ? 'selected' : '' }}>มัธยมศึกษาปีที่ 6</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="classroom_number" class="form-label small fw-medium text-secondary mb-1">ห้อง</label>
                                <select 
                                    id="classroom_number" 
                                    name="classroom_number" 
                                    class="form-select custom-select custom-control"
                                    {{ old('role_category') == 'operations' ? 'required' : '' }}
                                >
                                    <option value="" disabled selected>--- เลือกห้อง ---</option>
                                    @for($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}" {{ old('classroom_number') == $i ? 'selected' : '' }}>ห้อง {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- ข้อมูลเพิ่มเติม -->
                    <h2 class="fs-5 fw-medium text-dark border-bottom border-secondary-subtle pb-2 mb-3 mt-4">ข้อมูลเพิ่มเติม</h2>
                    <div class="mb-4">
                        <label for="phone" class="form-label small fw-medium text-secondary mb-1">เบอร์โทรศัพท์ <span class="text-danger">*</span></label>
                        <input
                            id="phone"
                            type="tel"
                            name="phone"
                            value="{{ old('phone') }}"
                            required
                            class="form-control custom-control @error('phone') is-invalid @enderror"
                            placeholder="0812345678"
                        >
                        @error('phone')
                            <div class="invalid-feedback small">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- ปุ่มส่งข้อมูล -->
                    <div class="mt-4">
                        <button type="submit" class="btn btn-custom-gradient text-white fw-semibold rounded w-100 py-2">
                            ลงทะเบียน
                        </button>
                    </div>

                    <!-- ลิงก์ไปหน้าล็อกอิน -->
                    <div class="mt-3 text-center">
                        <p class="small text-secondary">
                            มีบัญชีอยู่แล้ว? <a href="{{ route('login') }}" class="fw-medium text-indigo text-decoration-none">เข้าสู่ระบบ</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // แสดงตัวเลือกตามบทบาทที่เลือก
        function showRoleOptions(roleCategory) {
            const roles = ['administrative', 'coordination', 'operations'];
            const fields = {
                administrative: ['admin_role', 'grade_level_admin_select'],
                coordination: ['coordination_role', 'grade_level_coord_select'],
                operations: ['grade_level_ops', 'classroom_number']
            };

            // ซ่อนทุกตัวเลือก
            roles.forEach(role => {
                document.getElementById(role + '_roles').classList.remove('active');
            });

            // ลบ required จากทุกฟิลด์
            Object.values(fields).flat().forEach(field => {
                const element = document.getElementById(field);
                if (element) element.removeAttribute('required');
            });

            // แสดงและกำหนด required ตามบทบาทที่เลือก
            if (roleCategory) {
                document.getElementById(roleCategory + '_roles').classList.add('active');
                fields[roleCategory].forEach(field => {
                    const element = document.getElementById(field);
                    if (element) element.setAttribute('required', '');
                });
            }
        }

        // Event Listeners
        document.addEventListener('DOMContentLoaded', function() {
            const roleCategory = document.getElementById('role_category').value;
            if (roleCategory) {
                showRoleOptions(roleCategory);
                
                if (roleCategory === 'administrative') {
                    const adminRole = document.getElementById('admin_role').value;
                    if (adminRole === 'grade_head') {
                        document.getElementById('grade_level_admin').classList.add('active');
                        document.getElementById('grade_level_admin_select').setAttribute('required', '');
                    }
                }
                
                if (roleCategory === 'coordination') {
                    const coordRole = document.getElementById('coordination_role').value;
                    if (coordRole === 'grade_head') {
                        document.getElementById('grade_level_coord').classList.add('active');
                        document.getElementById('grade_level_coord_select').setAttribute('required', '');
                    }
                }
            }

            // Event listeners for role changes
            ['admin_role', 'coordination_role'].forEach(roleId => {
                const element = document.getElementById(roleId);
                if (element) {
                    element.addEventListener('change', function() {
                        const gradeLevel = document.getElementById(
                            roleId === 'admin_role' ? 'grade_level_admin' : 'grade_level_coord'
                        );
                        const gradeLevelSelect = document.getElementById(
                            roleId === 'admin_role' ? 'grade_level_admin_select' : 'grade_level_coord_select'
                        );
                        
                        gradeLevel.classList.remove('active');
                        gradeLevelSelect.removeAttribute('required');
                        
                        if (this.value === 'grade_head') {
                            gradeLevel.classList.add('active');
                            gradeLevelSelect.setAttribute('required', '');
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>