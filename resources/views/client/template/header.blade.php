
<header>
    <div class="container">
        <div class="header-data">
            <div class="logo">
                <a href="index.html" title=""><img src="{{asset('client/images/logo.png')}}" alt=""></a>
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
                        @endif
                       
                    </li>
                    <li>
                        <a href="companies.html" title="">
                            <span><img src="{{asset('client/images/icon2.png')}}" alt=""></span>
                            Mua bán
                        </a>
                        <ul>
                            <li><a href="companies.html" title="">Bán nông sản</a></li>
                            <li><a href="company-profile.html" title="">Vật tư nông nghiệp</a></li>
                        </ul>
                    </li>
                    @if(Auth::guard('nongdan')->check())
                        <li>
                            <a href="{{ route('nhat-ky-nong-ho',[ 'id' => \Auth::guard('nongdan')->user()->nd_id ]) }}" title="">
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
                        <img src="{{asset('hinhanh/nguoidung/nongdan/'.Auth::guard('nongdan')->user()->nd_hinhanh)}}" alt="" style="width:30px; height:30px;">
                        <a href="#" title="">{{ substr(Auth::guard('nongdan')->user()->nd_hoten,-(strpos(strrev(Auth::guard('nongdan')->user()->nd_hoten),' ')),strlen(Auth::guard('nongdan')->user()->nd_hoten))}}</a>
                        <i class="la la-sort-down"></i>
                    @elseif (Auth::guard('thuonglai')->check())
                        <img src="{{asset('hinhanh/nguoidung/thuonglai/'.Auth::guard('thuonglai')->user()->tl_background)}}" alt="" style="width:30px; height:30px;">
                        <a href="#" title="">{{ substr(Auth::guard('thuonglai')->user()->tl_hoten,-(strpos(strrev(Auth::guard('thuonglai')->user()->tl_hoten),' ')),strlen(Auth::guard('thuonglai')->user()->tl_hoten))}}</a>
                        <i class="la la-sort-down"></i>
                    @elseif (Auth::guard('chuyengia')->check())
                    <img src="" alt="Avata chuyên gia" style="width:30px; height:30px;">
                    <a href="#" title="">{{ substr(Auth::guard('chuyengia')->user()->cg_hoten,-(strpos(strrev(Auth::guard('chuyengia')->user()->cg_hoten),' ')),strlen(Auth::guard('chuyengia')->user()->cg_hoten))}}</a>
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
                        @endif
                    </ul>
                    @if (Auth::guard('nongdan')->check())
                        <h3 class="tc"><a href="{{ route('dang-xuat-nong-dan') }}" title="">Đăng xuất</a></h3>
                    @elseif(Auth::guard('thuonglai')->check())
                        <h3 class="tc"><a href="{{ route('dang-xuat-thuong-lai') }}" title="">Đăng xuất</a></h3>
                    @elseif(Auth::guard('chuyengia')->check())
                        <h3 class="tc"><a href="{{ route('dang-xuat-chuyen-gia') }}" title="">Đăng xuất</a></h3>
                    @endif
                    
                </div>
                <!--user-account-settingss end-->
            </div>
        </div>
        <!--header-data end-->
    </div>
</header>