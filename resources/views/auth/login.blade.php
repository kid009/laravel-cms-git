{{-- resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Secure CMS Login">
    <title>เข้าสู่ระบบ | CMS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
            font-family: "Prompt", sans-serif;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        /* ซ่อน Alpine element ก่อนโหลดเสร็จ */
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="text-center">

    <main class="form-signin">
        {{--
        Alpine x-data: loading state สำหรับป้องกัน Double Submit
    --}}
        <form method="POST" action="{{ route('login') }}" x-data="{ loading: false }" x-on:submit="loading = true">
            @csrf

            {{-- โลโก้ระบบ (เปลี่ยน path เป็นของคุณเอง) --}}
            <h1 class="h3 mb-3 fw-normal">Knowledge Management</h1>

            {{-- หากมี Error ระดับ Global (เช่น รหัสผิด) ให้แสดงตรงนี้ --}}
            @if ($errors->any())
                <div class="alert alert-danger text-start fs-6 p-2 mb-3" role="alert">
                    ข้อมูลการเข้าสู่ระบบไม่ถูกต้อง
                </div>
            @endif

            <div class="form-floating">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput"
                    name="email" value="{{ old('email') }}" placeholder="name@example.com" required autofocus
                    autocomplete="email">
                <label for="floatingInput">อีเมล (Email address)</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                    id="floatingPassword" name="password" placeholder="Password" required
                    autocomplete="current-password">
                <label for="floatingPassword">รหัสผ่าน (Password)</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit" x-bind:disabled="loading">
                <span x-show="!loading">เข้าสู่ระบบ</span>
                <span x-show="loading" x-cloak>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    กำลังตรวจสอบ...
                </span>
            </button>
        </form>
    </main>

</body>

</html>
