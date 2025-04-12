<!-- filepath: c:\Code\web\app\my-laravel-app\resources\views\auth\login.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#4F46E5">

    <title>{{ config('app.name', 'ระบบตัดคะแนนพฤติกรรมเด็ก') }} - เข้าสู่ระบบ</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        body {
            font-family: 'Prompt', sans-serif;
            background-color: #f9fafb;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%234f46e5' fill-opacity='0.03'%3E%3Cpath opacity='.5' d='M96 95h4v1h-4v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9zm-1 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9z'/%3E%3Cpath d='M6 5V0H5v5H0v1h5v94h1V6h94V5H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .login-container {
            max-width: 90%;
            width: 420px;
        }

        .form-control {
            transition: box-shadow 0.2s ease, border-color 0.2s ease;
        }

        .form-control:focus {
            border-color: #4F46E5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2) !important;
        }

        .btn-primary {
            background-color: #4F46E5;
            border-color: #4F46E5;
        }
        .btn-primary:hover {
            background-color: #4338ca;
            border-color: #4338ca;
        }

        .logo {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 0.5rem;
        }

        .logo svg {
            position: relative;
            z-index: 1;
        }

        .card-animation {
            animation: cardAppear 0.6s ease-out;
        }

        .card {
            border-radius: 0.75rem;
            overflow: hidden;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            border: none;
        }

        .input-with-icon {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            z-index: 10;
        }

        .form-control-icon-left {
            padding-left: 40px;
        }

        .text-indigo {
            color: #4F46E5;
        }

        .text-indigo-light {
            color: rgba(255, 255, 255, 0.8);
        }

        .form-check-input:checked {
            background-color: #4F46E5;
            border-color: #4F46E5;
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
    </style>
</head>
<body>
    <div class="login-container">
        <div class="card card-animation">
            <!-- Header with logo -->
            <div class="bg-gradient p-4 text-center">
                <div class="logo mb-3 mx-auto">
                    <div class="custom-logo mb-3">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="img-fluid" style="width: 50px; height: 50px; position: relative; z-index: 1;">
                    </div>
                </div>
                <h1 class="fs-4 fw-bold text-white">ระบบตัดคะแนนพฤติกรรมนักเรียน</h1>
                <p class="text-indigo-light mt-1 mb-0">กรุณาเข้าสู่ระบบเพื่อดำเนินการต่อ</p>
            </div>

            <!-- Login Form -->
            <div class="card-body p-4">
                @if ($errors->any())
                    <div class="alert alert-danger mb-4 py-2">
                        <p class="fw-medium mb-0 small">ข้อมูลไม่ถูกต้อง โปรดตรวจสอบและลองใหม่อีกครั้ง</p>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="mb-0">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label small fw-medium">อีเมล</label>
                        <div class="input-with-icon">
                            <div class="input-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="email"
                                autofocus
                                class="form-control form-control-icon-left @error('email') is-invalid @enderror"
                                placeholder="ระบุอีเมลของคุณ"
                            >
                        </div>
                        @error('email')
                            <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <label for="password" class="form-label small fw-medium">รหัสผ่าน</label>
                            @if (Route::has('password.request'))
                                <a class="small text-indigo text-decoration-none" href="{{ route('password.request') }}">
                                    ลืมรหัสผ่าน?
                                </a>
                            @endif
                        </div>
                        <div class="input-with-icon">
                            <div class="input-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                class="form-control form-control-icon-left @error('password') is-invalid @enderror"
                                placeholder="ระบุรหัสผ่านของคุณ"
                            >
                        </div>
                        @error('password')
                            <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input
                            id="remember"
                            type="checkbox"
                            name="remember"
                            class="form-check-input"
                            {{ old('remember') ? 'checked' : '' }}
                        >
                        <label for="remember" class="form-check-label small">
                            จดจำฉันไว้
                        </label>
                    </div>

                    <div class="mb-0">
                        <button type="submit" class="btn btn-primary w-100 py-2">
                            เข้าสู่ระบบ
                        </button>
                    </div>
                </form>

                @if (Route::has('register'))
                    <div class="text-center mt-4">
                        <p class="small text-muted mb-0">ยังไม่มีบัญชีผู้ใช้? 
                            <a href="{{ route('register') }}" class="fw-medium text-indigo text-decoration-none">
                                ลงทะเบียนที่นี่
                            </a>
                        </p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-4 text-center">
            <p class="small text-muted mb-1">&copy; {{ date('Y') }} ระบบตัดคะแนนพฤติกรรมนักเรียน</p>
            <p class="small text-muted opacity-75 mb-0">เวอร์ชัน 1.0.0</p>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>