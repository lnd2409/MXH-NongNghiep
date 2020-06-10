@include('client.template.head')
@section('title')
    Trang chủ
@endsection
<body>

    <div class="wrapper">
        @include('client.template.header') 


        <section class="forum-sec">
            <div class="container">
                <div class="forum-links">
                    <ul>
                        <li class="active"><a href="#" title="">Bài viết mới nhất</a></li>
                        <li><a href="#" title="">Bài viết trong nhóm</a></li>
                        <li><a href="#" title="">Bách khoa nông nghiệp</a></li>
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
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#postsModal">
                                Đăng bài
                            </button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="forum-questions">
                                @foreach ($baiviet as $item)
                                <div class="usr-question">
                                    <div class="usr_img">
                                        <img src="http://via.placeholder.com/60x60" alt="">
                                        <p>{{ $item->nd_hoten }}</p>
                                    </div>
                                    <div class="usr_quest">
                                        <h3><a href="">{{ $item->bv_tieude }}</a></h3>
                                        <div>
                                            {{ $item->bv_noidung }}
                                        </div>
                                        
                                        <ul class="quest-tags">
                                            @if(!empty($hinhanh[$item->bv_id]))
                                                @foreach ($hinhanh[$item->bv_id] as $item2)
                                                    <li><a href="#" title=""><img src="{{ asset($item2->habv_duongdan) }}" alt="" width="70" height="70"></a></li>
                                                @endforeach
                                            @endif
                                        </ul>
                                        
                                        <ul class="react-links">
                                            <li><a href="#" title=""><i class="fa fa-heart"></i> Vote 150</a></li>
                                            <li><a href="#" title=""><i class="fa fa-comment"></i> Comments 15</a></li>
                                            <li><a href="#" title=""><i class="fa fa-eye"></i> Views 50</a></li>
                                        </ul>
                                    </div>
                                    <!--usr_quest end-->
                                    <span class="quest-posted-time"><i class="fa fa-clock-o"></i>3 min ago</span>
                                    {{-- @if(!empty($hinhanh[$item->bv_id]))
                                        @foreach ($hinhanh[$item->bv_id] as $item2)
                                        <img src="{{ asset($item2->habv_duongdan) }}" alt="" width="70" height="70">
                                        @endforeach
                                    @endif --}}
                                </div>    
                                
                            @endforeach
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

                        {{-- Danh sách nhóm --}}
                        <div class="col-lg-4">
                            <div class="widget widget-user">
                                <h3 class="title-wd">Các nhóm đã tham gia</h3>
                                <ul>
                                    @foreach ($nhom_nong_dan as $item)
                                        <li>
                                            <div class="usr-msg-details">
                                                <div class="usr-ms-img">
                                                    <img src="http://via.placeholder.com/50x50" alt="">
                                                </div>
                                                <div class="usr-mg-info">
                                                    <h3><a href="#">{{ $item->n_tennhom }}</a></h3>
                                                    <p>Graphic Designer </p>
                                                </div>
                                                <!--usr-mg-info end-->
                                            </div>
                                            <span><img src="images/price1.png" alt="">1185</span>
                                        </li>
                                    @endforeach
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
    <!-- Modal Post -->
    <div class="modal fade" id="postsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Đăng bài</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('nong-dan-dang-bai') }}" enctype="multipart/form-data" method="post" id="upload">
                        {{-- <div class="form-group">
                            <label for="">Tiêu đề</label>
                            <input type="text" name="tieude" class="form-control" id="">
                        </div> --}}
                        @csrf
                        <div class="form-group">
                            <label for="">Tiêu đề</label>
                            <input type="text" name="tieude" class="form-control" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung</label>
                            <textarea name="noidung" id="" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Loại nông sản</label>
                            <select class="form-control" name="loainongsan">
                                @foreach ($lns as $item)
                                    <option value="{{ $item->lns_id }}">{{ $item->lns_ten }}</option>                                
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for=""></label>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <input type="file" 
                                name="file[]" 
                                multiple
                                id="file-1" 
                                class="form-control file" 
                                data-overwrite-initial="false" 
                                data-min-file-count="2"     
                                />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="uploadImage">Upload</button>
                        </div> 
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    @include('client.template.script')
    <script>
        $('#file-1').fileinput({
            theme: 'fa',
            uploadUrl: "{{ route('nong-dan-dang-bai') }}",
            uploadExtraData: function () {
                return {
                    _token: $("input[name='_token']").val()
                }
            },
            allowedFileExtensions:['jpg','png','gif'],
            overwriteInitial: false,
            maxFileSize: 2000,
            maxFileNum: 5,
        });
    </script>
</body>

</html>
