
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
                                        <li><a href="#" title="" class="flww"><i class="la la-plus"></i> Follow</a></li>
                                        
                                        <li style="margin-top:20px;"><a href="{{route('san-pham-nuoi-trong.nongdan')}}" title="" class="hre">Sản phẩm nuôi trồng</a></li>
                                    </ul>
                                    <ul class="flw-status">
                                        <li>
                                            <span>Following</span>
                                            <b>34</b>
                                        </li>
                                        <li>
                                            <span>Followers</span>
                                            <b>155</b>
                                        </li>
                                    </ul>
                                </div>
                                <!--user_pro_status end-->
                                <ul class="social_links">
                                    <li><a href="#" title=""><i class="la la-globe"></i> www.example.com</a></li>
                                    <li><a href="#" title=""><i class="fa fa-facebook-square"></i>
                                            Http://www.facebook.com/john...</a></li>
                                    <li><a href="#" title=""><i class="fa fa-twitter"></i>
                                            Http://www.Twitter.com/john...</a></li>
                                    <li><a href="#" title=""><i class="fa fa-google-plus-square"></i>
                                            Http://www.googleplus.com/john...</a></li>
                                    <li><a href="#" title=""><i class="fa fa-behance-square"></i>
                                            Http://www.behance.com/john...</a></li>
                                    <li><a href="#" title=""><i class="fa fa-pinterest"></i>
                                            Http://www.pinterest.com/john...</a></li>
                                    <li><a href="#" title=""><i class="fa fa-instagram"></i>
                                            Http://www.instagram.com/john...</a></li>
                                    <li><a href="#" title=""><i class="fa fa-youtube"></i>
                                            Http://www.youtube.com/john...</a></li>
                                </ul>
                            </div>
                            <!--user_profile end-->
                            <div class="suggestions full-width">
                                <div class="sd-title">
                                    <h3>People Viewed Profile</h3>
                                    <i class="la la-ellipsis-v"></i>
                                </div>
                                <!--sd-title end-->
                                <div class="suggestions-list">
                                    <div class="suggestion-usd">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                        <div class="sgt-text">
                                            <h4>Jessica William</h4>
                                            <span>Graphic Designer</span>
                                        </div>
                                        <span><i class="la la-plus"></i></span>
                                    </div>
                                    <div class="suggestion-usd">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                        <div class="sgt-text">
                                            <h4>John Doe</h4>
                                            <span>PHP Developer</span>
                                        </div>
                                        <span><i class="la la-plus"></i></span>
                                    </div>
                                    <div class="suggestion-usd">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                        <div class="sgt-text">
                                            <h4>Poonam</h4>
                                            <span>Wordpress Developer</span>
                                        </div>
                                        <span><i class="la la-plus"></i></span>
                                    </div>
                                    <div class="suggestion-usd">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                        <div class="sgt-text">
                                            <h4>Bill Gates</h4>
                                            <span>C & C++ Developer</span>
                                        </div>
                                        <span><i class="la la-plus"></i></span>
                                    </div>
                                    <div class="suggestion-usd">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                        <div class="sgt-text">
                                            <h4>Jessica William</h4>
                                            <span>Graphic Designer</span>
                                        </div>
                                        <span><i class="la la-plus"></i></span>
                                    </div>
                                    <div class="suggestion-usd">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                        <div class="sgt-text">
                                            <h4>John Doe</h4>
                                            <span>PHP Developer</span>
                                        </div>
                                        <span><i class="la la-plus"></i></span>
                                    </div>
                                    <div class="view-more">
                                        <a href="#" title="">View More</a>
                                    </div>
                                </div>
                                <!--suggestions-list end-->
                            </div>
                            <!--suggestions end-->
                        </div>
                        <!--main-left-sidebar end-->
                    </div>
                    <div class="col-9">
                        @if (Session::has('alert-info'))
                          <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{Session::get('alert-info')}}</strong>
                          </div>
                          {{Session::put('alert-info',null)}}
                        @endif
                        @if (Session::has('alert-del'))
                          <div class="alert alert-danger">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>{{Session::get('alert-del')}}</strong>
                          </div>
                          {{Session::put('alert-del',null)}}
                        @endif
                        
                        <div class="card">
                            <div class="card-header">
                              <h3 class="card-title">
                                Thêm nông sản
                              </h3>
                      
                              <div class="card-title float-right">
                                {{-- Refesh lại trang để về dạng mặc định --}}
                                {{-- <a href="{{ route('danhsachsanpham', ['sort'=> 'danh-sach']) }}" class="btn btn-success"><i class="fas fa-sync"></i></a> --}}
                              </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                            

                            <form method="POST" action="{{ route('cap-nhat-san-pham-nuoi-trong', ['idspnt'=>$nuoitrong->spnt_id, 'idmv'=>$nuoitrong->mv_id]) }}">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mã sản phẩm nuôi trồng</label>
                                    <input name="" readonly type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$nuoitrong->spnt_id}}">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Tên sản phẩm nuôi trồng</label>
                                  <input name="ten" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$nuoitrong->spnt_ten}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Thông tin sản phẩm nuôi trồng</label>
                                    <input name="thongtin" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$nuoitrong->spnt_thongtin}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tháng bắt đầu</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="thangbatdau">
                                        <?php
                                            for ($i=1; $i<=12; $i++)
                                            {
                                                ?>
                                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tháng kết thúc</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="thangketthuc">
                                        <?php
                                            for ($i=1; $i<=12; $i++)
                                            {
                                                ?>
                                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sản lượng dự tính</label>
                                    <input name="sanluongdutinh" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$nuoitrong->nt_sanluongdutinh}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sản lượng thực tế</label>
                                    <input name="sanluongthucte" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$nuoitrong->nt_sanluongdutinh}}">
                                </div>
                                <div class="form-group">
                                    <label for="sp">Số lượng nông sản</label>
                                    <input type="text" value="{{$quymo->qm_soluongnongsan}}" name="soluongnongsan"/>
                                </div>
                    
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Đơn vị tính</label>
                                        <select class="form-control" name="donvitinh">
                                            <option value="1">Kg</option>
                                            <option value="2">Gam</option>
                                            <option value="3">Tấn</option>
                                        </select>
                                                          
                                    
                                </div>
                                <button type="submit" class="btn btn-primary">Xác nhận</button>
                                <a href="{{ route('danh-sach-san-pham-nuoi-trong') }}" class="btn btn-default">Quay về</a>
                              </form>

                          </div>
                            <!-- /.card-body -->
                          </div>
                          <!-- /.card -->
                        </div>
                        
                        <!-- /.card -->
                      </div>
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

