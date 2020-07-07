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
                        @elseif(Auth::guard('nongdan')->check())
                            <li class="active"><a href="{{ route('all-group1') }}" title="">Nhóm gợi ý</a></li>
                            <li><a href="{{ route('group-join-1') }}" title="">Nhóm đã tham gia</a></li>
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
                            <div class="forum-questions">
                                @foreach ($nhomgoiy as $item)                                    
                                    <div class="usr-question">
                                        <div class="usr_img">
                                            <img src="{{asset('hinhanh/nguoidung/nongdan/')}}" alt="">
                                            {{-- <p>{{ $item->n_tennhom }}</p> --}}
                                        </div>
                                        <div class="usr_quest">
                                            <h3><a href="{{ $item->n_id }}">{{ $item->n_tennhom }}</a></h3>
                                            <div>
                                                Chủ nhóm: <a href="{{ $item->cg_id }}">{{ $item->cg_hoten }}</a>
                                            </div>
                                            
                                            <ul class="quest-tags">
                                                Ngày tạo: {{ date('d-m-Y', strtotime($item->created_at)) }}
                                            </ul>
                                            
                                            <ul class="react-links pt-3">
                                                <li><a href="#" title="">Tham gia</a></li>
                                            </ul>
                                        </div>
                                        <!--usr_quest end-->
                                        {{-- @if(!empty($hinhanh[$item->bv_id]))
                                            @foreach ($hinhanh[$item->bv_id] as $item2)
                                            <img src="{{ asset($item2->habv_duongdan) }}" alt="" width="70" height="70">
                                            @endforeach
                                        @endif --}}
                                    </div>    
                                @endforeach
                            </div>
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


    </div>
    @include('client.template.script')
</body>

</html>
