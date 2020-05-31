@extends('client.client')
@section('css')
<style>
    .price-br>i {
        font-size: 12px;
    }

    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    img {

        max-width: 200px;
        max-height: 200px;
    }
</style>

@endsection
@section('content')
<h3>Đăng sản phẩm</h3>
<div class="post-project-fields">
    <form action="{{route('sell.submit')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <input type="text" name="title" placeholder="Tên sản phẩm">
            </div>
            <div class="col-lg-12">

                <img id="image" alt="Chọn hình đại diện" /><br>
                <input type="file" name="avatar" id="avatar"
                    onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                    required>
            </div>
            <div class="col-lg-12">

                <input type="file" id="upload-image" accept="image/*" multiple name='img[]'>
            </div>
            <div class="col-lg-12">
                <div class="inp-field">
                    <select name="type" id="">
                        @foreach ($type as $item)

                        <option value="{{$item->lsp_id}}">{{$item->lsp_ten}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="price-sec">
                    <div class="price-br">
                        <input type="number" min="0" name="price" placeholder="Giá">

                        <i class="la">VNĐ</i>
                    </div>
                    <span></span>
                    <div class="price-br">
                        <input type="number" name="amount" placeholder="Số lượng cung cấp">
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <textarea name="description" placeholder="Chi tiết"></textarea>
            </div>
            <div class="col-lg-12">
                <ul>
                    <li><button class="active" type="submit">Tạo</button></li>
                    <li><a href="#" title="">Cancel</a></li>
                </ul>
            </div>
        </div>
    </form>
</div>
<!--post-project-fields end-->

@endsection