<div class="navigation-container">

    <!-- Desktop Sidebar -->
    <aside id="sidebar" class="d-flex flex-column position-fixed h-100">
        <div class="d-flex flex-column h-100">
            <!-- Profile Section -->
            <div class="profile-section d-flex align-items-center">
                <div class="d-flex align-items-center">
                    <div class="bg-white text-primary rounded p-1 me-2">
                        <i class="bi bi-person-circle"></i>
                    </div>
                    <div>
                        <p class="name">Fistname Lastname</p>
                        <small class="job-title">XXXXXXXXXXXXXX</small>
                    </div>
                </div>
                <button id="sidebar-close" class="btn btn-link text-white ms-auto d-md-none">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <!-- Navigation Content -->
            <div class="overflow-auto flex-grow-1">
                <nav class="nav-menu">
                    <!-- Dashboard Link -->
                    <a href="{{ route('behavior.dashboard') }}" class="nav-item-custom {{ request()->routeIs('behavior.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-house-door nav-icon"></i>
                        <span>Dashboard</span>
                    </a>
                    
                    <!-- Revenue Link (Deduct) -->
                    <a href="{{ route('behavior.deduct') }}" class="nav-item-custom {{ request()->is('behavior/deduct*') ? 'active' : '' }}">
                        <i class="bi bi-graph-up nav-icon"></i>
                        <span>Revenue</span>
                    </a>
                    
                    <!-- Notifications Link -->
                    <a href="{{ route('behavior.notifications') }}" class="nav-item-custom {{ request()->routeIs('behavior.notifications') ? 'active' : '' }}">
                        <i class="bi bi-bell nav-icon"></i>
                        <span>Notifications</span>
                    </a>

                    <!-- Analytics/Reports Link -->
                    <a href="{{ route('behavior.reports') }}" class="nav-item-custom {{ request()->routeIs('behavior.reports') ? 'active' : '' }}">
                        <i class="bi bi-pie-chart nav-icon"></i>
                        <span>Analytics</span>
                    </a>
                    
                    <!-- Students Link -->
                    <a href="{{ route('behavior.students') }}" class="nav-item-custom {{ request()->routeIs('behavior.students') ? 'active' : '' }}">
                        <i class="bi bi-heart nav-icon"></i>
                        <span>Students</span>
                    </a>
                    
                    <!-- Settings Link -->
                    <a href="{{ route('behavior.settings') }}" class="nav-item-custom {{ request()->routeIs('behavior.settings') ? 'active' : '' }}">
                        <i class="bi bi-wallet2 nav-icon"></i>
                        <span>Settings</span>
                    </a>
                    
                    <!-- Logout Link -->
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-item-custom">
                        <i class="bi bi-box-arrow-left nav-icon"></i>
                        <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </nav>
            </div>
        
        </div>
    </aside>
    
    <!-- Overlay for mobile -->
    <div id="sidebar-overlay" class="sidebar-overlay"></div>
    
    <!-- Mobile Bottom Navigation -->
    <nav class="d-md-none fixed-bottom bg-white border-top mobile-nav">
        <div class="container-fluid">
            <div class="row text-center py-2">
                <div class="col">
                    <a href="{{ route('behavior.dashboard') }}" class="d-flex flex-column align-items-center text-decoration-none {{ request()->routeIs('behavior.dashboard') ? 'text-primary' : 'text-muted' }}">
                        <i class="bi bi-house-door"></i>
                        <span class="small">Dashboard</span>
                    </a>
                </div>
                <div class="col">
                    <a href="/behavior/deduct" class="d-flex flex-column align-items-center text-decoration-none {{ request()->is('behavior/deduct*') ? 'text-primary' : 'text-muted' }}">
                        <i class="bi bi-graph-up"></i>
                        <span class="small">Revenue</span>
                    </a>
                </div>
                <div class="col">
                    <a href="#" class="d-flex flex-column align-items-center text-decoration-none text-muted">
                        <i class="bi bi-bell"></i>
                        <span class="small">Notif</span>
                    </a>
                </div>
                <div class="col">
                    <a href="#" class="d-flex flex-column align-items-center text-decoration-none text-muted">
                        <i class="bi bi-pie-chart"></i>
                        <span class="small">Stats</span>
                    </a>
                </div>
                <div class="col">
                    <a href="#" class="d-flex flex-column align-items-center text-decoration-none text-muted">
                        <i class="bi bi-person"></i>
                        <span class="small">Profile</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>

