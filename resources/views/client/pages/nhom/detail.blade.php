@include('client.template.head')

<body>

    <div class="wrapper">
        @include('client.template.header') 


        
        <section class="forum-page">
            <div class="container">
                <div class="forum-questions-sec">
                    <div class="row">
                        <div class="col-lg-8">
                            <h1 class="" style="font-size: 30px; text-decoration: underline"><a href="{{ route('group-join') }}"><< Quay lại</a></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <h1 class="text-center" style="font-size: 50px">Nhóm: {{ $nhom->n_tennhom }}</h1>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="forum-questions">
                                <div class="usr-question">
                                    <div class="usr_img">
                                        <img src="http://via.placeholder.com/60x60" alt="">
                                    </div>
                                    <div class="usr_quest">
                                        <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
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
                                    <!--usr_quest end-->
                                    <span class="quest-posted-time"><i class="fa fa-clock-o"></i>3 min ago</span>
                                </div>
                                <!--usr-question end-->
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
                        <div class="col-lg-4">
                            <div class="widget widget-user">
                                <h3 class="title-wd">Top User of the Week</h3>
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
                                    <li>
                                        <div class="usr-msg-details">
                                            <div class="usr-ms-img">
                                                <img src="http://via.placeholder.com/50x50" alt="">
                                            </div>
                                            <div class="usr-mg-info">
                                                <h3>John Doe</h3>
                                                <p>PHP Developer</p>
                                            </div>
                                            <!--usr-mg-info end-->
                                        </div>
                                        <span><img src="images/price2.png" alt="">1165</span>
                                    </li>
                                    <li>
                                        <div class="usr-msg-details">
                                            <div class="usr-ms-img">
                                                <img src="http://via.placeholder.com/50x50" alt="">
                                            </div>
                                            <div class="usr-mg-info">
                                                <h3>Poonam</h3>
                                                <p>Wordpress Developer </p>
                                            </div>
                                            <!--usr-mg-info end-->
                                        </div>
                                        <span><img src="images/price3.png" alt="">1120</span>
                                    </li>
                                    <li>
                                        <div class="usr-msg-details">
                                            <div class="usr-ms-img">
                                                <img src="http://via.placeholder.com/50x50" alt="">
                                            </div>
                                            <div class="usr-mg-info">
                                                <h3>Bill Gates</h3>
                                                <p>C & C++ Developer </p>
                                            </div>
                                            <!--usr-mg-info end-->
                                        </div>
                                        <span><img src="images/price4.png" alt="">1009</span>
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