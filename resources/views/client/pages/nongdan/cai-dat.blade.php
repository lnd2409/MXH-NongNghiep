@extends('client.client')
@section('content')

<section class="profile-account-setting">
    <div class="container">
        <div class="account-tabs-setting">
            <div class="row">
                <div class="col-lg-3">
                    <div class="acc-leftbar">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-acc-tab" data-toggle="tab" href="#nav-acc"
                                role="tab" aria-controls="nav-acc" aria-selected="true"><i
                                    class="la la-cogs"></i>Cài đặt tài khoản</a>
                            <a class="nav-item nav-link" id="nav-password-tab" data-toggle="tab" href="#nav-password"
                                role="tab" aria-controls="nav-password" aria-selected="false"><i
                                    class="fa fa-lock"></i>Thay đổi mật khẩu</a>
                            <a class="nav-item nav-link" id="nav-notification-tab" data-toggle="tab"
                                href="#nav-notification" role="tab" aria-controls="nav-notification"
                                aria-selected="false"><i class="fa fa-flash"></i>Notifications</a>
                            <a class="nav-item nav-link" id="nav-requests-tab" data-toggle="tab" href="#nav-requests"
                                role="tab" aria-controls="nav-requests" aria-selected="false"><i
                                    class="fa fa-group"></i>Requests</a>
                            <a class="nav-item nav-link" id="security-login" data-toggle="tab" href="#security-login"
                                role="tab" aria-controls="security-login" aria-selected="false"><i
                                    class="fa fa-user-secret"></i>Security and Login</a>
                            <a class="nav-item nav-link" id="privacy" data-toggle="tab" href="#privacy" role="tab"
                                aria-controls="privacy" aria-selected="false"><i class="fa fa-paw"></i>Privacy</a>
                            <a class="nav-item nav-link" id="blockking" data-toggle="tab" href="#blockking" role="tab"
                                aria-controls="blockking" aria-selected="false"><i
                                    class="fa fa-cc-diners-club"></i>Blocking</a>
                            <a class="nav-item nav-link" id="nav-deactivate-tab" data-toggle="tab"
                                href="#nav-deactivate" role="tab" aria-controls="nav-deactivate"
                                aria-selected="false"><i class="fa fa-random"></i>Deactivate Account</a>
                        </div>
                    </div>
                    <!--acc-leftbar end-->
                </div>
                <div class="col-lg-9">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-acc" role="tabpanel"
                            aria-labelledby="nav-acc-tab">
                            <div class="acc-setting">
                                <h3>Thông tin cá nhân</h3>
                                <form action="{{ route('caidat.submit.nongdan') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="notbar">
                                       <div class="changeInfor">
                                           
                                        <table class="table table-bordered">
                                            <tbody>
                                              <tr>
                                                <th class="tl_infor">Họ tên:</th>
                                                <td><input type="text" class="form-control" value="{{$data->nd_hoten}}" name="nd_hoten"  style="font-weight:bold"></td>
                                              </tr>
                                              <tr>
                                                <th class="tl_infor">Số điện thoại:</th>
                                                <td><input type="text" class="form-control" value="{{$data->nd_sdt}}" name="nd_sdt" ></td>
                                              </tr>
                                              <tr>
                                                <th class="tl_infor">Địa chỉ:</th>
                                                <td><input type="text" class="form-control" value="{{$data->nd_diachi}}" name="nd_diachi"   ></td>
                                              </tr>
                                             <tr>
                                                 <th colspan="2"><button type="submit" class="btn " style="width:200px; background:#e44d3a; color:white">Cập nhật</button></th>
                                             </tr>
                                            </tbody>
                                          </table>
                                       </div>
                                    </div>
                                    
                                </form>
                            </div>
                            <!--acc-setting end-->
                        </div>
                       
                        <div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">
                            <div class="acc-setting">
                                <h3>Đổi mật khẩu</h3>
                                <div class="changePassword">
                                        <form method="POST" id="form-data" action="{{ route('caidat.submit.matkhau.nongdan') }}">
                                           @csrf
                                        <div class="cp-field">
                                            <h5>Mật khẩu cũ</h5>
                                            <div class="cpp-fiel ">
                                                <input type="password" class="form-control " name="nd_password" id="nd_password">
                                                <i class="fa fa-lock"></i>
                                                <div class="valid-feedback">
                                                    
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="cp-field">
                                            <h5>Mật khẩu mới</h5>
                                            <div class="cpp-fiel">
                                                <input type="password" name="nd_password1" class="form-control " id="nd_password1">
                                                <i class="fa fa-lock"></i>
                                                <small id="" class="form-text text-muted"></small>
                                            </div>
                                        </div>
                                        <div class="cp-field">
                                            <h5>Nhập lại mật khẩu</h5>
                                            <div class="cpp-fiel">
                                                <input type="password" name="nd_password2" class="form-control " id="nd_password2">
                                                <i class="fa fa-lock"></i>
                                                <small id="" class="form-text text-muted"></small>
                                            </div>
                                        </div>
                                    
                                        <div class="save-stngs pd2">
                                            <ul>
                                                <li><button type="submit" id="save" >Cập nhật</button></li>
                                                <li><button type="reset">Làm lại</button></li>
                                            </ul>
                                        </div>
                                        <!--save-stngs end-->
                                    </form>
                                </div>
                                
                            </div>
                            <!--acc-setting end-->
                        </div>
                        <div class="tab-pane fade" id="nav-notification" role="tabpanel"
                            aria-labelledby="nav-notification-tab">
                            <div class="acc-setting">
                                <h3>Notifications</h3>
                                <div class="notifications-list">
                                    <div class="notfication-details">
                                        <div class="noty-user-img">
                                            <img src="http://via.placeholder.com/35x35" alt="">
                                        </div>
                                        <div class="notification-info">
                                            <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                            <span>2 min ago</span>
                                        </div>
                                        <!--notification-info -->
                                    </div>
                                    <!--notfication-details end-->
                                    <div class="notfication-details">
                                        <div class="noty-user-img">
                                            <img src="http://via.placeholder.com/35x35" alt="">
                                        </div>
                                        <div class="notification-info">
                                            <h3><a href="#" title="">Poonam Verma</a> Bid on your Latest project.</h3>
                                            <span>2 min ago</span>
                                        </div>
                                        <!--notification-info -->
                                    </div>
                                    <!--notfication-details end-->
                                    <div class="notfication-details">
                                        <div class="noty-user-img">
                                            <img src="http://via.placeholder.com/35x35" alt="">
                                        </div>
                                        <div class="notification-info">
                                            <h3><a href="#" title="">Tonney Dhman</a> Comment on your project.</h3>
                                            <span>2 min ago</span>
                                        </div>
                                        <!--notification-info -->
                                    </div>
                                    <!--notfication-details end-->
                                    <div class="notfication-details">
                                        <div class="noty-user-img">
                                            <img src="http://via.placeholder.com/35x35" alt="">
                                        </div>
                                        <div class="notification-info">
                                            <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                            <span>2 min ago</span>
                                        </div>
                                        <!--notification-info -->
                                    </div>
                                    <!--notfication-details end-->
                                    <div class="notfication-details">
                                        <div class="noty-user-img">
                                            <img src="http://via.placeholder.com/35x35" alt="">
                                        </div>
                                        <div class="notification-info">
                                            <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                            <span>2 min ago</span>
                                        </div>
                                        <!--notification-info -->
                                    </div>
                                    <!--notfication-details end-->
                                    <div class="notfication-details">
                                        <div class="noty-user-img">
                                            <img src="http://via.placeholder.com/35x35" alt="">
                                        </div>
                                        <div class="notification-info">
                                            <h3><a href="#" title="">Poonam Verma </a> Bid on your Latest project.</h3>
                                            <span>2 min ago</span>
                                        </div>
                                        <!--notification-info -->
                                    </div>
                                    <!--notfication-details end-->
                                    <div class="notfication-details">
                                        <div class="noty-user-img">
                                            <img src="http://via.placeholder.com/35x35" alt="">
                                        </div>
                                        <div class="notification-info">
                                            <h3><a href="#" title="">Tonney Dhman</a> Comment on your project</h3>
                                            <span>2 min ago</span>
                                        </div>
                                        <!--notification-info -->
                                    </div>
                                    <!--notfication-details end-->
                                    <div class="notfication-details">
                                        <div class="noty-user-img">
                                            <img src="http://via.placeholder.com/35x35" alt="">
                                        </div>
                                        <div class="notification-info">
                                            <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                            <span>2 min ago</span>
                                        </div>
                                        <!--notification-info -->
                                    </div>
                                    <!--notfication-details end-->
                                </div>
                                <!--notifications-list end-->
                            </div>
                            <!--acc-setting end-->
                        </div>
                        <div class="tab-pane fade" id="nav-requests" role="tabpanel" aria-labelledby="nav-requests-tab">
                            <div class="acc-setting">
                                <h3>Requests</h3>
                                <div class="requests-list">
                                    <div class="request-details">
                                        <div class="noty-user-img">
                                            <img src="http://via.placeholder.com/35x35" alt="">
                                        </div>
                                        <div class="request-info">
                                            <h3>Jessica William</h3>
                                            <span>Graphic Designer</span>
                                        </div>
                                        <div class="accept-feat">
                                            <ul>
                                                <li><button type="submit" class="accept-req">Accept</button></li>
                                                <li><button type="submit" class="close-req"><i
                                                            class="la la-close"></i></button></li>
                                            </ul>
                                        </div>
                                        <!--accept-feat end-->
                                    </div>
                                    <!--request-detailse end-->
                                    <div class="request-details">
                                        <div class="noty-user-img">
                                            <img src="http://via.placeholder.com/35x35" alt="">
                                        </div>
                                        <div class="request-info">
                                            <h3>John Doe</h3>
                                            <span>PHP Developer</span>
                                        </div>
                                        <div class="accept-feat">
                                            <ul>
                                                <li><button type="submit" class="accept-req">Accept</button></li>
                                                <li><button type="submit" class="close-req"><i
                                                            class="la la-close"></i></button></li>
                                            </ul>
                                        </div>
                                        <!--accept-feat end-->
                                    </div>
                                    <!--request-detailse end-->
                                    <div class="request-details">
                                        <div class="noty-user-img">
                                            <img src="http://via.placeholder.com/35x35" alt="">
                                        </div>
                                        <div class="request-info">
                                            <h3>Poonam</h3>
                                            <span>Wordpress Developer</span>
                                        </div>
                                        <div class="accept-feat">
                                            <ul>
                                                <li><button type="submit" class="accept-req">Accept</button></li>
                                                <li><button type="submit" class="close-req"><i
                                                            class="la la-close"></i></button></li>
                                            </ul>
                                        </div>
                                        <!--accept-feat end-->
                                    </div>
                                    <!--request-detailse end-->
                                    <div class="request-details">
                                        <div class="noty-user-img">
                                            <img src="http://via.placeholder.com/35x35" alt="">
                                        </div>
                                        <div class="request-info">
                                            <h3>Bill Gates</h3>
                                            <span>C & C++ Developer</span>
                                        </div>
                                        <div class="accept-feat">
                                            <ul>
                                                <li><button type="submit" class="accept-req">Accept</button></li>
                                                <li><button type="submit" class="close-req"><i
                                                            class="la la-close"></i></button></li>
                                            </ul>
                                        </div>
                                        <!--accept-feat end-->
                                    </div>
                                    <!--request-detailse end-->
                                    <div class="request-details">
                                        <div class="noty-user-img">
                                            <img src="http://via.placeholder.com/35x35" alt="">
                                        </div>
                                        <div class="request-info">
                                            <h3>Jessica William</h3>
                                            <span>Graphic Designer</span>
                                        </div>
                                        <div class="accept-feat">
                                            <ul>
                                                <li><button type="submit" class="accept-req">Accept</button></li>
                                                <li><button type="submit" class="close-req"><i
                                                            class="la la-close"></i></button></li>
                                            </ul>
                                        </div>
                                        <!--accept-feat end-->
                                    </div>
                                    <!--request-detailse end-->
                                    <div class="request-details">
                                        <div class="noty-user-img">
                                            <img src="http://via.placeholder.com/35x35" alt="">
                                        </div>
                                        <div class="request-info">
                                            <h3>John Doe</h3>
                                            <span>PHP Developer</span>
                                        </div>
                                        <div class="accept-feat">
                                            <ul>
                                                <li><button type="submit" class="accept-req">Accept</button></li>
                                                <li><button type="submit" class="close-req"><i
                                                            class="la la-close"></i></button></li>
                                            </ul>
                                        </div>
                                        <!--accept-feat end-->
                                    </div>
                                    <!--request-detailse end-->
                                </div>
                                <!--requests-list end-->
                            </div>
                            <!--acc-setting end-->
                        </div>
                        <div class="tab-pane fade" id="nav-deactivate" role="tabpanel"
                            aria-labelledby="nav-deactivate-tab">
                            <div class="acc-setting">
                                <h3>Deactivate Account</h3>
                                <form>
                                    <div class="cp-field">
                                        <h5>Email</h5>
                                        <div class="cpp-fiel">
                                            <input type="text" name="email" placeholder="Email">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>Password</h5>
                                        <div class="cpp-fiel">
                                            <input type="password" name="password" placeholder="Password">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>Please Explain Further</h5>
                                        <textarea></textarea>
                                    </div>
                                    <div class="cp-field">
                                        <div class="fgt-sec">
                                            <input type="checkbox" name="cc" id="c4">
                                            <label for="c4">
                                                <span></span>
                                            </label>
                                            <small>Email option out</small>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pretium
                                            nulla quis erat dapibus, varius hendrerit neque suscipit. Integer in ex
                                            euismod, posuere lectus id,</p>
                                    </div>
                                    <div class="save-stngs pd3">
                                        <ul>
                                            <li><button type="submit">Save Setting</button></li>
                                            <li><button type="submit">Restore Setting</button></li>
                                        </ul>
                                    </div>
                                    <!--save-stngs end-->
                                </form>
                            </div>
                            <!--acc-setting end-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--account-tabs-setting end-->
    </div>
