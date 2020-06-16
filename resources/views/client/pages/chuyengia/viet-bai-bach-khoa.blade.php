@include('client.template.head')

<body>

    <div class="wrapper">
        @include('client.template.header') 

        <section class="forum-page pt-1 pb-2">
            <div class="container">
                <div class="forum-questions-sec">
                    <div class="row">
                        <div class="col-lg-12 pb-3 pt-3">
                            <a href="{{ route('bach-khoa-nong-nghiep') }}">Quay lại</a>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-lg-12">
                            <h1 style="font-size: 30px;">Viết bài</h1>
                            <p>Form tự thêm</p>
                        </div>
                    </div>
                </div>
                <!--forum-questions-sec end-->
            </div>
        </section>
        <!--forum-page end-->

    </div>
    @include('client.template.script')
</body>

</html>
