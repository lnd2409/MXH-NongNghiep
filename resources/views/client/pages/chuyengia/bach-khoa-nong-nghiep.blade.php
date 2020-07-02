@include('client.template.head')

<body>

    <div class="wrapper">
        @include('client.template.header')


        <section class="forum-sec">
            <div class="container">
                <div class="forum-links">
                    <ul>
                        <li><a href="{{ route('trang-chu-chuyen-gia') }}" title="">Bài viết quan tâm</a></li>
                        <li><a href="#" title="">Bài viết trong nhóm</a></li>
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
                                <h3 class="title-wd">Các nhóm quản lý</h3>
                                <ul>
                                    <li>
                                        <div class="usr-msg-details">
                                            <div class="usr-ms-img">
                                                <img src="http://via.placeholder.com/50x50" alt="">
                                            </div>
                                            <div class="usr-mg-info">
                                                <h3><a href="#">1</a></h3>
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
    @include('client.template.script')
</body>

</html>
