<!DOCTYPE html>
<html>

<head>
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="{{asset('client/login-nccvt/style.css')}}">
</head>

<body>
    <div class="container">
        <div class="login">
            <div class="main">
                <form action="{{route('register-submit-nccvt')}}" method="post">
                    @csrf
                    <input type="text" placeholder="Tên nhà cung cấp" name="name" required>
                    <br>
                    <input type="text" placeholder="Tên đăng nhập" name="username" required>
                    <br>
                    <input type="password" placeholder="Mật khẩu" name="password" required>
                    <br>
                    <input type="text" placeholder="Địa chỉ" name="address" required>
                    <br>
                    <input type="text" placeholder="Số điện thoại" name="tel" required>
                    <a href="{{route('login-nccvt')}}">Đăng nhập</a>
                    <button type="submit" style="    margin-top: 0;">Đăng ký</button>
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