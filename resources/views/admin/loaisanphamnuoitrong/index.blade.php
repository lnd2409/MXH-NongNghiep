@extends('admin.template.master')
@section('content')
  
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-4">
        <h3>Loại sản phẩm nuôi trồng</h3>
      </div>
      <div class="col-sm-4">
        
      </div>
      <div class="col-sm-4">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
          <li class="breadcrumb-item active">Loại sản phẩm nuôi trồng</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
{{-- {{ \Auth::guard('nhanvien')->user()->nv_id}} --}}
    <div class="col-12">
      @if (Session::has('alert-info'))
        <div class="alert alert-success">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>{{Session::get('alert-info')}}</strong>
        </div>
        {{Session::put('alert-info',null)}}
      @endif
      @if (Session::has('alert-del'))
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{Session::get('alert-del')}}</strong>
        </div>
        {{Session::put('alert-del',null)}}
      @endif
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Thêm loại sản phẩm nuôi trồng</a>
          </h3>

          <div class="card-title">
            
          </div>
        </div>
        <div class="card-header">
          <div class="form-group ml-1 mr-1">
            {{-- <label>Tìm kiếm</label> --}}
            <input type="text" class="form-control" name="search" id="search" placeholder="Nhập tên loại">
          </div>
        </div>
        <!-- /.card-header -->
        
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap" >
            <thead>
              <tr>
                <th>STT</th>
                <th>Mã số loại</th>
                <th>Tên loại</th>
                <th>Ngày thêm</th>
                <th>Ngày cập nhật</th>
                <th>Thao tác</th>
              </tr>
            </thead>
            <tbody id="category_table">
              @php
                  $stt=1;
              @endphp
              @foreach ($lspnt as $item => $value)
              <tr>
                <td>{{$stt++}}</td>
                <td>{{$value->lns_id}}</td>
                <td>{{$value->lns_ten}}</td>
                <td>{{$value->created_at}}</td>
                <td>{{$value->updated_at}}</td>
                <td>
                  <a href="{{ route('sua-loai-san-pham-nuoi-trong', ['id'=>$value->lns_id]) }}" class="btn btn-primary">Sửa</a>
                  <a href="{{ route('xoa-loai-san-pham-nuoi-trong', ['id'=>$value->lns_id]) }}" class="btn btn-danger">Xóa</a>
                </td>
              </tr>
              @endforeach
            </tbody>
            
          </table>
          <nav aria-label="Page navigation example">
            {{-- {!! $loai->links() !!} --}}
          </nav>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>

    {{-- Form thêm loại ở đây --}}
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thêm</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('them-loai-san-pham-nuoi-trong') }}">
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Tên loại</label>
                <input name="tenLoai" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên loại sản phẩm nuôi trồng . . . ">
              </div>
              <button type="submit" class="btn btn-primary" id="add">Thêm</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          </div>
        </div>
      </div>
    </div>

    {{-- <script type="text/javascript">
      $(document).ready(function () {
        function fetch_category_data(query = '')
        {
          $.ajax({
            type: "GET",
            url: "{{ route('search-category') }}",
            data: {query : query},
            dataType: "json",
            success: function (data) {
              $('tbody').html(data.table_data);
            }
          });
        }

        $(document).on('keyup','#search', function () {
          var query = $(this).val();
          fetch_category_data(query);
        });
      });
  </script> --}}
  
@endsection