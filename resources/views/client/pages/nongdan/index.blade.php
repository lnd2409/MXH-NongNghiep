@extends('client.template.head')

@section('title')
    Trang chủ
@endsection
@section('css')
<style>
    .forum-questions.forum-questions-fix {
    margin: 15px 0px;
    }
    ul.react-links {
    margin-top: 15px;
}
.nd-comment-content {
    /* border: 1px solid black; */
    margin-top: 134px;
}
p._hinhanh {
    width: 548px;
    /* border: 1px solid; */
    /* border-radius: 9%; */
}


.text-comment {
    height: 26px;
    width: 347px !important;
    margin-left: 55px;
    border-radius: 10px;
}

.comment-send{
    width: 80px;
    height: 28px;
    line-height: 8px;
    font-size: 15px;
    margin-left: -80px;
}
.id_delete {
    width: 116px;
    height: 29px;
    /* float: right; */
    position: absolute;
    right: -118px;
    top: 28px;
    /* padding: 0 7px; */
    transition:all 3s;
    display: none;
}
.id_delete :hover{
    color: red;

}
.usr-question:hover .id_delete{
    position: absolute;
    right: 14px;
    display: block;
}

.icon-delete > a {
    position: absolute;
    top: 8px;
    right: 11px;
    font-size: 13px;
    color: #08b400;
    transition: all 0.2s;
}

