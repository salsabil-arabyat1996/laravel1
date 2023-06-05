<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout(); // تسجيل الخروج من الحساب الحالي
        $request->session()->invalidate(); // إلغاء السيشن الحالية
        $request->session()->regenerateToken(); // إعادة توليد رمز الحماية

        return redirect('home');
    }
}
