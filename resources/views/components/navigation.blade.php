<div class="navigation-container">
    <!-- Desktop Sidebar -->
    <aside id="sidebar" class="bg-white border-end border-light shadow-sm d-none d-md-flex flex-column position-fixed h-100" style="width: 256px; top: 64px; z-index: 30;">
        <div class="d-flex flex-column h-100">
            
            <!-- Navigation Content -->
            <div class="overflow-auto flex-grow-1 py-4">
                <nav class="px-2 nav-menu">
                    <!-- Dashboard Link -->
                    <a href="{{ route('behavior.dashboard') }}" class="nav-item-custom {{ request()->routeIs('behavior.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-house-door nav-icon"></i>
                        <span>แดชบอร์ด</span>
                    </a>
                    
                    <!-- Behavior Deduction Link -->
                    <a href="/behavior/deduct" class="nav-item-custom {{ request()->is('behavior/deduct*') ? 'active' : '' }}">
                        <i class="bi bi-gear nav-icon"></i>
                        <span>หักคะแนนพฤติกรรม</span>
                    </a>
                    
                    <!-- Student Management Link -->
                    <a href="{{ route('behavior.students') }}" class="nav-item-custom {{ request()->is('behavior.students*') ? 'active' : '' }}">
                        <i class="bi bi-people nav-icon"></i>
                        <span>จัดการนักเรียน</span>
                    </a>

                    <!-- Parent Management Link -->
                    <a href="{{ route('behavior.parents.index') }}" class="nav-item-custom {{ request()->is('behavior/parents*') ? 'active' : '' }}">
                        <i class="bi bi-person-lines-fill nav-icon"></i>
                        <span>จัดการผู้ปกครอง</span>
                    </a>
                    
                    <!-- Reports Link -->
                    <a href="{{ route('behavior.reports') }}" class="nav-item-custom {{ request()->is('reports/behavior*') ? 'active' : '' }}">
                        <i class="bi bi-bar-chart nav-icon"></i>
                        <span>รายงาน</span>
                    </a>
                    
                    <!-- Settings Link -->
                    <a href="{{ route('behavior.settings') }}" class="nav-item-custom {{ request()->is('behavior/settings*') ? 'active' : '' }}">
                        <i class="bi bi-gear-fill nav-icon"></i>
                        <span>ตั้งค่า</span>
                    </a>
                </nav>
            </div>
            
            <!-- Footer Info -->
            <div class="border-top border-light p-3 bg-light">
                <div class="d-flex align-items-center text-muted small">
                    <i class="bi bi-info-circle me-2"></i>
                    <span>เวอร์ชัน 1.0.0</span>
                </div>
            </div>
        </div>
    </aside>
    
    <!-- Mobile Bottom Navigation (will be shown on small screens) -->
    <nav class="d-md-none fixed-bottom bg-white border-top" style="display: none;">
        <div class="container-fluid">
            <div class="row text-center py-2">
                <div class="col">
                    <a href="{{ route('behavior.dashboard') }}" class="d-flex flex-column align-items-center text-decoration-none {{ request()->routeIs('behavior.dashboard') ? 'text-primary' : 'text-muted' }}">
                        <i class="bi bi-house-door"></i>
                        <span class="small">หน้าหลัก</span>
                    </a>
                </div>
                <div class="col">
                    <a href="/behavior/deduct" class="d-flex flex-column align-items-center text-decoration-none {{ request()->is('behavior/deduct*') ? 'text-primary' : 'text-muted' }}">
                        <i class="bi bi-gear"></i>
                        <span class="small">หักคะแนน</span>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('behavior.students') }}" class="d-flex flex-column align-items-center text-decoration-none {{ request()->is('behavior.students*') ? 'text-primary' : 'text-muted' }}">
                        <i class="bi bi-people"></i>
                        <span class="small">นักเรียน</span>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('behavior.reports') }}" class="d-flex flex-column align-items-center text-decoration-none {{ request()->is('reports/behavior*') ? 'text-primary' : 'text-muted' }}">
                        <i class="bi bi-bar-chart"></i>
                        <span class="small">รายงาน</span>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('behavior.parents.index') }}" class="d-flex flex-column align-items-center text-decoration-none {{ request()->is('behavior/parents*') ? 'text-primary' : 'text-muted' }}">
                        <i class="bi bi-person-lines-fill"></i>
                        <span class="small">ผู้ปกครอง</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>

<style>
    /* Improved sidebar styling */
    .sidenav {
        width: 16rem; /* 256px */
        top: 4rem; /* 64px - height of the navbar */
        bottom: 0;
        z-index: 30;
        transition: all 0.3s ease;
    }

    /* Navigation items styling */
    .nav-item {
        display: flex;
        align-items: center;
        padding: 0.75rem 1rem;
        margin: 0.25rem 0;
        border-radius: 0.375rem;
        font-size: 0.875rem;
        font-weight: 500;
        color: #4b5563; /* text-gray-700 */
        transition: all 0.2s ease;
    }

    .nav-item:hover {
        background-color: #EEF2FF; /* bg-indigo-50 */
        color: #1020AD; /* text-indigo-600 */
    }

    .nav-item.active {
        background-color: #EEF2FF; /* bg-indigo-50 */
        color: #1020AD; /* text-indigo-700 */
        font-weight: 600;
        box-shadow: 0 1px 2px #1020ad46;
    }

    .nav-icon {
        height: 1.25rem;
        width: 1.25rem;
        margin-right: 0.75rem;
        flex-shrink: 0;
    }

    .mobile-nav-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 0.75rem;
        transition: color 0.2s ease;
    }
    
    /* Mobile specific styling */
    @media (max-width: 768px) {
        .navigation-container nav.hidden {
            display: flex;
        }
        
        .sidenav {
            position: fixed;
            height: calc(100vh - 64px);
            left: -16rem; /* Start off-screen */
            opacity: 0;
            box-shadow: 4px 0 8px rgba(0, 0, 0, 0.05);
        }
        
        .sidenav.open {
            left: 0;
            opacity: 1;
        }
    }
</style>