</style>
@endsection
<body>
    <div class="wrapper">
        @include('client.template.header')
        <section class="forum-sec">
            <div class="container">
                <div class="forum-links">
                    <ul>
                        <li class="active"><a href="#" title="">Bài viết quan tâm</a></li>
                        <li><a href="#" title="">Bài viết trong nhóm</a></li>
                        <li><a href="#" title="">Bách khoa nông nghiệp</a></li>
                    </ul>
                </div>
                <!--forum-links end-->
                <div class="forum-links-btn">
                    <a href="#" title=""><i class="fa fa-bars"></i></a>
                </div>
            </div>
        </section>

        <section class="forum-page">
            <div class="container">
                <div class="forum-questions-sec">
                    <div class="row">
                        <div class="col-lg-8">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#postsModal">
                                Đăng bài
                            </button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-8">
                            @foreach ($baiviet as $item)
                            <div class="forum-questions forum-questions-fix">
                                <div class="usr-question">
                                    <div class="usr_img">
                                        <img src="{{asset('hinhanh/nguoidung/nongdan/'.$item->nd_hinhanh)}}" alt="">
                                        <p>{{ $item->nd_hoten }}</p>
                                    </div>
                                    <div class="usr_quest">
                                        <h3><a style="color: #08b400">{{ $item->bv_tieude }}</a></h3>
                                        <div class="id_delete">
                                            @if($item->nd_id == Auth::guard('nongdan')->id())
                                            <a href="{{ route('nongdan.bai-dang-xoa', $item->bv_id) }}"  ><i class="fa fa-trash" aria-hidden="true"> Xóa bài viết</i></a>
                                            @endif
                                        </div>
                                        <div>
                                            {{ $item->bv_noidung }}
                                        </div>

                                        <ul class="quest-tags">
                                            @if(!empty($hinhanh[$item->bv_id]))
                                                @foreach ($hinhanh[$item->bv_id] as $item2)
                                                    <li><img src="{{ asset($item2->habv_duongdan) }}" alt="" width="70" height="70" class="img-p" ></li>
                                                @endforeach
                                            @endif
                                        </ul>
                                        <ul class="react-links">
                                            <li><a href="#" ><i class="fa fa-heart"></i>Thích</a></li>
                                            {{-- Bình luận --}}
                                            <li>
                                                <a class="showForm" data-id="{!! $item->bv_id !!} ">Bình luận</a>
                                            </li>
                                            <li><a href="#" ><i class="fa fa-eye"></i> Lượt xem</a></li>
                                        </ul>
                                        <div class="nd-comment" style="display:none" id="{{$item->bv_id}}">
                                            <div class="nd-comment-content _cmm{{$item->bv_id}}">
                                                @if(!empty($binhluan[$item->bv_id]))
                                                    @foreach ($binhluan[$item->bv_id] as $val)
                                                        <div class="row mb-3" >
                                                            <div class="col-1 p-0">
                                                                <img src="{{asset('hinhanh/nguoidung/nongdan').'/'.$val->nd_hinhanh}}" style="width: 60%; border-radius: 50%;" alt="">
                                                            </div>
                                                            <div class="col-10 h-100" style="border-radius: 20px; background-color: #cccccc; position: relative;">
                                                                <div class="pt-2 pb-2" style="font-size: 13px;">
                                                                    <a href="">{{ $val->nd_hoten }}</a>
                                                                    <span style="margin-left: 5px;">{{$val->bl_noidung}}</span>
                                                                </div>
                                                                @if (Auth::guard('nongdan')->user()->nd_id == $val->nd_id)
                                                                    <div class="icon-delete"><a href="{{ route('nongdan.xoa-binhluan',$val->bl_id) }}" title="Xóa"><i class="fa fa-trash" ></i></a></div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            {{-- form viết binh luận --}}
                                            <form >
                                                @csrf
                                                <div class="form-group">
                                                    <div class="row">

                                                        <div class="col-10 p-0">
                                                            <input type="text"  class="form-control content_cm{!! $item->bv_id !!} text-comment" name="_content" style="width: 100%;">
                                                            <input type="hidden" value="{{$item->bv_id}}" class="bv_id">
                                                            <input type="hidden" value="{{ csrf_token() }}" class="_token">
                                                            <input type="hidden" value="{{Auth::guard('nongdan')->id()}}" class="nd_id">
                                                        </div>
                                                        <div class="col-2 p-0">
                                                            <button class="btn btn-lg btn-default send{!! $item->bv_id !!} comment-send" data-send="{!! $item->bv_id !!}"  >Gửi</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>
                                         </div>
                                        <span class="quest-posted-time"><i class="fa fa-clock-o"></i>3 min ago</span>
                                    </div>
                                    <!--usr_quest end-->

                                    {{-- @if(!empty($hinhanh[$item->bv_id]))
                                        @foreach ($hinhanh[$item->bv_id] as $item2)
                                        <img src="{{ asset($item2->habv_duongdan) }}" alt="" width="70" height="70">
                                        @endforeach
                                    @endif --}}
                                </div>
                            </div>
                            @endforeach
                            <!--forum-questions end-->
                        </div>

                        {{-- Danh sách nhóm --}}
                        <div class="col-lg-4">
                            <div class="widget widget-user">
                                <h3 class="title-wd">Các nhóm đã tham gia</h3>
                                <ul>
                                    @foreach ($nhom_nong_dan as $item)
                                        <li>
                                            <div class="usr-msg-details">
                                                <div class="usr-ms-img">
                                                    <img src="http://via.placeholder.com/50x50" alt="">
                                                </div>
                                                <div class="usr-mg-info">
                                                    <h3><a href="#">{{ $item->n_tennhom }}</a></h3>
                                                    <p>Graphic Designer </p>
                                                </div>
                                                <!--usr-mg-info end-->
                                            </div>
                                            <span><img src="images/price1.png" alt="">1185</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!--widget-user end-->
                            <div class="widget widget-adver">
                                <img src="http://via.placeholder.com/370x270" alt="">
                            </div>
                            <!--widget-adver end-->
                        </div>
                    </div>
                </div>
                <!--forum-questions-sec end-->
            </div>
        </section>
        <!--forum-page end-->




        <div class="overview-box" id="question-box">
            <div class="overview-edit">
                <h3>Ask a Question</h3>
                <form>
                    <input type="text" name="question" placeholder="Type Question Here">
                    <input type="text" name="tags" placeholder="Tags">
                    <textarea placeholder="Description"></textarea>
                    <button type="submit" class="save">Submit</button>
                    <button type="submit" class="cancel">Cancel</button>
                </form>
                <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
            </div>
            <!--overview-edit end-->
        </div>
        <!--overview-box end-->
    </div>
    <!-- Modal Post -->
    <div class="modal fade" id="postsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Đăng bài</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('nong-dan-dang-bai') }}" enctype="multipart/form-data" method="post" id="upload">
                        {{-- <div class="form-group">
                            <label for="">Tiêu đề</label>
                            <input type="text" name="tieude" class="form-control" id="">
                        </div> --}}
                        @csrf
                        <div class="form-group">
                            <label for="">Tiêu đề</label>
                            <input type="text" name="tieude" class="form-control" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung</label>
                            <textarea name="noidung" id="" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Loại nông sản</label>
                            <select class="form-control" name="loainongsan">
                                @foreach ($lns as $item)
                                    <option value="{{ $item->lns_id }}">{{ $item->lns_ten }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for=""></label>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <input type="file"
                                name="file[]"
                                multiple
                                id="file-1"
                                class="form-control file"
                                data-overwrite-initial="false"
                                data-min-file-count="2"
                                />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="uploadImage">Upload</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    {{-- popup hình --}}
  <!-- Modal -->
  <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <img id="popup-img" class="img-fluid" src="" alt="" style="border: 5px solid #f1f1f1">
      </div>
    </div>
  </div>
    @include('client.template.script')
    <script>
        $('#file-1').fileinput({
            theme: 'fa',
            uploadUrl: "{{ route('nong-dan-dang-bai') }}",
            uploadExtraData: function () {
                return {
                    _token: $("input[name='_token']").val()
                }
            },
            allowedFileExtensions:['jpg','png','gif'],
            overwriteInitial: false,
            maxFileSize: 2000,
            maxFileNum: 5,
        });

        //bình luận
        $(document).ready(function () {
            $(".showForm").on("click", function () {
                // console.log('ok');
                var id = $(this).attr('data-id');
                // var send_id = $(this).attr('data-send');
                // $(".nd-comment").hide();
                $("#"+id).toggle();
                $('.send'+id).click(function (e) {
                    // var send_id = $(this).data('send');
                    e.preventDefault();
                    // console.log(id);
                    var noidung = $(".content_cm"+id).val();
                    // console.log(noidung);
                    var _token = $("input[name='_token']").val();
                    var bv_id = id;
                    var nd_id = $('.nd_id').val();

                    // console.log(_token);
                    // console.log(noidung);
                    // console.log(bv_id);
                    // console.log(nd_id);

                    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });
                    $.ajax({
                    type: "POST",
                    url: "{{route('nongdan.binhluan')}}",
                    data: { noidung:noidung, bv_id:bv_id, nd_id:nd_id, _token:_token},
                    dataType: "json",
                    success: function (response) {
                        //console.log(response.data);
                        let bl_id= response.data.bl_id;
                        //console.log(bl_id);
                        var ha = response.data.nd_hinhanh;
                        var src_img ='{{asset('hinhanh/nguoidung/nongdan')}}';
                        src_img += "/";
                        src_img +=ha;
                        // var bv_id_add=$('._cmm').attr('data-bl-id');
                        // console.log(bv_id_add);
                        var hoten1 = response.data.nd_hoten;
                        let route =  "{{ Request::url() }}" + "/binh-luan-xoa/"+bl_id;
                        //console.log(route);
                        var xoa = '<div class="icon-delete"><a href="' + route + '" title="Xóa"><i class="fa fa-trash" ></i></a></div>';
                        var noidung1 = response.data.bl_noidung;
                        var data2 =  '<div class="row mb-3" >'+'<div class="col-1 p-0">' +
                                    '<img src="'+ src_img +'" style="width: 60%; border-radius: 50%;" alt=""></div>'
                                    +'<div class="col-10 h-100" style="border-radius: 20px; background-color: #cccccc;position: relative;">' +
                                        '<div class="pt-2 pb-2" style="font-size: 13px;">' +
                                        '<a href="">'+ hoten1 + '</a><span style="margin-left: 5px;">' +  noidung1 +' </span></div>' +xoa+'</div>'+'</div>';

                        //   console.log(id);
                        $('._cmm'+id).append(data2);
                        // console.log(data2);
                    }
                });

                $(".content_cm"+id).val('');


                });
            });

            //popup hình

            $('.img-p').click(function (e) {
                e.preventDefault();
                console.log("ok");
                var src = $(this).attr('src');
                $('#exampleModal1').modal('show');
               $('#popup-img').attr('src',src);
            });

        });

        //Xóa bài
        function myFunction() {
            confirm("Bạn có muốn xóa bài đăng này!");
            return;
            }
    </script>
    {{-- <script>
        $(document).ready(function() {
            $('.popup-gallery').magnificPopup({
                delegate: 'a',
                type: 'image',
                tLoading: 'Loading image #%curr%...',
                mainClass: 'mfp-img-mobile',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                },
                image: {
                    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                    titleSrc: function(item) {
                        return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
                    }
                }
            });
        });
    </script> --}}
</body>

</html>
