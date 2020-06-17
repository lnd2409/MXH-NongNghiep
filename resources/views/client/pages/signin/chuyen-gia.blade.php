<!doctype html>
<html>
    <head>
        <title>Đăng nhập</title>
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,400i|Noto+Sans:400,400i,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('client/css/bootstrap.min.css')}}">
        <style>
            *{
    margin:0;
    padding:0;
    border:none;
    font-family: 'Open Sans', sans-serif;
}
body {
    overflow: hidden;
    background-image: url("{{asset('hinhanh/bg-green.jpg')}}");
    background-size: cover;
}
.to {
    display: grid;
    grid-template-columns: repeat(12,1fr);
    grid-template-rows: minmax(100px,auto);
}
 
.form {
    border: 1px solid #80808000;
    grid-column: 6/9;
    grid-row: 3;
    height: 500px;
    width: 292px;
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    border-radius: 15px;
    box-shadow: 0px 0px 14px 0px grey;
    background-color: white;
}
h2 {
    margin-top: 50px;
    margin-bottom: 30px;
}
i.fab.fa-app-store-ios {
    display: block;
    margin-bottom: 50px;
    font-size: 28px;
}
 
label {
    /* margin-left: -126px; */
    display: block;
    font-weight: lighter;
 
}
input{
    display: block;
    border-bottom: 2px solid #00BCD4;
    margin-top: 6px;
    margin-bottom: 10px;
    outline-style: none;
}
input[type="text"] {
    padding: 5px;
    width: 70%;
}
input[type="password"] {
    padding: 5px;
    width: 70%;
}
input#submit {
    padding: 7px;
    width: 50%;
    border-radius: 10px;
    border: none;
    position: absolute;
    bottom: 65px;
    cursor: pointer;
    background: linear-gradient(to right, #fc00ff, #00dbde);
}
input#submit:hover{
 
    background: linear-gradient(to right, #fc466b, #3f5efb); 
}

#dangky {
    padding-top: 155px;
    text-decoration: none;
}
        </style>
    </head>
    <body>
        <form action="{{ route('login-chuyen-gia-2') }}" method="POST">
            @csrf
        <div class="to">
                <div class="form">
                    {{-- <p>123</p> --}}

                    <h2>Đăng nhập</h2>
                    @if (Session::has('msg1'))
                        <label style="color:green; font-weight: bold;">Đăng ký thành công</label>
                    @endif
                    {{ Session::put('msg1', null) }}
                    <label>Tên đăng nhập</label>
                    <input type="text" name="username">
                    <label>Mật khẩu</label>
                    <input type="password" name="password"> 
                    
                    <input id="submit" type="submit" name="submit" value="Đăng nhập">
                    <a id="dangky" href="#" data-toggle="modal" data-target="#exampleModal">Đăng ký</a>
                </div>
        </div>
    </form>                

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{ route('register-chuyen-gia') }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Đăng ký</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Tên đăng nhập</label>
                                <input type="text" class="form-control" name="tendangnhap">
                            </div>
                            <div class="form-group">
                                <label for="">Mật khẩu</label>
                                <input type="password" name="matkhau" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Nhập lại mật khẩu</label>
                                <input type="password" name="matkhau2" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Họ tên</label>
                                <input type="text" class="form-control" name="hoten">
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="text" name="sdt" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ</label>
                                <textarea name="diachi" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Trình độ</label>
                                <select class="form-control" name="trinhdo">
                                    @foreach ($trinhdo as $item)
                                        <option value="{{ $item->td_id }}">{{ $item->td_ten }}</option>
                                    @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Đăng ký</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
    
    <script type="text/javascript" src="{{asset('client/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/js/popper.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/js/bootstrap.min.js')}}"></script>

</html>