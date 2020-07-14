<header>
    <div class="container">
        <div class="header-data">
            <div class="logo">
                @if (Auth::guard('nongdan')->check())
                    <a href="{{ route('trang-chu-nong-dan') }}" title="">
                        <img src="{{asset('client/images/cm-logo.png')}}" style="width: 50px;" alt="">
                    </a>
                @elseif(Auth::guard('thuonglai')->check())
                    <a href="{{ route('trangchu') }}" title="">
                        <img src="{{asset('client/images/cm-logo.png')}}" style="width: 50px;" alt="">
                    </a>
                @elseif(Auth::guard('chuyengia')->check())
                    <a href="{{ route('trang-chu-chuyen-gia') }}" title="">
                        <img src="{{asset('client/images/cm-logo.png')}}" style="width: 50px;" alt="">
                    </a>
                @endif
            </div>
            <!--logo end-->
            <div class="search-bar">
                <form>
                    <input type="text" name="search" placeholder="Search...">
                    <button type="submit"><i class="la la-search"></i></button>
                </form>
            </div>
            <!--search-bar end-->
            <nav>
                <ul>
                    <li>
                        @if (Auth::guard('nongdan')->check())
                        <a href="{{ route('trang-chu-nong-dan') }}" title="">
                            <span><img src="{{asset('client/images/icon1.png')}}" alt=""></span>
                            Trang chủ
                        </a>
                        @elseif(Auth::guard('thuonglai')->check())
                        <a href="{{ route('trangchu') }}" title="">
                            <span><img src="{{asset('client/images/icon1.png')}}" alt=""></span>
                            Trang chủ
                        </a>

                        @elseif(Auth::guard('chuyengia')->check())
                            <a href="{{ route('trang-chu-chuyen-gia') }}" title="">
                                <span><img src="{{asset('client/images/icon1.png')}}" alt=""></span>
                                Trang chủ
                            </a>
                        @endif

                    </li>
                    <li>
                        <a href="{{route('sell.list.1')}}" title="">
                            <span><img src="{{asset('client/images/icon2.png')}}" alt=""></span>
                            Nhà cung cấp
                        </a>
                        @if (Auth::guard('nccvt')->check())
                            <ul>
                                <li>
                                    <a href="#">Chi tiết gian hàng</a>
                                </li>
                            </ul>
                        @else

                        @endif

                    </li>
                    @if(Auth::guard('nongdan')->check())
                    <li>
                        <a href="{{ route('nhat-ky-nong-ho',[ 'id' => \Auth::guard('nongdan')->user()->nd_id ]) }}"
                            title="">
                            <span><img src="{{asset('client/images/icon3.png')}}" alt=""></span>
                            Nhật ký nông hộ
                        </a>
                    </li>
                    @endif

                    <li>
                        @if (Auth::guard('nongdan')->check())
                        <a href="{{ route('canhan.nongdan') }}" title="">
                            <span><img src="{{asset('client/images/icon4.png')}}" alt=""></span>
                            Trang cá nhân
                        </a>
                        @elseif(Auth::guard('thuonglai')->check())
                        <a href="{{ route('trangcanhan') }}" title="">
                            <span><img src="{{asset('client/images/icon4.png')}}" alt=""></span>
                            Trang cá nhân
                        </a>
                        @elseif(Auth::guard('chuyengia')->check())
                            <a href="{{ route('ca-nhan-chuyen-gia') }}" title="">
                                <span><img src="{{asset('client/images/icon4.png')}}" alt=""></span>
                                Trang cá nhân
                            </a>
                        @endif
                    </li>
                        @if (Auth::guard('chuyengia')->check())
                        <li>
                            <a href="{{ route('group-join') }}" title="">
                                <span><img src="{{asset('client/images/icon5.png')}}" alt=""></span>
                                Nhóm
                            </a>
                        </li>
                        @elseif(Auth::guard('nongdan')->check())
                            <li>
                                <a href="{{ route('all-group1') }}" title="">
                                    <span><img src="{{asset('client/images/icon5.png')}}" alt=""></span>
                                    Nhóm
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('all-group') }}" title="">
                                    <span><img src="{{asset('client/images/icon5.png')}}" alt=""></span>
                                    Nhóm
                                </a>
                            </li>
                        @endif
                        <a href="" title="">
                            <span><img src="{{asset('client/images/icon4.png')}}" alt=""></span>
                            Trang cá nhân
                        </a>
                        @endif
                    </li>
                    <li>
                        <a href="{{ route('all-group') }}" title="">
                            <span><img src="{{asset('client/images/icon5.png')}}" alt=""></span>
                            Nhóm
                        </a>
                    </li>
                </ul>
            </nav>
            <!--nav end-->
            <div class="menu-btn">
                <a href="#" title=""><i class="fa fa-bars"></i></a>
            </div>
            <!--menu-btn end-->
            <div class="user-account">
                <div class="user-info">
                    @if (Auth::guard('nongdan')->check())
                    <img src="{{asset('hinhanh/nguoidung/nongdan/'.Auth::guard('nongdan')->user()->nd_hinhanh)}}" alt=""
                        style="width:30px; height:30px;">
                    <a href="#"
                        title="">{{ substr(Auth::guard('nongdan')->user()->nd_hoten,-(strpos(strrev(Auth::guard('nongdan')->user()->nd_hoten),' ')),strlen(Auth::guard('nongdan')->user()->nd_hoten))}}</a>
                    <i class="la la-sort-down"></i>
                    @elseif (Auth::guard('thuonglai')->check())
                        <img src="{{asset('hinhanh/nguoidung/thuonglai/'.Auth::guard('thuonglai')->user()->tl_hinhanh)}}" alt="" style="width:30px; height:30px;">
                        <a href="#" title="">{{ substr(Auth::guard('thuonglai')->user()->tl_hoten,-(strpos(strrev(Auth::guard('thuonglai')->user()->tl_hoten),' ')),strlen(Auth::guard('thuonglai')->user()->tl_hoten))}}</a>
                        <i class="la la-sort-down"></i>
                    @elseif (Auth::guard('chuyengia')->check())
                    <img src="{{asset('hinhanh/nguoidung/thuonglai/'.Auth::guard('chuyengia')->user()->cg_hinhanh)}}" alt="" style="width:30px; height:30px;">
                    <a href="#" title="">{{ substr(Auth::guard('chuyengia')->user()->cg_hoten,-(strpos(strrev(Auth::guard('chuyengia')->user()->cg_hoten),' ')),strlen(Auth::guard('chuyengia')->user()->cg_hoten))}}</a>
                    <img src="{{asset('hinhanh/nguoidung/thuonglai/'.Auth::guard('thuonglai')->user()->tl_background)}}"
                        alt="" style="width:30px; height:30px;">
                    <a href="#"
                        title="">{{ substr(Auth::guard('thuonglai')->user()->tl_hoten,-(strpos(strrev(Auth::guard('thuonglai')->user()->tl_hoten),' ')),strlen(Auth::guard('thuonglai')->user()->tl_hoten))}}</a>
                    <i class="la la-sort-down"></i>
                    @elseif (Auth::guard('chuyengia')->check())
                    <img src="" alt="Avata chuyên gia" style="width:30px; height:30px;">
                    <a href="#"
                        title="">{{ substr(Auth::guard('chuyengia')->user()->cg_hoten,-(strpos(strrev(Auth::guard('chuyengia')->user()->cg_hoten),' ')),strlen(Auth::guard('chuyengia')->user()->cg_hoten))}}</a>
                    <i class="la la-sort-down"></i>
                    @elseif (Auth::guard('nccvt')->check())
                    <img src="" alt="Avata chuyên gia" style="width:30px; height:30px;">
                    <a href="#"
                        title="">{{ substr(Auth::guard('nccvt')->user()->nccvt_ten,-(strpos(strrev(Auth::guard('nccvt')->user()->nccvt_ten),' ')),strlen(Auth::guard('nccvt')->user()->nccvt_ten))}}</a>
                    <i class="la la-sort-down"></i>
                    @endif
                </div>
                <div class="user-account-settingss">
                    <h3>Cài đặt</h3>
                    <ul class="us-links">
                        @if (Auth::guard('nongdan')->check())
                        <li><a href="{{ route('caidat.nongdan') }}" title="">Cài đặt tài khoản</a></li>
                        {{-- <li><a href="#" title="">Privacy</a></li>
                        <li><a href="#" title="">Faqs</a></li>
                        <li><a href="#" title="">Terms & Conditions</a></li> --}}
                        @elseif (Auth::guard('thuonglai')->check())
                        <li><a href="{{ route('caidat') }}" title="">Cài đặt tài khoản</a></li>
                        {{-- <li><a href="#" title="">Privacy</a></li>
                        <li><a href="#" title="">Faqs</a></li>
                        <li><a href="#" title="">Terms & Conditions</a></li> --}}
                        @elseif (Auth::guard('chuyengia')->check())
                        <li><a href="{{ route('caidat') }}" title="">Cài đặt tài khoản</a></li>
                        @elseif (Auth::guard('nccvt')->check())
                        <li><a href="{{ route('caidat') }}" title="">Cài đặt tài khoản</a></li>
                        @endif
                    </ul>
                    @if (Auth::guard('nongdan')->check())
                    <h3 class="tc"><a href="{{ route('dang-xuat-nong-dan') }}" title="">Đăng xuất</a></h3>
                    @elseif(Auth::guard('thuonglai')->check())
                    <h3 class="tc"><a href="{{ route('dang-xuat-thuong-lai') }}" title="">Đăng xuất</a></h3>
                    @elseif(Auth::guard('chuyengia')->check())
                    <h3 class="tc"><a href="{{ route('dang-xuat-chuyen-gia') }}" title="">Đăng xuất</a></h3>
                    @elseif(Auth::guard('nccvt')->check())
                    <h3 class="tc"><a href="{{ route('logout-nccvt') }}" title="">Đăng xuất</a></h3>
                    @endif

                </div>
                <!--user-account-settingss end-->
            </div>
        </div>
        <!--header-data end-->
    </div>
</header>
