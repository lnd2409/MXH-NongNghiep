@include('client.template.head')

<body>

    <div class="wrapper">
        @include('client.template.header')

        <section class="forum-page pt-1 pb-2">
            <div class="container">
                <div class="forum-questions-sec">
                    <div class="row">
                        <div class="col-lg-12 pb-3 pt-3">
                            {{-- <a href="{{ route('bach-khoa-nong-nghiep') }}">Quay lại</a> --}}
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-12">
                            <h1 style="font-size: 30px;">Sửa bài</h1>
                            <section class="content">

                                <!-- Default box -->
                                <div class="card">

                                    <div class="card-body">
                                        <form method="POST"
                                            action="{{ route('sua-bach-khoa', ['id'=>$bachkhoa->bk_id]) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tiêu đề</label>
                                                <input name="tieude" type="text" class="form-control" required
                                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                                    placeholder="Nhập tiêu đề . . . " value="{{$bachkhoa->bk_tieude}}">
                                            </div>
                                            {{-- <div class="form-group">
                    <label for="exampleInputEmail1">Hình ảnh</label>
                    <br>
                    <input type="file" name="hinhanh" id="fileInput"/>
                    <div class="row justify-content-center js-file-list" id="showImage">
                        <img src="" alt="Ảnh sản phẩm" class="js-file-image" width="80%">
                    </div>
                </div> --}}
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Nội dung </label>
                                                {{-- <textarea name="thongTin" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea> --}}
                                                <textarea class="textarea" name="noidung" required
                                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                    {!!$bachkhoa->bk_noidung!!}</textarea>
                                            </div>


                                            <button type="submit" class="btn btn-primary" id="add">Cập nhật</button>
                                            <a href="{{ route('bach-khoa-nong-nghiep') }}" class="btn btn-default">Quay
                                                về</a>
                                        </form>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->

                            </section>

                            <script>
                                $(function () {
          // Summernote
          $('.textarea').summernote()
        })
                            </script>

                            <script>
                                $(document).ready(function(){
            $('#fileInput').on('change', function() {
                var file = $(this)[0].files[0];

                var fileReader = new FileReader();
                fileReader.onload = function() {
                    var imageSrc = event.target.result;
                    $('.js-file-image').attr('src', imageSrc);
                };
                fileReader.readAsDataURL(file);
            });
        });
                            </script>
                            {{-- @endsection --}}
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