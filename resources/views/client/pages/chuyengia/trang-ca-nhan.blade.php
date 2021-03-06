@extends('client.client')
@section('content')
<section class="cover-sec">
    <img src="{{asset('hinhanh/nguoidung/chuyengia/'.$data->cg_background)}}" style="height: 400px" alt="">
    <a title="" data-toggle="modal" data-target="#changeBG"><i class="fa fa-camera"></i>Thay đổi hình nền</a>
</section>

{{-- {{dd($data)}} --}}
<main>
    <div class="main-section">
        <div class="container">
            <div class="main-section-data">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="main-left-sidebar">
                            <div class="user_profile">
                                <div class="user-pro-img">
                                <img src="{{asset('hinhanh/nguoidung/chuyengia/'.$data->cg_hinhanh)}}" style="width:70%" alt="">
                                    <a href="#" data-toggle="modal" data-target="#changeAvatar"><i class="fa fa-camera"></i></a>
                                </div>
                                <!--user-pro-img end-->
                                <div class="user_pro_status">
                                    <ul class="flw-status">
                                        <li>
                                            <span>Bài viết</span>
                                            <b>12</b>
                                        </li>
                                        <li>
                                            <span>Nhóm quản lý</span>
                                            <b>0</b>
                                        </li>
                                    </ul>
                                </div>
                                <!--user_pro_status end-->

                            </div>
                            <!--user_profile end-->

                            <!--suggestions end-->
                        </div>
                        <!--main-left-sidebar end-->
                    </div>
                    <div class="col-lg-6">
                        <div class="main-ws-sec">
                            <div class="user-tab-sec">
                            <h3>{{$data->cg_hoten}}</h3>
                                {{-- <div class="star-descp">
                                    <span>Graphic Designer at Self Employed</span>
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-o"></i></li>
                                    </ul>
                                    <a href="#" title="">Status</a>
                                </div> --}}
                                <!--star-descp end-->
                                <div class="tab-feed st2">
                                   {{-- Để v cho đừng trống --}}
                                </div><!-- tab-feed end-->
                            </div>
                            <!--user-tab-sec end-->
                            <div class="product-feed-tab current" id="feed-dd">
                                <div class="posts-section">
                                    {{-- {{dd($baiviet)}} --}}
                                    @foreach ($baiviet as $item)

                                        <div class="post-bar">
                                            <div class="post_topbar">
                                                <div class="usy-dt">
                                                    <img src="{{asset('hinhanh/nguoidung/chuyengia/'.$data->cg_hinhanh)}}" height="50px" width="50px" alt="">
                                                    <div class="usy-name">
                                                        <h3>{{ $data->cg_hoten }}</h3>
                                                    </div>
                                                </div>
                                                <div class="ed-opts">
                                                    <a href="#" title="" class="ed-opts-open"><i
                                                            class="la la-ellipsis-v"></i></a>
                                                    <ul class="ed-options">
                                                        <li><a href="#" title="">Sửa</a></li>
                                                        <li><a href="#" title="">Xóa</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="epi-sec">


                                            </div>
                                            <div class="job_descp">
                                                <h3>{{ $item->bk_tieude }}</h3>

                                                <p>
                                                    {!! $item->bk_noidung !!}
                                                </p>
                                                <p><a href="#" style="color: greenyellow;">Xem chi tiết</a></p>
                                            </div>
                                        </div>
                                    @endforeach

                                    <!--post-bar end-->
                                </div>
                                <!--posts-section end-->
                            </div>
                            <!--product-feed-tab end-->
                        </div>
                        <!--main-ws-sec end-->
                    </div>
                    <div class="col-lg-3">
                        <div class="right-sidebar">
                            <div class="widget widget-portfolio">
                                <div class="wd-heady">
                                    <h3>Các nhóm đã tham gia</h3>
                                    <img src="images/photo-icon.png" alt="">
                                </div>
                                <div class="user_pro_status">
                                    <ul class="social_links">
                                        <li><a href="#" title=""><i class="la la-globe"></i> Nhóm 1</a></li>
                                        <li><a href="#" title=""><i class="la la-globe"></i> Nhóm 2</a></li>
                                        <li><a href="#" title=""><i class="la la-globe"></i> Nhóm 3</a></li>
                                        <li><a href="#" title=""><i class="la la-globe"></i> Nhóm 4</a></li>
                                        <li><a href="#" title=""><i class="la la-globe"></i> Nhóm 5</a></li>
                                        <li><a href="#" title=""><i class="la la-globe"></i> Nhóm 6</a></li>
                                        <li><a href="#" title=""><i class="la la-globe"></i> Nhóm 7</a></li>
                                        <li><a href="#" title=""><i class="la la-globe"></i> Nhóm 8</a></li>
                                    </ul>
                                </div>
                                <!--pf-gallery end-->
                            </div>
                            <!--widget-portfolio end-->
                        </div>
                        <!--right-sidebar end-->
                    </div>
                </div>
            </div><!-- main-section-data end-->
        </div>
    </div>
</main>

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
<!--footer end-->

{{-- hình nền --}}
<div class="modal fade" id="changeBG" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Chọn hình nền</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <img src="" style="width:200px; height:200px" id="bgd" alt="" >
         <form action="{{ route('hinhen.submit.chuyengia') }}" method="post" enctype="multipart/form-data">
             @csrf
            <div class="form-group">
              <input type="file" class="form-control-file" name="cg_background"  onchange="readURL4(this);">
            </div>
            <button type="submit" class="btn btn-success">Lưu</button>
         </form>
        </div>

      </div>
    </div>
  </div>

  {{-- ảnh đại diện --}}
  <div class="modal fade" id="changeAvatar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel2">Chọn hình đại diện</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <img src="" style="width:200px; height:200px" id="avatar" alt="" >
         <form action="{{ route('daidien.submit.chuyengia') }}" method="post" enctype="multipart/form-data">
             @csrf
            <div class="form-group">
              <input type="file" class="form-control-file" name="cg_hinhanh" onchange="readURL3(this);">
            </div>
            <button type="submit" class="btn btn-success">Lưu</button>
         </form>
        </div>

      </div>
    </div>
  </div>
@endsection
@section('script')
<script>
    function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                console.log('ok');
                reader.onload = function (e) {
                    $('#avatar').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    function readURL4(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                // console.log('ok');
                reader.onload = function (e) {
                    $('#bgd').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
@endsection
