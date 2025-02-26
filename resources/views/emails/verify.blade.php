<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Xác thực email</title>

</head>
<body>
    <div class="container-fluid">
    <h2>Xin chào {{ $username }},</h2>
    <p>Vui lòng nhấn vào link dưới đây để xác thực email và hoàn tất đăng ký:</p>
    <p>
        <a class="btn" href="{{ url('/register/verify?email=' . urlencode($email) . '&code=' . urlencode($code) . '&phone_number=' . urlencode($phone_number) . '&password=' . urlencode($password) . '&username=' . urlencode($username)) }}">
            Xác thực Email
        </a>
    </p>
    <p>Nếu bạn không yêu cầu đăng ký tài khoản, hãy bỏ qua email này.</p>
    </div>
</body>
</html>