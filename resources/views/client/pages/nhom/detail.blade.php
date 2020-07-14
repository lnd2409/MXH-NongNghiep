@include('client.template.head')

<body>

    <div class="wrapper">
        @include('client.template.header')



        <section class="forum-page">
            <div class="container">
                <div class="forum-questions-sec">
                    <div class="row">
                        <div class="col-lg-8">
                            <h1 class="" style="font-size: 25px;"><a href="{{ route('group-join') }}">Quay lại</a></h1>
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
                                        <p>Người đăng: <a href="">abc</a></p>
                                    </div>
                                </div>
                                <!--usr-question end-->
                            </div>
                            <!--forum-questions end-->
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
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--forum-questions-sec end-->
            </div>
        </section>
        <!--forum-page end-->
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
