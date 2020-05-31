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
                        <a href="index.html" title="">
                            <span><img src="{{asset('client/images/icon1.png')}}" alt=""></span>
                            Trang chủ
                        </a>
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
                    <li>
                        <a href="projects.html" title="">
                            <span><img src="{{asset('client/images/icon3.png')}}" alt=""></span>
                            Nhật ký nông hộ
                        </a>
                    </li>
                    <li>
                        <a href="profiles.html" title="">
                            <span><img src="{{asset('client/images/icon4.png')}}" alt=""></span>
                            Trang cá nhân
                        </a>
                    </li>
                    <li>
                        <a href="jobs.html" title="">
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
                    <img src="http://via.placeholder.com/30x30" alt="">
                    <a href="#" title="">John</a>
                    <i class="la la-sort-down"></i>
                </div>
                <div class="user-account-settingss">
                    <h3>Cài đặt</h3>
                    <ul class="us-links">
                        <li><a href="{{ route('caidat') }}" title="">Cài đặt tài khoản</a></li>
                        {{-- <li><a href="#" title="">Privacy</a></li>
                        <li><a href="#" title="">Faqs</a></li>
                        <li><a href="#" title="">Terms & Conditions</a></li> --}}
                    </ul>
                    @if (Auth::guard('nongdan')->check())
                        <h3 class="tc"><a href="{{ route('dang-xuat-nong-dan') }}" title="">Đăng xuất</a></h3>
                    @endif
                    @if (Auth::guard('thuonglai')->check())
                        <h3 class="tc"><a href="{{ route('dang-xuat-thuong-lai') }}" title="">Đăng xuất</a></h3>
                    @endif
                    
                </div>
                <!--user-account-settingss end-->
            </div>
        </div>
        <!--header-data end-->
    </div>
</header>