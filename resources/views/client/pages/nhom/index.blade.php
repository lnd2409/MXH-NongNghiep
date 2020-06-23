@include('client.template.head')

<body>

    <div class="wrapper">
        @include('client.template.header') 


        <section class="forum-sec">
            <div class="container">
                <div class="forum-links">
                    <ul>
                        @if (Auth::guard('chuyengia')->check())
                            <li class="active"><a href="{{ route('group-join') }}" title="">Nhóm quản lý</a></li>
                        @else
                            <li class="active"><a href="{{ route('all-group') }}" title="">Nhóm</a></li>
                            <li><a href="{{ route('group-join') }}" title="">Nhóm đã tham gia</a></li>
                        @endif
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
                        <div class="col-lg-12">
                            
                            <h1 class="text-center" style="font-size: 50px">
                                @if (Auth::guard('chuyengia')->check())
                                    Các nhóm quản lý
                                @else
                                    Các nhóm đã tham gia
                                @endif
                            </h1>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            @if ($nhomquanly)
                            @foreach ($nhomquanly as $item)
                                <div class="forum-questions">
                                    <div class="usr-question">
                                        <div class="usr_img">
                                            <img src="http://via.placeholder.com/60x60" alt="">
                                        </div>
                                        <div class="usr_quest">
                                            <h3><a href="{{ route('chi-tiet-nhom', ['idGroup'=>$item->n_id]) }}">{{ $item->n_tennhom }}</a></h3>
                                            <ul class="react-links">
                                                <li><a href="#" title=""><i class="fa fa-heart"></i> Vote 150</a></li>
                                                <li><a href="#" title=""><i class="fa fa-comment"></i> Comments 15</a></li>
                                                <li><a href="#" title=""><i class="fa fa-eye"></i> Views 50</a></li>
                                            </ul>
                                            <ul class="quest-tags">
                                                <li><a href="#" title="">Work</a></li>
                                                <li><a href="#" title="">Php</a></li>
                                                <li><a href="#" title="">Design</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--usr-question end-->
                                </div>     
                            @endforeach
                            @else
                                <h2>Bạn chưa tham gia nhóm nào hết</h2>
                            @endif
                            
                           
                            <!--forum-questions end-->
                                <nav aria-label="Page navigation example" class="full-pagi">
                                        {{ $nhomquanly->links() }}
                                </nav>
                            
                                
                            
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