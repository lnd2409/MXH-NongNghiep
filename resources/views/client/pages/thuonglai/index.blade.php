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

 .comment-send {
    width: 80px;
    height: 28px;
    line-height: 8px;
    font-size: 15px;
    margin-left: -80px;
}

.id_delete {
    /* border: 1px solid; */
    width: 116px;
    height: 29px;
    /* float: right; */
    position: absolute;
    right: 14px;
    top: 28px;
    /* padding: 0 7px; */
}
.id_delete :hover{
    color: red;
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
                        <li class="active"><a href="#" title="">Bài viết mới nhất</a></li>
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
                                        <img src="http://via.placeholder.com/60x60" alt="">
                                        <p>{{ $item->tl_hoten}}</p>
                                    </div>
                                    <div class="usr_quest">
                                        <h3><a href="">{{ $item->bv_tieude }}</a></h3>
                                        <div class="id_delete">
                                            <a href="{{ route('thuonglai.bai-dang-xoa', $item->bv_id) }}"  ><i class="fa fa-trash" aria-hidden="true"> Xóa bài viết</i></a>  
                                        </div>
                                        
                                        <div>
                                            {{ $item->bv_noidung }}
                                        </div>
                                        
                                        <ul class="quest-tags">
                                            @if(!empty($hinhanh[$item->bv_id]))
                                                @foreach ($hinhanh[$item->bv_id] as $item2)
                                                    <li><a href="#" title=""><img src="{{ asset($item2->habv_duongdan) }}" alt="" width="70" height="70" class="img-p"></a></li>
                                                    
                                                @endforeach
                                            @endif
                                        </ul>
                                        <ul class="react-links">
                                            <li><a href="#" ><i class="fa fa-heart"></i>Thích</a></li>
                                            {{-- Bình luận --}}
                                            <li>    
                                                <a class="showForm" data-id="{!! $item->bv_id !!}">Bình luận</a>
                                            </li>
                                            <li><a href="#" ><i class="fa fa-eye"></i> Lượt xem</a></li>
                                        </ul>
                                        <div class="nd-comment" style="display:none" id="{{$item->bv_id}}">
                                            <div class="nd-comment-content _cmm{{$item->bv_id}}">
                                                @if(!empty($binhluan[$item->bv_id]))
                                                    @foreach ($binhluan[$item->bv_id] as $val)
                                                        <div class="row mb-3" >
                                                            <div class="col-1 p-0">
                                                                <img src="{{asset('hinhanh/nguoidung/thuonglai').'/'.$val->tl_hinhanh}}" style="width: 60%; border-radius: 50%;" alt="">
                                                            </div>
                                                            <div class="col-10 h-100" style="border-radius: 20px; background-color: #cccccc">
                                                                <div class="pt-2 pb-2" style="font-size: 13px;">
                                                                    <a href="">{{ $val->tl_hoten }}</a>
                                                                    {{$val->bl_noidung}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            {{-- form viết binh luận --}}
                                            <form>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-10 p-0">
                                                            <input type="text" class="form-control content_cm{!! $item->bv_id !!} text-comment" name="_content" style="width: 100%;">
                                                            <input type="hidden" value="{{$item->bv_id}}" class="bv_id">
                                                            <input type="hidden" value="{{ csrf_token() }}" class="_token">
                                                            <input type="hidden" value="{{Auth::guard('thuonglai')->id()}}" class="tl_id">
                                                        </div>
                                                        <div class="col-2 p-0">
                                                            <button class="btn btn-lg btn-default send{!! $item->bv_id !!} comment-send" data-send="{!! $item->bv_id !!} "  >Gửi</button>
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
                            <nav aria-label="Page navigation example" class="full-pagi">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link pvr" href="#">Previous</a></li>
                                    <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                                    <li class="page-item"><a class="page-link pvr" href="#">Next</a></li>
                                </ul>
                            </nav>
                        </div>

                        {{-- Danh sách nhóm --}}
                        <div class="col-lg-4">
                            <div class="widget widget-user">
                                <h3 class="title-wd">Các nhóm đã tham gia</h3>
                                <ul>
                                        <li>
                                            <div class="usr-msg-details">
                                                <div class="usr-ms-img">
                                                    <img src="http://via.placeholder.com/50x50" alt="">
                                                </div>
                                                <div class="usr-mg-info">
                                                    <h3><a href="#"></a></h3>
                                                    <p>Graphic Designer </p>
                                                </div>
                                                <!--usr-mg-info end-->
                                            </div>
                                            <span><img src="images/price1.png" alt="">1185</span>
                                        </li>
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
                <h5 class="modal-title" id="exampleModalLabel">Đăng bài của chuyên gia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('thuong-lai-dang-bai') }}" enctype="multipart/form-data" method="post" id="upload">
                        {{-- <div class="form-group">
                            <label for="">Tiêu đề</label>
                            <input type="text" name="tieude" class="form-control" id="">
                        </div> --}}
                        @csrf
                        <div class="form-group">
                            <label for="">Tiêu đề</label>
                            <input type="text" name="tieude" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung</label>
                            <textarea name="noidung"  class="form-control" cols="30" rows="10"></textarea>
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
                    var tl_id = $('.tl_id').val();
                    
                    // console.log(_token);
                    // console.log(noidung);
                    // console.log(bv_id);
                    // console.log(tl_id);

                    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });
                    $.ajax({
                    type: "POST",
                    url: "{{route('thuonglai.binhluan')}}",
                    data: { noidung:noidung, bv_id:bv_id, tl_id:tl_id, _token:_token},
                    dataType: "json",
                    success: function (response) {
                        console.log(response.data);
                        var ha =response.data.tl_hinhanh;
                        var src_img ='{{asset('hinhanh/nguoidung/thuonglai')}}';
                        src_img += "/";
                        src_img +=ha;
                        // var bv_id_add=$('._cmm').attr('data-bl-id');
                        // console.log(bv_id_add);
                        var hoten1 = response.data.tl_hoten;
                        var noidung1 = response.data.bl_noidung;
                        var data2 =  '<div class="row mb-3" >'+'<div class="col-1 p-0">' + 
                                    '<img src="'+ src_img +'" style="width: 60%; border-radius: 50%;" alt=""></div>'
                                    +'<div class="col-10 h-100" style="border-radius: 20px; background-color: #f2f3f5">' + 
                                        '<div class="pt-2 pb-2" style="font-size: 13px;">' +
                                        '<a href="">'+ hoten1 + '</a>' + noidung1 +' </div>' + '</div>'+'</div>';
                        
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
                var src = $(this).attr('src');
                $('#exampleModal1').modal('show');
               $('#popup-img').attr('src',src);
            });

        });
    </script>
</body>

</html>
