<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();
        if ($user->users_role !== $role) {
            // ถ้าเป็นนักเรียนหรือผู้ปกครอง ให้ redirect ไปหน้าของตัวเอง
            if ($user->users_role === 'student') {
                $student = $user->student;
                if ($student) {
                    return redirect()->route('behavior.students.show', ['id' => $student->students_id]);
                }
            } elseif ($user->users_role === 'parent') {
                $parent = $user->parent;
                if ($parent && $parent->student) {
                    return redirect()->route('behavior.students.show', ['id' => $parent->student->students_id]);
                }
            }
            
            // ถ้าไม่ใช่ ให้กลับไป dashboard
            return redirect('dashboard')->with('error', 'คุณไม่มีสิทธิ์เข้าถึงหน้านี้');
        }

        return $next($request);
    }
}