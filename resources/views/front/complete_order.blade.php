@extends('layouts.app')

@section('content')
<div class="container">
	<div>
    	<ul class="bread-crumd">
    		<li><a href="{{route('front.home')}}">Trang chủ</a></li>
    		<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
    		<li>Đặt hàng thành công</a></li>
    	</ul>
     </div>
    <div class="row p-5">
    	<div class="text-center complete-div" style="">
    		<h4 class="py-4">Cảm ơn bạn đã mua hàng trên Ging King</h4>
    		<a href="{{route('front.home')}}" class="btn order-process">Tiếp tục mua hàng</a>
    	</div>
    </div>
</div>
@endsection
