@extends('client.client')
@section('content')
<section class="cover-sec">
    <img src="{{asset('hinhanh/nguoidung/nongdan/'.$data->nd_background)}}" style="height: 400px" alt="">
    <a title="" data-toggle="modal" data-target="#changeBG"><i class="fa fa-camera"></i>Thay đổi hình nền</a>
</section>

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
                                </div>
                            </div>
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
                                <div class="form-group ml-1 mr-1">
                                  {{-- <label>Tìm kiếm</label> --}}
                                  <input type="text" class="form-control" name="search" id="search" placeholder="Nhập tên sản phẩm">
                                </div>
                            </div>
                          <div class="card-header">
                            <h3 class="card-title">
                            <a href="{{route('hien-thi-them-san-pham-nuoi-trong')}}" class="btn btn-info">Thêm nông sản</a>
                            </h3>
                          </div>

                          <!-- /.card-header -->
                          <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap" id="category_table">
                              <thead>
                                <tr>
                                  <th>STT</th>
                                  <th>Tên nông sản</th>
                                  <th>Loại nông sản</th>
                                  <th>Tháng bắt đầu</th>
                                  {{-- Cái này là sắp xếp --}}
                                  <th>Tháng kết thúc</th>
                                  <th>Thao tác</th>
                                </tr>
                              </thead>
                              <tbody id="category_table">
                                @php
                                    $stt=1;
                                @endphp
                                @foreach ($nuoitrong as $item => $value)
                                    <tr>
                                        <td>{{$stt++}}</td>
                                        <td>{{$value->spnt_ten}}</td>
                                        <td>{{$value->lns_ten}}</td>
                                        <td>{{$value->mv_thangbatdau}}</td>
                                        <td>{{$value->mv_thangketthuc}}</td>
                                        <td>
                                            <a href="{{ route('chi-tiet-san-pham-nuoi-trong', ['idspnt'=>$value->spnt_id,'idmv'=>$value->mv_id]) }}" class="btn btn-primary">Chi tiết</a>
                                            <a href="{{ route('sua-san-pham-nuoi-trong', ['idspnt'=>$value->spnt_id,'idmv'=>$value->mv_id]) }}" class="btn btn-primary">Sửa</a>
                                            <a href="{{ route('xoa-san-pham-nuoi-trong', ['idspnt'=>$value->spnt_id,'idmv'=>$value->mv_id]) }}" class="btn btn-danger">Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                              </tbody>

                            </table>
                            <nav aria-label="Page navigation example">
                              {{-- {!! $sanpham->links() !!} --}}
                            </nav>
                          </div>
                          <!-- /.card-body -->
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
  <script type="text/javascript">
    $(document).ready(function () {
      function fetch_category_data(query = '')
      {
        $.ajax({
          type: "GET",
          url: "{{ route('tim-kiem') }}",
          data: {query : query},
          dataType: "json",
          success: function (data) {
            $('tbody').html(data.table_data);
          }
        });
      }

      $(document).on('keyup','#search', function () {
        var query = $(this).val();
        fetch_category_data(query);
      });
    });
</script>
@endsection
