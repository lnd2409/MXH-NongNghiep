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
            <button class="btn btn-success" onclick="window.location.href='{{route('sell.create')}}'">Đăng bán</button>
        </div>
        <!--company-title end-->
        <div class="companies-list">
            <div class="row">
                @forelse ($nccvt as $item)

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="company_profile_info">
                        <div class="company-up-info">
                            <h3 class="title">{{$item->nccvt_diachi}}</h3>
                            <table style="text-align: left;width:100%" class="m-3">
                                <!-- <tr>
                                <td colspan="2"><h2>{{substr($item->nccvt_diachi,0,255)}}...</h2></td>
                              </tr> -->
                                <tr>
                                    <td>Số điện thoại</td>
                                    <td> {{$item->nccvt_sdt}}</td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td> {{substr($item->nccvt_diachi,0,45)}}...</td>
                                </tr>

                            </table>
                            <br>
                            <ul>
                                <li><a href="{{route('sell',$item->nccvt_id)}}" title="" class="follow">Xem gian
                                        hàng</a></li>
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

        <!--process-comm end-->
    </div>
</section>
<!--companies-info end-->
@endsection