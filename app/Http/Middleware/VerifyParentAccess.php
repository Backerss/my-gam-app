<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class VerifyParentAccess
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->query('token');
        $studentId = $request->route('studentId');
        
        $cacheKey = "parent_access_{$token}";
        $cachedStudentId = Cache::get($cacheKey);

        if (!$token || !$cachedStudentId || $cachedStudentId != $studentId) {
            return redirect()->route('parent.access')
                           ->withErrors(['access' => 'กรุณายืนยันตัวตนใหม่อีกครั้ง']);
        }

        return $next($request);
    }
}