<style>
    /* Main layout */
    .navigation-container {
        position: relative;
    }

    /* Mobile header styling */
    .mobile-header {
        background-color: #1e3a70;
        color: white;
        padding: 16px;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1020;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        height: 64px;
    }

    /* Main sidebar styling */
    #sidebar {
        background-color: #1e3a70; /* Dark blue background */
        border: none !important;
        color: white;
        width: 240px !important;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        padding: 0;
        z-index: 1010; /* ต่ำกว่า navbar */
        left: 0;
        transition: transform 0.3s ease, opacity 0.2s ease;
    }

    /* Navigation menu container */
    .nav-menu {
        padding: 0 !important;
    }

    /* Profile section styling */
    .profile-section {
        padding: 16px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .profile-section .name {
        font-weight: 600;
        font-size: 16px;
        margin-bottom: 0;
    }

    .profile-section .job-title {
        font-size: 12px;
        opacity: 0.7;
    }

    /* Search box styling */
    .search-container {
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .search-box {
        background-color: rgba(255, 255, 255, 0.1);
    }
    
    .search-input {
        outline: none;
        color: white;
    }
    
    .search-input::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }

    /* Navigation item styling */
    .nav-item-custom {
        display: flex;
        align-items: center;
        padding: 14px 16px;
        margin: 0;
        border-radius: 0;
        color: white;
        font-weight: 400;
        font-size: 14px;
        transition: background-color 0.2s ease;
        border-left: 3px solid transparent;
        text-decoration: none;
    }

    .nav-item-custom:hover {
        background-color: rgba(255, 255, 255, 0.1);
        color: white;
        text-decoration: none;
    }

    .nav-item-custom.active {
        background-color: rgba(255, 255, 255, 0.15);
        color: white;
        font-weight: 400;
        box-shadow: none;
        border-left: 3px solid white;
    }

    /* Navigation icon styling */
    .nav-icon {
        height: 18px;
        width: 18px;
        margin-right: 12px;
        flex-shrink: 0;
    }

    /* Footer section styling */
    .border-top {
        border-top-color: rgba(255, 255, 255, 0.1) !important;
    }

    .bg-light {
        background-color: rgba(255, 255, 255, 0.05) !important;
    }

    /* Dark mode toggle styling */
    .dark-mode-switch {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 14px 16px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .toggle-switch {
        position: relative;
        display: inline-block;
        width: 40px;
        height: 20px;
    }

    .toggle-switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .toggle-slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(255, 255, 255, 0.2);
        transition: .4s;
        border-radius: 34px;
    }

    .toggle-slider:before {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        left: 2px;
        bottom: 2px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
    }

    input:checked + .toggle-slider {
        background-color: #60a5fa;
    }

    input:checked + .toggle-slider:before {
        transform: translateX(20px);
    }

    /* Mobile bottom navigation */
    .mobile-nav {
        box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
        z-index: 1020;
    }

    /* Sidebar overlay ปรับ z-index ให้อยู่ระหว่าง sidebar และ navbar */
    .sidebar-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1015; 
        display: none;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .sidebar-overlay.active {
        display: block;
        opacity: 1;
    }

    /* Mobile specific styling */
    @media (max-width: 767px) {
        #sidebar {
            transform: translateX(-100%);
            opacity: 0;
            top: 64px; /* Height of top navigation */
            width: 80% !important;
            max-width: 280px;
            z-index: 1030;
            height: calc(100% - 64px) !important; /* ความสูงที่เหลือหลังจากหักความสูงของ header */
        }
        
        #sidebar.active {
            transform: translateX(0);
            opacity: 1;
        }

        .content-wrapper {
            margin-left: 0 !important;
            margin-top: 0; /* ไม่ต้องมี margin top เพราะใช้ top nav แล้ว */
            padding-bottom: 70px; /* Height of mobile bottom nav */
        }
    }

    @media (min-width: 768px) {
        #sidebar {
            position: fixed;
            top: 64px; /* ค่าเริ่มต้นตาม header height */
            height: calc(100% - 64px); /* ความสูงที่เหลือหลังจากหักความสูงของ header */
            z-index: 1010;
        }
        
        /* content-wrapper จะถูกปรับด้วย JavaScript เมื่อมี navbar */
        .content-wrapper {
            margin-left: 240px;
            transition: margin-left 0.3s ease, padding-top 0.3s ease;
        }
        
        /* สำหรับ navbar หลัก */
        .main-navbar {
            z-index: 1020;
        }
    }

    /* Dark mode styles */
    :root {
        --bg-light: #f9fafb;
        --text-light: #212529;
        --bg-dark: #111827;
        --text-dark: #f3f4f6;
        --sidebar-bg-light: #1e3a70;
        --sidebar-bg-dark: #0f172a;
    }
    
    /* Dark mode styling */
    .dark-mode {
        background-color: var(--bg-dark);
        color: var(--text-dark);
    }
    
    .dark-mode #sidebar {
        background-color: var(--sidebar-bg-dark);
    }
    
    .dark-mode .mobile-header {
        background-color: var(--sidebar-bg-dark);
    }
    
    .dark-mode .mobile-nav {
        background-color: #1f2937;
        border-top-color: #374151;
    }
    
    .dark-mode .text-muted {
        color: #9ca3af !important;
    }
    
    .dark-mode .search-box {
        background-color: rgba(255, 255, 255, 0.05);
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Elements
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebar-toggle');
    const sidebarClose = document.getElementById('sidebar-close');
    const sidebarOverlay = document.getElementById('sidebar-overlay');
    const darkModeToggle = document.getElementById('dark-mode-toggle');
    
    // จัดการ Dark Mode
    if (localStorage.getItem('darkMode') === 'true') {
        document.documentElement.classList.add('dark-mode');
        if (darkModeToggle) darkModeToggle.checked = true;
    }
    
    // ฟังก์ชันสำหรับปรับตำแหน่ง sidebar ตาม navbar
    function adjustSidebarPosition() {
        // หาความสูงของ header หลัก
        const header = document.querySelector('header.sticky-top');
        
        if (!header) return;
        
        const headerHeight = header.offsetHeight;
        
        if (window.innerWidth >= 768) {
            // ปรับ sidebar ให้อยู่ใต้ header
            sidebar.style.top = headerHeight + 'px';
            sidebar.style.height = `calc(100% - ${headerHeight}px)`;
            
            // ปรับ main content
            const mainContent = document.querySelector('.main-content');
            if (mainContent) {
                mainContent.style.marginTop = '0'; // ไม่ต้องมี margin-top เพราะ header จัดการให้แล้ว
            }
        } else {
            // สำหรับโมบาย
            sidebar.style.top = headerHeight + 'px';
            sidebar.style.height = `calc(100% - ${headerHeight}px)`;
        }
    }
    
    // เรียกฟังก์ชันเมื่อโหลดหน้าเว็บและเมื่อมีการปรับขนาดหน้าจอ
    adjustSidebarPosition();
    window.addEventListener('resize', adjustSidebarPosition);
    
    // ตรวจสอบเมื่อมีการเปลี่ยนแปลงใน DOM
    const observer = new MutationObserver(adjustSidebarPosition);
    const header = document.querySelector('header.sticky-top');
    if (header) {
        observer.observe(header, { childList: true, subtree: true, attributes: true });
    }
    
    // ส่วน toggle sidebar สำหรับ mobile
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('active');
            sidebarOverlay.classList.toggle('active');
            document.body.style.overflow = sidebar.classList.contains('active') ? 'hidden' : '';
        });
    }
    
    // ปิด sidebar
    if (sidebarClose) {
        sidebarClose.addEventListener('click', function() {
            sidebar.classList.remove('active');
            sidebarOverlay.classList.remove('active');
            document.body.style.overflow = '';
        });
    }
    
    if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', function() {
            sidebar.classList.remove('active');
            sidebarOverlay.classList.remove('active');
            document.body.style.overflow = '';
        });
    }
    
    // จัดการ dark mode toggle
    if (darkModeToggle) {
        darkModeToggle.addEventListener('change', function() {
            if (this.checked) {
                document.documentElement.classList.add('dark-mode');
                localStorage.setItem('darkMode', 'true');
            } else {
                document.documentElement.classList.remove('dark-mode');
                localStorage.setItem('darkMode', 'false');
            }
        });
    }
});
</script>
