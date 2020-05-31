@extends('client.client')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
            </div>
        </div>
        <div class="col-md-8">
            <div class="single-list-slider owl-carousel" id="sl-slider">
                <div class="sl-item set-bg" data-setbg="{{asset($product->sp_hinhdaidien)}}"></div>
                <br>
                @foreach ($img as $item)
                <div class="sl-item set-bg" data-setbg="{{asset($item->ha_duongdan)}}"></div>
                @endforeach
            </div>

            <div class="owl-carousel sl-thumb-slider" id="sl-slider-thumb">
                <div class="sl-thumb set-bg" data-setbg="{{asset($product->sp_hinhdaidien)}}"></div>
                @foreach ($img as $item)
                <div class="sl-thumb set-bg" data-setbg="{{asset($item->ha_duongdan)}}"></div>
                @endforeach
            </div>
            <h3>{{$product->sp_ten}}</h3>
            <table class="table table-light">
                <thead>
                    <tr>
                        {{-- <th>Phân loại</th> --}}
                        <th>Giá</th>
                        <th>Số lượng</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        {{-- <td>{{$product->dv_ten}}</td> --}}
                        <td>{{$product->sp_gia}} đ</td>
                        <td>
                            100
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="extend">

                <h3>MÔ TẢ SẢN PHẨM</h3>
                <div class="wrapper left" style="box-shadow: 1px 1px 5px #00000017;color: black;">
                    {!!$product->sp_chitiet!!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection