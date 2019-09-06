@extends('layouts.app')

@section('content')
<div class="container">
	<div>
    	<ul class="bread-crumd">
    		<li><a href="{{route('front.home')}}">Trang chủ</a></li>
    		<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
    		<li>Tiến hành đặt hàng</a></li>
    	</ul>
     </div>
    <div class="row p-5">
        <div class="col-md-8">
            <form action="{{route('front.checkout.order')}}" method="POST" class=w-100>
                @csrf
                <table class="table tabel-process-order ">
                    <tr>
                        <td colspan="2">
                            <h4>Thông tin đặt hàng</h4>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 200px">Họ và tên:</td>
                        <td><input type="text" name="username" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Điện thoại:</td>
                        <td><input type="text" name="phone" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="email" name="email" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ:</td>
                        <td><input type="text" name="address" class="form-control"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button class="btn order-process">Đặt hàng</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
@endsection
