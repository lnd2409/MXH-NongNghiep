<!DOCTYPE html>
<html>

<head>
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="{{asset('client/login-nccvt/style.css')}}">
</head>

<body>
    <div class="container">
        <div class="login">
            <div class="header">
                <h1>Đăng nhập</h1>
            </div>
            <div class="main">
                <form action="{{route('login-submit-nccvt')}}" method="post">
                    @csrf
                    <input type="text" placeholder="Tên đăng nhập" name="username" required>
                    <br>
                    <input type="password" placeholder="Mật khẩu" name="password" required>
                    <br>
                    <a href="{{route('register-nccvt')}}">Đăng ký</a>
                    <br>
                    <button type="submit">Đăng nhập</button>
                </form>
            </div>
        </div>
        <div class="img">
            <span>
                <h1>Xin chào</h1>
                <p>Nhà cung cấp vật tư nông nghiệp<br></p>
            </span>
        </div>
    </div>
</body>

</html>