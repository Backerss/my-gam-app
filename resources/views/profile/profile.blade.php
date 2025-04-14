@extends('layouts.app')

@section('content')
<style>
    .profile-container {
        background-color: #f5f5f9;
        padding: 16px;
        max-width: 100%;
        margin: 0 auto;
    }
    .profile-header {
        background-color: #5e4adb;
        border-radius: 0.75rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 1.25rem;
    }
    .profile-header-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .profile-left {
        display: flex;
        align-items: center;
    }
    .profile-avatar {
        position: relative;
        width: 5rem;
        height: 5rem;
        border-radius: 10px;
        background-color: rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        font-weight: bold;
        flex-shrink: 0;
    }
    .profile-avatar img {
        width: 100%;
        height: 100%;
        border-radius: 10px;
        object-fit: cover;
    }
    .online-indicator {
        position: absolute;
        bottom: -0.5rem;
        right: -0.5rem;
        width: 1.5rem;
        height: 1.5rem;
        background-color: #10b981;
        border-radius: 50%;
        border: 2px solid white;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .profile-info {
        color: white;
        margin-left: 1rem;
    }
    .profile-name {
        font-weight: bold;
        font-size: 1.25rem;
        margin-bottom: 0.25rem;
    }
    .profile-email, .profile-role {
        font-size: 0.875rem;
        color: rgba(255, 255, 255, 0.8);
    }
    .action-buttons {
        display: flex;
        gap: 0.5rem;
    }
    .action-button {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        background-color: rgba(255, 255, 255, 0.2);
        color: white;
        border-radius: 0.5rem;
        transition: background-color 0.2s;
        cursor: pointer;
        border: none;
        white-space: nowrap;
    }
    .action-button:hover {
        background-color: rgba(255, 255, 255, 0.3);
    }
    .detail-card {
        background-color: white;
        border-radius: 0.75rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        padding: 1.5rem;
        margin: 1rem 0;
    }
    .detail-card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }
    .card-title {
        color: #6b7280;
        font-size: 0.875rem;
        font-weight: 500;
    }
    .update-time {
        color: #9ca3af;
        font-size: 0.75rem;
    }
    .detail-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }
    .detail-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    .icon-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 2rem;
        height: 2rem;
        border-radius: 0.5rem;
        background-color: #eef2ff;
        flex-shrink: 0;
    }
    .detail-label {
        color: #6b7280;
        font-size: 0.75rem;
    }
    .detail-value {
        font-weight: 500;
        font-size: 0.875rem;
        color: #111827;
    }
    .status-cards {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
        margin: 1rem 0;
    }
    .status-card {
        background-color: white;
        border-radius: 0.5rem;
        padding: 1rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
    }
    .status-green {
        border-left: 4px solid #10b981;
    }
    .status-blue {
        border-left: 4px solid #3b82f6;
    }
    .status-purple {
        border-left: 4px solid #8b5cf6;
    }
    .status-icon {
        width: 2rem;
        height: 2rem;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .status-green-icon {
        background-color: #d1fae5;
    }
    .status-icon svg {
        width: 1rem;
        height: 1rem;
    }
    .status-green-icon svg {
        color: #10b981;
    }
    .status-blue-icon {
        background-color: #dbeafe;
    }
    .status-blue-icon svg {
        color: #3b82f6;
    }
    .status-purple-icon {
        background-color: #ede9fe;
    }
    .status-purple-icon svg {
        color: #8b5cf6;
    }
    .status-info {
        margin-left: 0.75rem;
    }
    .status-label {
        font-size: 0.75rem;
        color: #6b7280;
    }
    .status-value {
        font-size: 0.875rem;
        font-weight: 500;
    }
    .content-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 1rem;
        margin: 1rem 0;
    }
    .permission-list {
        display: grid;
        grid-template-columns: 1fr;
        gap: 0.5rem;
    }
    .permission-item {
        display: flex;
        align-items: center;
    }
    .permission-active {
        background-color: #d1fae5;
        padding: 0.25rem;
        border-radius: 50%;
    }
    .permission-active svg {
        width: 0.75rem;
        height: 0.75rem;
        color: #10b981;
    }
    .permission-inactive {
        background-color: #f3f4f6;
        padding: 0.25rem;
        border-radius: 50%;
    }
    .permission-inactive svg {
        width: 0.75rem;
        height: 0.75rem;
        color: #9ca3af;
    }
    .permission-text {
        margin-left: 0.5rem;
        font-size: 0.75rem;
        color: #374151;
    }
    .permission-text-inactive {
        color: #9ca3af;
    }
    .quick-actions {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0.75rem;
    }
    .quick-action {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 0.75rem;
        background-color: #f9fafb;
        border-radius: 0.5rem;
        cursor: pointer;
        transition: background-color 0.2s;
    }
    .quick-action:hover {
        background-color: #f3f4f6;
    }
    .quick-action svg {
        width: 1.25rem;
        height: 1.25rem;
        color: #6b7280;
        margin-bottom: 0.25rem;
    }
    .quick-action-text {
        font-size: 0.75rem;
        color: #6b7280;
        text-align: center;
    }

    /* Custom toggle switch styling */
    .toggle-label {
        transition: background-color 0.2s ease;
    }
    .toggle-checkbox:checked {
        right: 0;
        border-color: #fff;
    }
    .toggle-checkbox:checked + .toggle-label {
        background-color: #4f46e5;
    }
    .toggle-checkbox:focus + .toggle-label {
        box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.2);
    }

    /* Tab button styling */
    .tab-btn.active {
        border-bottom-width: 2px;
        border-color: #4f46e5;
        color: #4f46e5;
    }
    
    /* Responsive styles for mobile devices */
    @media (max-width: 640px) {
        .profile-container {
            padding: 12px;
        }
        .profile-header {
            padding: 1rem;
        }
        .profile-header-content {
            flex-direction: column;
            align-items: flex-start;
        }
        .action-buttons {
            margin-top: 1rem;
            align-self: stretch;
            width: 100%;
        }
        .action-button {
            flex: 1;
            justify-content: center;
        }
        .detail-grid {
            grid-template-columns: 1fr;
        }
        .status-cards {
            grid-template-columns: 1fr;
        }
        .content-grid {
            grid-template-columns: 1fr;
        }
        .detail-card {
            padding: 1.25rem;
        }
    }
    
    @media (min-width: 641px) and (max-width: 768px) {
        .status-cards {
            grid-template-columns: repeat(2, 1fr);
        }
        .content-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="profile-container">
    <!-- Profile Header -->
    <div class="profile-header">
        <div class="profile-header-content">
            <div class="profile-left">
                <div class="profile-avatar">
                    <div class="rounded-xl bg-indigo-300/30 h-20 w-20 flex items-center justify-center text-white border-2 border-indigo-400/30">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 24 24" fill="none">
                            <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" stroke="white" stroke-width="1.5"/>
                            <path d="M3 22C3 17.0294 7.02944 13 12 13C16.9706 13 21 17.0294 21 22" stroke="white" stroke-width="1.5"/>
                        </svg>
                    </div>
                    <div class="online-indicator">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>
                <div class="profile-info">
                    <h1 class="profile-name">{{ $user['name'] }}</h1>
                    <div class="profile-email">{{ $user['email'] }}</div>
                    <div class="profile-role">
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
                    </div>
                </div>
            </div>
            
            <div class="action-buttons">
                <button onclick="openEditProfileModal()" class="action-button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                    </svg>
                    แก้ไขข้อมูล
                </button>
                <button class="action-button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    ตั้งค่า
                </button>
            </div>
        </div>
    </div>

    <!-- Personal Information -->
    <div class="row">
        <div class="col-lg-7">
            <div class="detail-card">
                <div class="detail-card-header">
                    <h2 class="card-title">ข้อมูลส่วนตัว</h2>
                    <div class="update-time">อัพเดทเมื่อ: 3 seconds ago</div>
                </div>
        
                <div class="detail-grid">
                    <div class="detail-item">
                        <div class="icon-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div>
                            <div class="detail-label">ชื่อ-นามสกุล</div>
                            <div class="detail-value">{{ $user['name'] }}</div>
                        </div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="icon-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <div class="detail-label">อีเมล</div>
                            <div class="detail-value">{{ $user['email'] }}</div>
                        </div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="icon-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <div>
                            <div class="detail-label">เบอร์โทรศัพท์</div>
                            <div class="detail-value">{{ $user['phone'] ?? '0812345678' }}</div>
                        </div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="icon-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <div class="detail-label">วันที่เข้าร่วม</div>
                            <div class="detail-value">03/04/2025</div>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Status Cards -->
            <div class="status-cards">
                <div class="status-card status-green">
                    <div class="status-icon status-green-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div class="status-info">
                        <div class="status-label">สถานะ</div>
                        <div class="status-value">กำลังใช้งาน</div>
                    </div>
                </div>
                
                <div class="status-card status-blue">
                    <div class="status-icon status-blue-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="status-info">
                        <div class="status-label">เข้าระบบล่าสุด</div>
                        <div class="status-value">2 ชั่วโมงที่แล้ว</div>
                    </div>
                </div>
                
                <div class="status-card status-purple">
                    <div class="status-icon status-purple-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <div class="status-info">
                        <div class="status-label">บันทึกล่าสุด</div>
                        <div class="status-value">12 รายการ</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="detail-card">
                <div class="detail-card-header">
                    <h2 class="card-title">บทบาทและสิทธิ์</h2>
                </div>
                
                <!-- Committee Type -->
                <div class="detail-item mb-4">
                    <div class="icon-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <div class="detail-label">ประเภทคณะกรรมการ</div>
                        <div class="detail-value">
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
                        </div>
                    </div>
                </div>
                
                <!-- Position -->
                <div class="detail-item mb-4">
                    <div class="icon-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <div class="detail-label">ตำแหน่ง</div>
                        <div class="detail-value">ผู้อำนวยการ</div>
                    </div>
                </div>
                
                <!-- Permissions -->
                <h3 class="detail-label mb-2">สิทธิการใช้งาน</h3>
                
                <div class="permission-list">
                    <div class="permission-item">
                        <div class="permission-active">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span class="permission-text">ดูข้อมูลนักเรียน</span>
                    </div>
                    <div class="permission-item">
                        <div class="permission-active">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span class="permission-text">แก้ไขคะแนนพฤติกรรม</span>
                    </div>
                    <div class="permission-item">
                        <div class="permission-active">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span class="permission-text">ออกรายงาน</span>
                    </div>
                    <div class="permission-item">
                        <div class="permission-inactive">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                        <span class="permission-text permission-text-inactive">จัดการผู้ใช้</span>
                    </div>
                </div>
            </div>
            
            <div class="detail-card">
                <h2 class="card-title mb-4">การดำเนินการด่วน</h2>
                
                <div class="quick-actions">
                    <div class="quick-action" onclick="openEditProfileModal()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                        </svg>
                        <span class="quick-action-text">เปลี่ยนรหัสผ่าน</span>
                    </div>
                    <div class="quick-action">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <span class="quick-action-text">ออกรายงาน</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Edit Profile Modal - Modern Version -->
<!-- Modal -->


<style>
    /* Improved modal animation */
    #editProfileModal {
        backdrop-filter: blur(4px);
    }
    
    #modalContent {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
