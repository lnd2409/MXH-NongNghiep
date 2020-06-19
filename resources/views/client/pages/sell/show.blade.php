@include('client.template.head')
<style>
    .item-slick.slick-slide.slick-current.slick-active {
        outline: none !important;
    }


    .slider-for {

        margin-bottom: 15px;

    }

    .slider-for img {
        height: 500px;
        /* min-width: 800px; */
        width: auto;
    }


    .slider-nav {
        margin: auto;
    }

    .item-slick {

        max-width: 240px;
        margin-right: 15px;
        outline: none !important;
        cursor: pointer;
    }

    .item-slick img {
        max-width: 100%;
        height: 160px;
        background-size: cover;
        background-position: center;
    }

    .slick-arrow {
        position: absolute;
        top: 50%;
        z-index: 50;
        margin-top: -12px;
    }

    .slick-prev {
        left: 0;
    }

    .slick-next {
        right: 0;
    }

    .name {
        font-size: 30px;
    }

    .price {
        font-size: 20px;
        color: #cf2f07;
        /* display: inline; */
    }

    .info {
        font-size: 17px;
        /* margin-left: 50px; */
    }

    .des {
        font-size: 20px;
        color: #212529;
    }

    .des-content {
        font-size: 15px;
    }
</style>

<body>

    <div class="wrapper">
        @include('client.template.header')


        <section class="forum-sec">
            <div class="container">
                {{-- <div class="forum-links">
                    <ul>
                        <li class="active"><a href="#" title="">Bài viết mới nhất</a></li>
                        <li><a href="#" title="">Chủ đề quan tâm</a></li>
                        <li><a href="#" title="">Bài viết cá nhân</a></li>
                        <li><a href="#" title="">Bài viết khoa học</a></li>
                    </ul>
                </div> --}}
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
                            <div class="forum-questions">
                                <div class="usr-question">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <div id="aniimated-thumbnials" class="slider-for">
                                                    @foreach ($img as $item)
                                                    <a href="{{asset($item->ha_duongdan)}}">
                                                        <img src="{{asset($item->ha_duongdan)}}" alt=""
                                                            style="width:100%">
                                                    </a>
                                                    @endforeach
                                                </div>
                                                <div class="slider-nav">
                                                    @foreach ($img as $item)

                                                    <div class="item-slick">
                                                        <img src="{{asset($item->ha_duongdan)}}" alt="Alt">
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="name">{{$product->sp_ten}}</div>
                                    <br>
                                    <br>
                                    <table class="table table-bordered">
                                        <tr>
                                            <td style="width:30%;">Giá sản phẩm</td>
                                            <td>
                                                <div class="price">{{$product->sp_gia}}đ</div>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>

                                                <span class="sum">Số lượng cung cấp: </span>
                                            </td>
                                            <td>

                                                <span class="info">{{$product->sp_soluongcungcap}}</span>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="des">Thông tin người bán</div>
                                    <br>
                                    <table class="table table-bordered">

                                        <tr>
                                            <td style="width:30%;">

                                                <span class="sum">Người bán: </span>
                                            </td>
                                            <td>

                                                <span class="info">{{$product->nccvt_ten}}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>

                                                <span class="sum">Số điện thoại: </span>
                                            </td>
                                            <td>

                                                <span class="info">{{$product->nccvt_sdt}}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>

                                                <span class="sum">Địa chỉ: </span>
                                            </td>
                                            <td>

                                                <span class="info">{{$product->nccvt_diachi}}</span>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="des">Chi tiết</div>
                                    <p class="des-content">{{$product->sp_chitiet}}
                                    </p>
                                </div>
                            </div>
                        </div>
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
                                                <h3>Jessica William</h3>
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
    <script>
        $(function() {
  
                //   $('#aniimated-thumbnials').lightGallery({
                //     thumbnail: true,
                //   });
                // Card's slider
                var $carousel = $('.slider-for');

                $carousel
                    .slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    fade: true,
                    adaptiveHeight: true,
                    asNavFor: '.slider-nav'
                    });
                $('.slider-nav').slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    asNavFor: '.slider-for',
                    dots: false,
                    centerMode: false,
                    focusOnSelect: true,
                    variableWidth: true
                });


    });
    </script>
</body>

</html>