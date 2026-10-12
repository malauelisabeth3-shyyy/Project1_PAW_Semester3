<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Kasir Minimarket</title>
    <style>
        body { font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #222; background: #f4f5f7; margin: 0; min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .box { background: #fff; border: 1px solid #d9dce1; border-radius: 4px; padding: 28px; width: 100%; max-width: 340px; }
        h2 { margin: 0 0 4px; text-align: center; }
        .sub { margin: 0 0 20px; text-align: center; color: #6b7280; }
        label { font-weight: bold; }
        input[type=email], input[type=password] { width: 100%; box-sizing: border-box; padding: 8px; margin-top: 4px; border: 1px solid #c4c8cf; border-radius: 3px; font-size: 14px; }
        p { margin: 0 0 14px; }
        .err { color: #a12020; font-size: 13px; }
        button { width: 100%; background: #2563eb; color: #fff; border: 0; padding: 9px; border-radius: 3px; font-size: 14px; cursor: pointer; }
        button:hover { background: #1d4ed8; }
    </style>
</head>
<body>

<div class="box">
    <h2>KASIR MINIMARKET</h2>
    <p class="sub">Silakan login untuk melanjutkan</p>

    <form method="POST" action="{{ route('login.process') }}">
        @csrf

        <p>
            <label>Email</label><br>
            <input type="email" name="email" value="{{ old('email') }}" autofocus required>
            @error('email')
                <span class="err">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label>Password</label><br>
            <input type="password" name="password" required>
        </p>

        <p>
            <label style="font-weight:normal"><input type="checkbox" name="remember"> Ingat saya</label>
        </p>

        <button type="submit">Masuk</button>
    </form>
</div>

</body>
</html>