</style>

<!-- Edit Profile Modal - Bootstrap Version -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gradient-to-r from-indigo-600 to-indigo-800 text-white">
                <h5 class="modal-title" id="editProfileModalLabel">แก้ไขข้อมูลส่วนตัว</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Tab Navigation -->
                <ul class="nav nav-tabs mb-4" id="profileTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="profile-tab-btn" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="true">ข้อมูลส่วนตัว</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="security-tab-btn" data-bs-toggle="tab" data-bs-target="#security-tab-pane" type="button" role="tab" aria-controls="security-tab-pane" aria-selected="false">ความปลอดภัย</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="preferences-tab-btn" data-bs-toggle="tab" data-bs-target="#preferences-tab-pane" type="button" role="tab" aria-controls="preferences-tab-pane" aria-selected="false">การตั้งค่า</button>
                    </li>
                </ul>
                
                <!-- Tab Content -->
                <div class="tab-content" id="profileTabContent">
                    <!-- Profile Tab -->
                    <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab-btn" tabindex="0">
                        <form id="profileForm" action="/profile/update" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-3">
                                <label for="name" class="form-label">ชื่อ-นามสกุล</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-person"></i>
                                    </span>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $user['name'] }}" required>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">อีเมล</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $user['email'] }}" required>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="phone" class="form-label">เบอร์โทรศัพท์</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-telephone"></i>
                                    </span>
                                    <input type="tel" class="form-control" id="phone" name="phone" value="{{ $user['phone'] ?? '0812345678' }}">
                                </div>
                            </div>
                            
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="status" name="status" checked>
                                <label class="form-check-label" for="status">สถานะการใช้งาน</label>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Security Tab -->
                    <div class="tab-pane fade" id="security-tab-pane" role="tabpanel" aria-labelledby="security-tab-btn" tabindex="0">
                        <form id="passwordForm" action="/profile/update-password" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-3">
                                <label for="current_password" class="form-label">รหัสผ่านปัจจุบัน</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-shield-lock"></i>
                                    </span>
                                    <input type="password" class="form-control" id="current_password" name="current_password">
                                    <button class="btn btn-outline-secondary toggle-password" type="button">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="password" class="form-label">รหัสผ่านใหม่</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-key"></i>
                                    </span>
                                    <input type="password" class="form-control" id="password" name="password">
                                    <button class="btn btn-outline-secondary toggle-password" type="button">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                                <div class="mt-2">
                                    <div class="progress" style="height: 5px;">
                                        <div id="password-strength-bar" class="progress-bar bg-secondary" role="progressbar" style="width: 0%"></div>
                                    </div>
                                    <small id="password-strength-text" class="form-text text-muted">ความปลอดภัยของรหัสผ่าน</small>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">ยืนยันรหัสผ่านใหม่</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-check-circle"></i>
                                    </span>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                    <button class="btn btn-outline-secondary toggle-password" type="button">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                                <small class="form-text text-muted password-match-text">พิมพ์รหัสผ่านใหม่อีกครั้งเพื่อยืนยัน</small>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Preferences Tab -->
                    <div class="tab-pane fade" id="preferences-tab-pane" role="tabpanel" aria-labelledby="preferences-tab-btn" tabindex="0">
                        <form id="preferencesForm" action="/profile/update-preferences" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-3">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="email_notification" name="email_notification" checked>
                                    <label class="form-check-label" for="email_notification">รับการแจ้งเตือนทางอีเมล</label>
                                </div>
                                
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="sms_notification" name="sms_notification">
                                    <label class="form-check-label" for="sms_notification">รับการแจ้งเตือนทาง SMS</label>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="theme" class="form-label">ธีม</label>
                                <select class="form-select" id="theme" name="theme">
                                    <option value="light">สว่าง</option>
                                    <option value="dark">มืด</option>
                                    <option value="system">ตามระบบ</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="language" class="form-label">ภาษา</label>
                                <select class="form-select" id="language" name="language">
                                    <option value="th">ไทย</option>
                                    <option value="en">English</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn btn-outline-secondary" onclick="resetForm()">รีเซ็ต</button>
                <button type="button" class="btn btn-primary" onclick="submitForm()">บันทึกการเปลี่ยนแปลง</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
