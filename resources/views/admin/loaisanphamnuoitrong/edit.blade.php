@extends('admin.template.master')
@section('content')

<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
            Sửa thông tin loại sản phẩm nuôi trồng
        </h3>
      </br>
        @if (Session::has('alert-del'))
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{Session::get('alert-del')}}</strong>
        </div>
        {{Session::put('alert-del',null)}}
      @endif
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-2">
        <form method="POST" action="{{ route('cap-nhat-loai-san-pham-nuoi-trong', ['id'=>$loai->lns_id]) }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Mã số</label>
                <input name="" readonly type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$loai->lns_id}}">
              </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Tên loại sản phẩm nuôi trồng</label>
              <input name="tenLoai" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$loai->lns_ten}}">
            </div>
            <button type="submit" class="btn btn-primary">Xác nhận</button>
            <a href="{{ route('danh-sach-loai-san-pham-nuoi-trong') }}" class="btn btn-default">Quay về</a>
          </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
@endsection