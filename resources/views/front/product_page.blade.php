@extends('layouts.app')

@section('content')
<div class="container">
	<div>
	<ul class="bread-crumd">
		<li><a href="{{route('front.home')}}">Trang chủ</a></li>
		<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
		<li><a href="{{route('front.home')}}">{{$category->name}}</a></li>
		<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
		<li>{{$product->name}}</a></li>
	</ul>
   <!--  <img src="{{ asset('uploads/category/banner/'.$category->banner) }}"
     class="banner-category"> -->
     </div>
    <div class="row">
    	<div class="col-md-6">
    		<img src="{{ asset('uploads/product/first/'.$product->image) }}" class="w-100">
    	</div>
    	<div class="col-md-6 p-5 mt-2">
    		<h2 class="product-name-detail">{$product->name}</h2>
    		<p class="" style="font-size: 20px">{$product->description}</p>
    		<p class="price"><sup>đ </sup>{{number_format($product->price)}}</p>
            <form action="{{route('front.add.cart')}}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="price" value="{{$product->price}}">
                <button class="btn-bag btn-add-bag">Thêm vào giỏ hàng</button>
            </form>
            <form action="{{route('front.buyFast.cart')}}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="price" value="{{$product->price}}">
                <button class="btn-bag btn-add-bag">Mua ngay</button>
            </form>
    	</div>
    </div>
</div>
@endsection