// Modal functions
function openEditProfileModal() {
    const modal = new bootstrap.Modal(document.getElementById('editProfileModal'));
    modal.show();
}

function closeEditProfileModal() {
    const modalEl = document.getElementById('editProfileModal');
    const modal = bootstrap.Modal.getInstance(modalEl);
    if (modal) {
        modal.hide();
    }
}

// Submit form based on active tab
function submitForm() {
    const activeTab = document.querySelector('.tab-pane.active');
    const formId = activeTab.querySelector('form').id;
    document.getElementById(formId).submit();
}

// Reset form fields to initial values
function resetForm() {
    if (confirm('คุณต้องการรีเซ็ตข้อมูลที่แก้ไขหรือไม่?')) {
        const activeTab = document.querySelector('.tab-pane.active');
        const form = activeTab.querySelector('form');
        form.reset();
        
        // If on security tab, also reset password strength meter
        if (activeTab.id === 'security-tab-pane') {
            const strengthBar = document.getElementById('password-strength-bar');
            const strengthText = document.getElementById('password-strength-text');
            if (strengthBar && strengthText) {
                strengthBar.style.width = '0%';
                strengthBar.className = 'progress-bar bg-secondary';
                strengthText.textContent = 'ความปลอดภัยของรหัสผ่าน';
            }
            
            // Reset password match text
            const matchText = document.querySelector('.password-match-text');
            if (matchText) {
                matchText.textContent = 'พิมพ์รหัสผ่านใหม่อีกครั้งเพื่อยืนยัน';
                matchText.className = 'form-text text-muted password-match-text';
            }
            
            // Reset password confirmation border
            const confirmInput = document.getElementById('password_confirmation');
            if (confirmInput) {
                confirmInput.classList.remove('border-danger', 'border-success');
            }
        }
    }
}

