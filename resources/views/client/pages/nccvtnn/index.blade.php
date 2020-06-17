@include('client.template.head')
<style>
   
    .item-slick.slick-slide.slick-current.slick-active{
        outline: none!important;
    }
        

    .slider-for{
        
        margin-bottom: 15px;
        
    }
    .slider-for img{
        width: 100%;
        min-height: 100%;
    }
            

    .slider-nav{
        margin: auto;
    }
        
    .item-slick{
        
        max-width: 240px;
        margin-right: 15px;
        outline: none!important;
        cursor: pointer;
    }
    .item-slick img
            {max-width: 100%;
            background-size: cover;
            background-position: center;}
    .slick-arrow
        {position: absolute;
        top: 50%;
        z-index: 50;
        margin-top: -12px;
    }
    .slick-prev
        {left: 0;}
    .slick-next
        {right: 0;}

</style>
<body>

    <div class="wrapper">
        @include('client.template.header') 


        <section class="forum-sec">
            <div class="container">
                <div class="forum-links">
                    <ul>
                        <li class="active"><a href="#" title="">Bài viết mới nhất</a></li>
                        <li><a href="#" title="">Chủ đề quan tâm</a></li>
                        <li><a href="#" title="">Bài viết cá nhân</a></li>
                        <li><a href="#" title="">Bài viết khoa học</a></li>
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
                            <div class="forum-questions">
                                <div class="usr-question">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <div id="aniimated-thumbnials" class="slider-for">
                                                    <a href="http://farm9.staticflickr.com/8242/8558295633_f34a55c1c6_b.jpg">
                                                        <img src="http://farm9.staticflickr.com/8242/8558295633_f34a55c1c6_b.jpg" />
                                                    </a>
                                                    <a href="http://farm9.staticflickr.com/8382/8558295631_0f56c1284f_b.jpg">
                                                        <img src="http://farm9.staticflickr.com/8382/8558295631_0f56c1284f_b.jpg" />
                                                    </a>
                                                    <a href="http://farm9.staticflickr.com/8225/8558295635_b1c5ce2794_b.jpg">
                                                        <img src="http://farm9.staticflickr.com/8225/8558295635_b1c5ce2794_b.jpg" />
                                                    </a>
                                                    <a href="http://farm9.staticflickr.com/8383/8563475581_df05e9906d_b.jpg">
                                                        <img src="http://farm9.staticflickr.com/8383/8563475581_df05e9906d_b.jpg" />
                                                    </a>
                                                </div>
                                                <div class="slider-nav">
                                                    <div class="item-slick">
                                                        <img src="http://farm9.staticflickr.com/8242/8558295633_f34a55c1c6_b.jpg" alt="Alt">
                                                    </div>
                                                    <div class="item-slick">
                                                        <img src="http://farm9.staticflickr.com/8382/8558295631_0f56c1284f_b.jpg" alt="Alt">
                                                    </div>
                                                    <div class="item-slick">
                                                        <img src="http://farm9.staticflickr.com/8225/8558295635_b1c5ce2794_b.jpg" alt="Alt">
                                                    </div>
                                                    <div class="item-slick">
                                                        <img src="http://farm9.staticflickr.com/8383/8563475581_df05e9906d_b.jpg" alt="Alt">
                                                    </div>
                                                </div>                    
                                            </div>
                                        </div>
                                    </div>
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
