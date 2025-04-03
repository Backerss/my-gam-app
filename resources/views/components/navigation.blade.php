<div class="navigation-container">
    <!-- Desktop Sidebar -->
    <aside id="sidebar" class="bg-white border-r border-gray-200 shadow-sm sidenav hidden md:flex md:flex-col fixed h-full">
        <div class="flex flex-col h-full w-64">
            
            <!-- Navigation Content -->
            <div class="overflow-y-auto flex-1 py-4">
                <nav class="px-2 space-y-1">
                    <!-- Dashboard Link -->
                    <a href="{{ route('behavior.dashboard') }}" class="nav-item {{ request()->routeIs('behavior.dashboard') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span>แดชบอร์ด</span>
                    </a>
                    
                    <!-- Behavior Deduction Link -->
                    <a href="/behavior/deduct" class="nav-item {{ request()->is('behavior/deduct*') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>หักคะแนนพฤติกรรม</span>
                    </a>
                    
                    <!-- Student Management Link -->
                    <a href="{{ route('behavior.students') }}" class="nav-item {{ request()->is('behavior/students*') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span>จัดการนักเรียน</span>
                    </a>
                    
                    <!-- Reports Link -->
                    <a href="{{ route('behavior.reports') }}" class="nav-item {{ request()->is('reports/behavior*') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        <span>รายงาน</span>
                    </a>
                    
                    <!-- Settings Link -->
                    <a href="{{ route('behavior.settings') }}" class="nav-item {{ request()->is('behavior/settings*') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>ตั้งค่า</span>
                    </a>
                </nav>
            </div>
            
            <!-- Footer Info -->
            <div class="border-t border-gray-200 p-4 bg-gray-50">
                <div class="flex items-center text-xs text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>เวอร์ชัน 1.0.0</span>
                </div>
            </div>
        </div>
    </aside>
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
        color: #4F46E5; /* text-indigo-600 */
    }

    .nav-item.active {
        background-color: #EEF2FF; /* bg-indigo-50 */
        color: #4338CA; /* text-indigo-700 */
        font-weight: 600;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
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