<div class="overview-box" id="overview-box">
    <div class="overview-edit">
        <h3>Overview</h3>
        <span>5000 character left</span>
        <form>
            <textarea></textarea>
            <button type="submit" class="save">Save</button>
            <button type="submit" class="cancel">Cancel</button>
        </form>
        <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
    </div>
    <!--overview-edit end-->
</div>
<!--overview-box end-->


<div class="overview-box" id="experience-box">
    <div class="overview-edit">
        <h3>Experience</h3>
        <form>
            <input type="text" name="subject" placeholder="Subject">
            <textarea></textarea>
            <button type="submit" class="save">Save</button>
            <button type="submit" class="save-add">Save & Add More</button>
            <button type="submit" class="cancel">Cancel</button>
        </form>
        <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
    </div>
    <!--overview-edit end-->
</div>
<!--overview-box end-->

<div class="overview-box" id="education-box">
    <div class="overview-edit">
        <h3>Education</h3>
        <form>
            <input type="text" name="school" placeholder="School / University">
            <div class="datepicky">
                <div class="row">
                    <div class="col-lg-6 no-left-pd">
                        <div class="datefm">
                            <input type="text" name="from" placeholder="From" class="datepicker">
                            <i class="fa fa-calendar"></i>
                        </div>
                    </div>
                    <div class="col-lg-6 no-righ-pd">
                        <div class="datefm">
                            <input type="text" name="to" placeholder="To" class="datepicker">
                            <i class="fa fa-calendar"></i>
                        </div>
                    </div>
                </div>
            </div>
            <input type="text" name="degree" placeholder="Degree">
            <textarea placeholder="Description"></textarea>
            <button type="submit" class="save">Save</button>
            <button type="submit" class="save-add">Save & Add More</button>
            <button type="submit" class="cancel">Cancel</button>
        </form>
        <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
    </div>
    <!--overview-edit end-->
</div>
<!--overview-box end-->

<div class="overview-box" id="location-box">
    <div class="overview-edit">
        <h3>Location</h3>
        <form>
            <div class="datefm">
                <select>
                    <option>Country</option>
                    <option value="pakistan">Pakistan</option>
                    <option value="england">England</option>
                    <option value="india">India</option>
                    <option value="usa">United Sates</option>
                </select>
                <i class="fa fa-globe"></i>
            </div>
            <div class="datefm">
                <select>
                    <option>City</option>
                    <option value="london">London</option>
                    <option value="new-york">New York</option>
                    <option value="sydney">Sydney</option>
                    <option value="chicago">Chicago</option>
                </select>
                <i class="fa fa-map-marker"></i>
            </div>
            <button type="submit" class="save">Save</button>
            <button type="submit" class="cancel">Cancel</button>
        </form>
        <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
    </div>
    <!--overview-edit end-->
</div>
<!--overview-box end-->

<div class="overview-box" id="skills-box">
    <div class="overview-edit">
        <h3>Skills</h3>
        <ul>
            <li><a href="#" title="" class="skl-name">HTML</a><a href="#" title="" class="close-skl"><i
                        class="la la-close"></i></a></li>
            <li><a href="#" title="" class="skl-name">php</a><a href="#" title="" class="close-skl"><i
                        class="la la-close"></i></a></li>
            <li><a href="#" title="" class="skl-name">css</a><a href="#" title="" class="close-skl"><i
                        class="la la-close"></i></a></li>
        </ul>
        <form>
            <input type="text" name="skills" placeholder="Skills">
            <button type="submit" class="save">Save</button>
            <button type="submit" class="save-add">Save & Add More</button>
            <button type="submit" class="cancel">Cancel</button>
        </form>
        <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
    </div>
    <!--overview-edit end-->
</div>
<!--overview-box end-->

<div class="overview-box" id="create-portfolio">
    <div class="overview-edit">
        <h3>Create Portfolio</h3>
        <form>
            <input type="text" name="pf-name" placeholder="Portfolio Name">
            <div class="file-submit">
                <input type="file" name="file">
            </div>
            <div class="pf-img">
                <img src="http://via.placeholder.com/60x60" alt="">
            </div>
            <input type="text" name="website-url" placeholder="htp://www.example.com">
            <button type="submit" class="save">Save</button>
            <button type="submit" class="cancel">Cancel</button>
        </form>
        <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
    </div>
    <!--overview-edit end-->
</div>
<!--overview-box end-->

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

<script>
    $(document).ready(function() {
  $('.textarea').summernote();
  });

</script>

@endsection