// Password visibility toggle
document.addEventListener('DOMContentLoaded', function() {
    const toggleButtons = document.querySelectorAll('.toggle-password');
    toggleButtons.forEach(button => {
        button.addEventListener('click', () => {
            const input = button.closest('.input-group').querySelector('input');
            const icon = button.querySelector('i');
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        });
    });
    
    // Password strength meter
    const passwordInput = document.getElementById('password');
    const confirmInput = document.getElementById('password_confirmation');
    const strengthBar = document.getElementById('password-strength-bar');
    const strengthText = document.getElementById('password-strength-text');
    const matchText = document.querySelector('.password-match-text');
    
    if (passwordInput) {
        passwordInput.addEventListener('input', () => {
            const password = passwordInput.value;
            let strength = 0;
            let message = '';
            
            // Calculate password strength
            if (password.length > 0) {
                // Length check
                if (password.length >= 8) strength += 25;
                
                // Character type checks
                if (/[A-Z]/.test(password)) strength += 25; // Uppercase
                if (/[a-z]/.test(password)) strength += 25; // Lowercase
                if (/[0-9]/.test(password)) strength += 25; // Numbers
                if (/[^A-Za-z0-9]/.test(password)) strength += 25; // Special chars
                
                // Cap at 100%
                strength = Math.min(strength, 100);
                
                // Set message and color based on strength
                if (strength < 25) {
                    message = 'รหัสผ่านอ่อนแอมาก';
                    strengthBar.className = 'progress-bar bg-danger';
                } else if (strength < 50) {
                    message = 'รหัสผ่านอ่อนแอ';
                    strengthBar.className = 'progress-bar bg-warning';
                } else if (strength < 75) {
                    message = 'รหัสผ่านปานกลาง';
                    strengthBar.className = 'progress-bar bg-info';
                } else {
                    message = 'รหัสผ่านแข็งแรง';
                    strengthBar.className = 'progress-bar bg-success';
                }
            } else {
                message = 'ความปลอดภัยของรหัสผ่าน';
                strengthBar.className = 'progress-bar bg-secondary';
            }
            
            // Update UI
            strengthBar.style.width = `${strength}%`;
            strengthText.textContent = message;
            
            // Check password match
            checkPasswordMatch();
        });
    }
    
    if (confirmInput) {
        confirmInput.addEventListener('input', checkPasswordMatch);
    }
    
    function checkPasswordMatch() {
        if (passwordInput.value && confirmInput.value) {
            if (passwordInput.value === confirmInput.value) {
                matchText.textContent = 'รหัสผ่านตรงกัน';
                matchText.className = 'form-text text-success password-match-text';
                confirmInput.classList.add('border-success');
                confirmInput.classList.remove('border-danger');
            } else {
                matchText.textContent = 'รหัสผ่านไม่ตรงกัน';
                matchText.className = 'form-text text-danger password-match-text';
                confirmInput.classList.add('border-danger');
                confirmInput.classList.remove('border-success');
            }
        } else {
            matchText.textContent = 'พิมพ์รหัสผ่านใหม่อีกครั้งเพื่อยืนยัน';
            matchText.className = 'form-text text-muted password-match-text';
            confirmInput.classList.remove('border-danger', 'border-success');
        }
    }
});
</script>
@endsection