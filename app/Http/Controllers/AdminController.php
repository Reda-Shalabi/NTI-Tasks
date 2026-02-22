<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * تحديث دور المستخدم (admin/user)
     */
    public function updateUserRole(Request $request, User $user)
    {
        // تحقق إذا كان المستخدم الحالي admin
        $currentUser = Auth::user();
        if (!$currentUser || $currentUser->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        // منع تغيير دور النفس
        if ($currentUser->id === $user->id) {
            return back()->with('error', 'You cannot change your own role!');
        }

        // التحقق من أن الدور صحيح
        $role = $request->input('role');
        if (!in_array($role, ['user', 'admin'])) {
            return back()->with('error', 'Invalid role!');
        }

        // تحديث الدور
        $user->update(['role' => $role]);

        $roleText = ($role === 'admin') ? 'Admin' : 'User';
        $message = "{$user->name} role changed to {$roleText}";
        return back()->with('success', $message);
    }
}
