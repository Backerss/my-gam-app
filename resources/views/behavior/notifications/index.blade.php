<!-- filepath: c:\Code\web\app\my-laravel-app\resources\views\behavior\notifications\index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">การแจ้งเตือนทั้งหมด</h1>
        <button id="mark-all-read-btn" type="button" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition-colors text-sm">
            ทำเครื่องหมายว่าอ่านแล้วทั้งหมด
        </button>
    </div>

    <div class="space-y-4">
        @forelse ($notifications as $notification)
            <div class="border-l-4 {{ $notification['read'] ? 'border-gray-200' : 'border-indigo-500' }} bg-white rounded-md shadow-sm hover:shadow transition">
                <div class="px-6 py-4">
                    <div class="flex">
                        <div class="flex-shrink-0 mr-4">
                            <div class="h-10 w-10 rounded-full 
                                @if($notification['type'] == 'warning') bg-yellow-100 text-yellow-600
                                @elseif($notification['type'] == 'success') bg-green-100 text-green-600
                                @elseif($notification['type'] == 'danger') bg-red-100 text-red-600
                                @else bg-blue-100 text-blue-600 @endif
                                flex items-center justify-center">
                                @if($notification['icon'] == 'warning')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                @elseif($notification['icon'] == 'check')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                @elseif($notification['icon'] == 'alert')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                @endif
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium {{ $notification['read'] ? 'text-gray-700' : 'text-gray-900' }}">
                                {{ $notification['title'] }}
                            </h3>
                            <p class="text-sm text-gray-600 mt-1">{{ $notification['message'] }}</p>
                            <p class="text-xs text-gray-500 mt-2">{{ $notification['time'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
                <p class="mt-2 text-gray-500">ไม่มีการแจ้งเตือน</p>
            </div>
        @endforelse
    </div>
</div>
@endsection

@section('scripts')
<script>
    // ทำเครื่องหมายว่าอ่านแล้วทั้งหมด
    document.getElementById('mark-all-read-btn').addEventListener('click', function() {
        fetch('{{ route("behavior.notifications.mark-read") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            // รีเฟรชหน้าเพื่ออัพเดทสถานะ
            window.location.reload();
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
</script>
@endsection