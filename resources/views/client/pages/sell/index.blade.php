@extends('client.client')
@section('css')
<style>
    h3.title {
        height: 45px;
        overflow: hidden;
    }

    .follow {
        background-color: coral;
    }

    .company-up-info img {
        float: none;
        margin-bottom: 10px;
        max-width: 100%;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        -ms-border-radius: 0;
        -o-border-radius: 0;
        border-radius: 0;
        height: 250px;
        object-fit: cover;
    }
</style>
@endsection
@section('content')

<section class="companies-info">
    <div class="container">
        <div class="company-title">
            @if (Auth::guard('nccvt')->check())
                <button class="btn btn-success" onclick="window.location.href='{{route('sell.create')}}'">Đăng bán</button>
            @else

            @endif
        </div>
        <!--company-title end-->
        <div class="companies-list">
            <div class="row">
                @forelse ($product as $item)

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="company_profile_info">
                        <div class="company-up-info">
                            <a href="{{route('sell.show',$item->sp_id)}}">
                            <a href="{{route('sell.single',$item->sp_id)}}">

                                <img src="{{asset($item->sp_hinhdaidien)}}" alt="">
                                <h3 class="title">{{substr($item->sp_ten,0,45)}}...</h3>
                            </a>
                            <table style="text-align: left;width:100%" class="m-3">
                                <tr>
                                    <td>Giá tiền</td>
                                    <td> {{number_format($item->sp_gia)}} đ</td>
                                </tr>
                                <tr>
                                    <td>Khả năng cung cấp</td>
                                    <td> {{number_format($item->sp_soluongcungcap)}}</td>
                                </tr>
                            </table>
                            <br>
                            <ul>
                                {{-- <li><a href="{{route('sell.show',$item->sp_id)}}" title="" class="follow">Xem sản phẩm --}}
                                <li><a href="{{route('sell.single',$item->sp_id)}}" title="" class="follow">Xem sản phẩm</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--company_profile_info end-->
                </div>
                @empty
                <h2>Chưa có sản phẩm</h2>
                @endforelse
            </div>
        </div>
        <!--companies-list end-->
        <div class="process-comm">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
        <!--process-comm end-->
    </div>
</section>
<!--companies-info end-->
@endsection
