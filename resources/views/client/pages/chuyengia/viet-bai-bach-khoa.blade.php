@include('client.template.head')
<script src="{{asset('vendor/tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('vendor/tinymce/langs/vi.js')}}"></script>
<script>
    tinymce.init({selector:'#tiny'});
</script>

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
                            <h1 style="font-size: 30px;">Viết bài</h1>
                            <section class="content">

                                <!-- Default box -->
                                <div class="card">

                                    <div class="card-body">
                                        <form method="POST" action="{{ route('them-bach-khoa') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tiêu đề</label>
                                                <input name="tieude" type="text" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                                    placeholder="Nhập tiêu đề . . . ">
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
                                                <textarea id="tiny" placeholder="nội dung" name="noidung" rows="15"
                                                    style="width: 100%;  font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary" id="add">Thêm</button>
                                            <a href="{{ route('bach-khoa-nong-nghiep') }}" class="btn btn-default">Quay
                                                về</a>
                                        </form>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->

                            </section>

                        </div>
                    </div>
                </div>
                <!--forum-questions-sec end-->
            </div>
        </section>
        <!--forum-page end-->

    </div>
    @include('client.template.script')
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
    <script>
        tinymce.init({
            selector:'#tiny',
            language: 'vi',
            branding: false,
            plugins: '  paste importcss searchreplace autolink autosave save directionality  visualblocks visualchars fullscreen image link media   table charmap hr pagebreak nonbreaking  toc insertdatetime advlist lists wordcount imagetools textpattern noneditable  charmap quickbars emoticons',
            imagetools_cors_hosts: ['picsum.photos'],
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
            toolbar_sticky: true,
            autosave_ask_before_unload: true,
            autosave_interval: "30s",
            autosave_prefix: "{path}{query}-{id}-",
            autosave_restore_when_empty: false,
            autosave_retention: "2m",
            image_advtab: true,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_noneditable_class: "mceNonEditable",
            toolbar_mode: 'sliding',
            contextmenu: "link image imagetools table",
            });
    </script>
</body>
