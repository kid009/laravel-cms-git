<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\AuthenticateUserAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request, AuthenticateUserAction $action): RedirectResponse
    {
        // 1. รับ Validate Data
        $data = $request->validated();

        // 2. ส่งให้ Action ทำงาน
        $action->execute(
            $data['email'],
            $data['password'],
        );

        // 3. Response กลับ
        // intended() จะพากลับไปยังหน้าที่ผู้ใช้พยายามเข้าถึงก่อนโดนดีดมาหน้า Login
        return redirect()->intended(route('dashboard'));
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken(); // ป้องกัน CSRF

        return redirect()->route('show-login-form');
    }
}
