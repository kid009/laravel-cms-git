<?php

// app/Actions/Auth/AuthenticateUserAction.php
namespace App\Actions\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticateUserAction
{
    /**
     * @throws ValidationException
     */
    public function execute(string $email, string $password): void
    {
        $credentials = [
            'email' => $email,
            'password' => $password,
        ];

        // ใช้ Auth::attempt เพื่อตรวจสอบสิทธิ์พร้อมสร้าง Session
        if (! Auth::attempt($credentials)) {
            // Throw Exception เพื่อให้ Laravel จัดการ Return กลับไปพร้อม Error
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        // ป้องกัน Session Fixation Attack (สำคัญมากใน Production)
        session()->regenerate();
    }
}