</section>



<footer>
    <div class="footy-sec mn no-margin">
        <div class="container">
            <ul>
                <li><a href="#" title="">Help Center</a></li>
                <li><a href="#" title="">Privacy Policy</a></li>
                <li><a href="#" title="">Community Guidelines</a></li>
                <li><a href="#" title="">Cookies Policy</a></li>
                <li><a href="#" title="">Career</a></li>
                <li><a href="#" title="">Forum</a></li>
                <li><a href="#" title="">Language</a></li>
                <li><a href="#" title="">Copyright Policy</a></li>
            </ul>
            <p><img src="images/copy-icon2.png" alt="">Copyright 2018</p>
            <img class="fl-rgt" src="images/logo2.png" alt="">
        </div>
    </div>
</footer>
<script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function () {

        var _token = $("input[name='_token']").val();
        
        //lấy mật khẩu cũ
        $('#nd_password').keyup(function (e) { 

            e.preventDefault();

            var nd_password = $("input[name='nd_password']").val();
            // console.log(nd_password);

            // var nd_password1 = $("input[name='nd_password1']").val();
            // // console.log(tl_password1);

            // var nd_password2 = $("input[name='nd_password2']").val();
            // // console.log(tl_password2);



            $.ajax({
                type: "POST",
                url: "{{route('caidat.kiemtra.nongdan')}}",
                data: {_token:_token,nd_password:nd_password},
                success: function (data) {
                    if(data.success)
                    {
                        console.log(data.success);
                        $("#nd_password").removeClass("is-invalid");
                        $("#nd_password").addClass("is-valid");
                        $("#nd_password1").removeAttr('disabled'); 
                        $("#nd_password2").removeAttr('disabled'); 
                    }
                    else{
                        console.log(data.error);
                        $("#nd_password").addClass("is-invalid");
                        $("#nd_password1").attr('disabled','disabled');
                        $("#nd_password2").attr('disabled','disabled');
                        
                    }
                }
            });
        });

       

       $('#nd_password2').keyup(function (e) {

            var tl_password1 = $("input[name='nd_password1']").val();
            console.log(tl_password1);

            var tl_password2 = $("input[name='nd_password2']").val();
            console.log(tl_password2);

            if(tl_password1 !='' && tl_password2 !='' && tl_password1 == tl_password2){
            
                $("#nd_password1").removeClass("is-invalid")
                $("#nd_password2").removeClass("is-invalid")
                $("#nd_password1").addClass("is-valid")
                $("#nd_password2").addClass("is-valid")
                $("#save").removeAttr('disabled');
            }
            else{
                $("#nd_password1").addClass("is-invalid");
                $("#nd_password2").addClass("is-invalid");
                $("#save").attr('disabled','disabled');
                
            }
       });
        








        //css
        $("div").addClass(".tl_infor ");
        $("div").addClass(".changePassword ");


    });
</script>
@endsection