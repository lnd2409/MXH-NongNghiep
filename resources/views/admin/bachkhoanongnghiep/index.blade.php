@extends('admin.template.master')
@section('content')
      
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1>Bách khoa nông nghiệp </h1>
                </div>
                <div class="col-sm-4">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <br>
            <a href="{{ route('hien-thi-them') }}" class="btn-sm btn-success">Thêm</a>
           {{-- <div class="card-tools">
                <h3 class="card-title">
                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Thêm</a>
                  </h3>
               
            </div> --}}
          </div>
          <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th>
                            STT
                        </th>
                        <th>
                            Tiêu đề
                        </th>
                        <th>
                            Nội dung
                        </th>
                        <th>
                            Ngày đăng
                        </th>
                        <th>
                            Chuyên gia
                        </th>
                        <th>
                            Thao tác
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $stt = 1;
                    @endphp
                    @foreach ($data as $item)
                    <tr>
                        <td>
                            {{ $stt++ }}
                        </td>
                        <td>
                            
                                {{ $item->bk_tieude }}
                            
                        </td>
                        <td>
                            
                                {{ $item->bk_noidung }}
                            
                        </td>
                        <td>
                            
                                {{ $item->bk_ngaydang }}
                            
                        </td>
                        <td>
                            
                                {{ $item->cg_hoten }}

                            
                        </td>
                        <td>
                        
                        <a href="{{ route('hien-thi-sua', ['id'=>$item->bk_id]) }}" class="btn btn-warning" >Sửa</a>
                        <a href="{{ route('xoa-bach-khoa', ['id'=>$item->bk_id]) }}" class="btn btn-danger">Xóa</a>
                            
                        </td>
                        
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
  
      </section>
@endsection