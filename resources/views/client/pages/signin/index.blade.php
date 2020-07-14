<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Đăng nhập |</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon"  type="image/png"  href="{{asset('hinhanh/ii.png')}}" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <link rel="stylesheet" type="text/css" href="{{asset('client/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/css/line-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/css/line-awesome-font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/lib/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/lib/slick/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/css/responsive.css')}}">
</head>


<body class="sign-in">


    <div class="wrapper">


        <div class="sign-in-page">
            <div class="signin-popup">
                <div class="signin-pop">
                    <div class="row">
                        <div class="col-lg-6 login_bg">
                            <div class="cmp-info ">
                                <div class="cm-logo">
                                    <img src="{{asset('client/images/cm-logo.png')}}" alt="">
                                    {{-- <h3>Mạng Xã Hội Nông Nghiệp</h3> --}}
                                </div>
                                <!--cm-logo end-->
                                <img src="{{asset('client/images/cm-main-img.png')}}" alt="">
                            </div>
                            <!--cmp-info end-->
                        </div>
                        <div class="col-lg-6">
                            <div class="login-sec">
                                @if (Session::has('msg'))
                                    <div class="alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>{{Session::get('msg')}}</strong>
                                    </div>
                                    {{Session::put('msg',null)}}
                                @endif
                                <ul class="sign-control">
                                    <li data-tab="tab-1" class="current"><a href="#" title="">Đăng nhập</a></li>
                                    <li data-tab="tab-2"><a href="#" title="">Đăng ký</a></li>
                                </ul>
                                <div class="sign_in_sec current" id="tab-1">
                                    <div class="signup-tab">
                                        <i class="fa fa-long-arrow-left"></i>
                                        <h2>Chọn nhóm người dùng</h2>
                                        <ul>
                                            <li data-tab="tab-3" class="current"><a href="#" title="">Nông dân</a></li>
                                            <li data-tab="tab-4"><a href="#" title="">Thương lái</a></li>
                                        </ul>
                                    </div>
                                    <!--Phần này của nông dân-->
                                    <div class="dff-tab current" id="tab-3">
                                        {{-- xử lý nông dân nè --}}
                                        <form action="{{ route('login-nong-dan') }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="username" placeholder="Tên đăng nhập">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="password" name="password" placeholder="Mật khẩu">
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <button type="submit" value="submit" >Đăng nhập</button>
                                                    <br>
                                                    <br>
                                                    <a href="{{ route('login-chuyen-gia') }}" class="text-center">Đăng nhập với chuyên gia</a>
                                                    <br>
                                                    <a href="{{ route('login-nccvt') }}" class="text-center">Đăng nhập với nhà cung cấp vật tư</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Phần này của thương lái-->
                                    <div class="dff-tab" id="tab-4">
                                        {{-- xử lý đăng nhập thương lái --}}
                                        <form method="post" action="{{ route('login-thuong-lai') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="username" placeholder="Tên đăng nhập">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="password" name="password" placeholder="Mật khẩu">
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <button type="submit" value="submit">Đăng nhập</button>
                                                    <br>
                                                    <br>
                                                    <a href="{{ route('login-chuyen-gia') }}">Đăng nhập với chuyên gia</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--dff-tab end-->
                                </div>
                                <!--sign_in_sec end-->
                                <div class="sign_in_sec" id="tab-2">
                                    <div class="signup-tab">
                                        <i class="fa fa-long-arrow-left"></i>
                                        <h2>Chọn nhóm người dùng</h2>
                                        <ul>
                                            <li data-tab="tab-5" class="current"><a href="#" title="">Nông dân</a></li>
                                            <li data-tab="tab-6"><a href="#" title="">Thương lái</a></li>
                                        </ul>
                                    </div>
                                    <!--Phần này của nông dân-->
                                    <div class="dff-tab current" id="tab-5">
                                        {{-- FORM NÀY DÀNH CHO ĐĂNG KÝ NÔNG DÂN --}}
                                        <form method="post" action="{{ route('register-nong-dan') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="username" placeholder="Tên đăng nhập">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="password" name="password" placeholder="Mật khẩu">
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="password" name="repeat-password"
                                                            placeholder="Nhập lại mật khẩu">
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="nd_hoten" placeholder="Họ tên">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="nd_sdt" placeholder="Số điện thoại">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="nd_diachi" placeholder="Địa chỉ">
                                                        <i class="la la-globe"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <button type="submit" value="submit">Đăng ký</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Phần này của thương lái-->
                                    <div class="dff-tab" id="tab-6">
                                        {{-- FORM NÀY DÀNH CHO ĐĂNG KÝ THƯƠNG LÁI --}}
                                        <form action="{{ route('register-thuong-lai') }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="username" placeholder="Tên đăng nhập">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="password" name="password" placeholder="Mật khẩu">
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="password" name="repeat-password"
                                                            placeholder="Nhập lại mật khẩu">
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="tl_hoten" placeholder="Họ tên">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="tl_sdt" placeholder="Số điện thoại">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="tl_diachi" placeholder="Địa chỉ">
                                                        <i class="la la-globe"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <button type="submit" value="submit">Đăng ký</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--dff-tab end-->
                                </div>
                            </div>
                            <!--login-sec end-->
                        </div>
                    </div>
                </div>
                <!--signin-pop end-->
            </div>
            <!--signin-popup end-->
            <div class="footy-sec">
                <div class="container">
                    <ul>

                    </ul>
                    <p><img src="{{asset('client/images/copy-icon.png')}}" alt="">Copyright 2018</p>
                </div>
            </div>
            <!--footy-sec end-->
        </div>
        <!--sign-in-page end-->


    </div>
    <!--theme-layout end-->



    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="{{asset('client/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/js/popper.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/lib/slick/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/js/script.js')}}"></script>
</body>

</html>
