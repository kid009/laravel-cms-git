<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate('required')]
    public string $email = '';

    #[Validate('required')]
    public string $password = '';

    public function authenticate()
    {
        $this->validate();

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
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

        return redirect()->intended(route('dashboard'));
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
