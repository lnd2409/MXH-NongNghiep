@include('client.template.head')

<body>

    <div class="wrapper">
        @include('client.template.header')


        <section class="forum-sec">
            <div class="container">
                <div class="forum-links">
                    <ul>
                        <li><a href="{{ route('trang-chu-chuyen-gia') }}" title="">Bài viết quan tâm</a></li>
                        <li class="active"><a href="{{ route('bach-khoa-nong-nghiep') }}" title="">Bách khoa nông
                                nghiệp</a></li>
                    </ul>
                </div>
                <!--forum-links end-->
                <div class="forum-links-btn">
                    <a href="#" title=""><i class="fa fa-bars"></i></a>
                </div>
            </div>
        </section>
        <section class="forum-page pt-2 pb-2">
            <div class="container">
                <div class="forum-questions-sec">
                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('hien-thi-them') }}" class="btn btn-primary">Đăng bài viết mới</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="forum-page pt-1 pb-2">
            <div class="container">
                <div class="forum-questions-sec">
                    <div class="row">
                        <div class="col-lg-8">
                            @foreach ($data as $item)

                            <div class="forum-questions">
                                <div class="usr-question">
                                    <div class="usr_img">
                                        <img src="http://via.placeholder.com/60x60" alt="">
                                    </div>
                                    <div class="usr_quest">
                                        <h3 style="margin-bottom: 0px;"><a
                                                href="{{route('chi-tiet',$item->bk_id)}}">{{$item->bk_tieude}}</a></h3>

                                        <ul class="react-links">
                                            <li>{{$item->cg_hoten}}</li>
                                        </ul>
                                        <br>
                                        <br>
                                        @if(\Auth::guard('chuyengia')->id()==$item->cg_id)
                                        <a href="{{ route('hien-thi-sua', ['id'=>$item->bk_id]) }}"
                                            class="btn btn-warning" style="padding: 2px 6px;">Sửa</a>
                                        <a href="{{ route('xoa-bach-khoa', ['id'=>$item->bk_id]) }}"
                                            class="btn btn-danger" style="padding: 2px 6px;">Xóa</a>
                                        @endif
                                    </div>
                                    <!--usr_quest end-->
                                </div>
                            </div>
                            @endforeach

                            <!--forum-questions end-->
                        </div>

                        {{-- Danh sách nhóm --}}
                        {{-- Danh sách nhóm --}}
                        <div class="col-lg-4">
                            <div class="widget widget-user">
                                <h3 class="title-wd">Các nhóm quản lý <span style="padding-left: 4rem !important;"><a href="#" data-toggle="modal" data-target="#ModalNhom"><i class="fa fa-plus"></i> Tạo nhóm</a></span></h3>
                                <ul>
                                    @foreach ($nhomquanly as $item)
                                        <li>
                                            <div class="usr-msg-details">
                                                <div class="usr-ms-img">
                                                    <img src="http://via.placeholder.com/50x50" alt="">
                                                </div>
                                                <div class="usr-mg-info">
                                                    <h3><a href="#">{{ $item->n_tennhom }}</a></h3>
                                                    <p>{{ $item->lns_ten }}</p>
                                                </div>
                                                <!--usr-mg-info end-->
                                            </div>
                                            <span><img src="images/price1.png" alt="">1185</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!--widget-user end-->
                            <div class="widget widget-adver pt-3 pb-3">
                                <a href="#" class="btn btn-success ml-5" data-toggle="modal" data-target="#ModalQuanTam">Chọn lĩnh vực quan tâm</a>
                            </div>
                            <!--widget-adver end-->
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

    <!-- Modal -->
    <div class="modal fade" id="ModalQuanTam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Chọn lĩnh vực quan tâm</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('chon-linh-vuc') }}" method="POST">
                    @csrf
                    @foreach ($linhvuc as $item)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $item->lns_id }}" id="defaultCheck1" name="loainongsan[]" style="margin-left: 0px;">
                        <label class="form-check-label" for="defaultCheck1">
                            {{ $item->lns_ten }}
                        </label>
                    </div>
                    @endforeach
                    <br>
                    <button class="btn btn-success" type="submit">Chọn</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </form>
            </div>
        </div>
        </div>
    </div>
    <!-- Modal tạo nhóm-->
    <div class="modal fade" id="ModalNhom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tạo nhóm</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form  method="POST" action="{{ route('tao-nhom') }}">
                    @csrf
                    <div class="form-group">
                        <label for="">Chủ đề</label>
                        <select class="form-control" name="loainongsan">
                            @foreach ($linhvuc2 as $item)
                                <option value="{{ $item->lns_id }}">{{ $item->lns_ten }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tên nhóm</label>
                        <input type="text" class="form-control" name="tennhom">
                    </div>
                    <button class="btn btn-success" type="submit">Tạo</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </form>
            </div>
        </div>
        </div>
    </div>
    @include('client.template.script')
</body>

</html>
