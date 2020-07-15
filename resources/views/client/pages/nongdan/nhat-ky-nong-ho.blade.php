@extends('client.client')
@section('content')
<section class="cover-sec">
    <img src="{{asset('hinhanh/nguoidung/nongdan/'.$data->nd_background)}}" style="height: 400px" alt="">
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
                                <img src="{{asset('hinhanh/nguoidung/nongdan/'.$data->nd_hinhanh)}}" style="width:70%" alt="">
                                    <a href="#" data-toggle="modal" data-target="#changeAvatar"><i class="fa fa-camera"></i></a>
                                </div>
                                <!--user-pro-img end-->
                                <div class="user_pro_status">
                                    <ul class="flw-hr">
                                        <li><a href="{{ route('nhat-ky-nong-ho',[ 'id' => \Auth::guard('nongdan')->user()->nd_id ]) }}" title="" class="flww"><i class="la la-book"></i> Nhật ký nông hô</a></li>
                                        <li style="margin-top:20px;"><a href="{{route('san-pham-nuoi-trong.nongdan')}}" title="" class="hre">Sản phẩm nuôi trồng</a></li>
                                    </ul>
                                    <ul class="flw-status">
                                        <li>
                                            <span>Bài viết</span>
                                            <b>{{ $slbv }}</b>
                                        </li>
                                        <li>
                                            <span>Nhóm tham gia</span>
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
                    <div class="col-md-6 offset-md-3">
                        <h5>Nhật ký nông hộ</h5>
                        <ul class="timeline">
                            @foreach ($nhatky as $item)
                                <li>
                                    <a style="color: blueviolet; font-size: 15px;">{{ $item->nknh_ngayviet }}</a>
                                    {{-- <p class="float-right" style="color: blueviolet; font-size: 15px;">{{ $item->nknh_ngayviet }}</p> --}}
                                    <p>{{ $item->nknh_noidung }}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <div class="right-sidebar">
                            <div class="message-btn">
                                <a href="#" data-toggle="modal" data-target="#NhatKyModal"><i class="fa fa-envelope"></i> Thêm nhật ký</a>
                            </div>
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
         <form action="{{ route('hinhen.submit.nongdan') }}" method="post" enctype="multipart/form-data">
             @csrf
            <div class="form-group">
              <input type="file" class="form-control-file" name="nd_background" id="">
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
         <form action="{{ route('daidien.submit.nongdan') }}" method="post" enctype="multipart/form-data">
             @csrf
            <div class="form-group">
              <input type="file" class="form-control-file" name="nd_hinhanh">
            </div>
            <button type="submit" class="btn btn-success">Lưu</button>
         </form>
        </div>

      </div>
    </div>
  </div>

  {{-- Nhật ký nông hộ --}}
  <!-- Modal -->
<div class="modal fade" id="NhatKyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('viet-nhat-ky') }}" method="POST">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thêm nhật ký mới</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                @csrf
                <input type="text" hidden value="{{ Auth::guard('nongdan')->user()->nd_id }}" name="nd_id">
                <div class="form-group">
                    <label for="">Nội dung</label>
                    <textarea class="form-control" name="noidung" cols="30" rows="10" placeholder="Nội dung"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </div>
        </form>
    </div>
  </div>
@endsection
