@extends('layouts.app')

@section('content')
<div class="container">
	<div>
	<ul class="bread-crumd">
		<li><a href="{{route('front.home')}}">Trang chủ</a></li>
		<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
		<li>{{$category->name}}</li>
	</ul>
    <img src="{{ asset('uploads/category/banner/'.$category->banner) }}"
     class="banner-category">
     </div>
    <div class="row">
    	<div class="col-md-3">
    		<h3 class="">Danh mục sản phẩm</h3>
    		<ul class="categories">
    			@foreach(
                app('App\Http\Controllers\HomeController')->getCategory() as $categoryLeft)
	                <li class="danh_muc">
	                	<a href="{{route('front.category.page',['id'=>$categoryLeft->id])}}">
	                		{{$categoryLeft->name}}
	                	</a>
	                </li>
                @endforeach
            </ul>
    	</div>
    	<div class="col-md-9">
    		<h3>{!!$category->name!!}</h3>
    		<p class="text-muted">{!!$category->description!!}</p>
    		<div class="row">
    			@foreach($category->products() as $product)
		    		<div class="col-md-4 mt-4">
		    			<a href="{{route('front.product.page',['id'=>$product->id])}}" class="product-card">
			    			<div class="card p-3">
			    				<img src="{{ asset('uploads/product/first/'.$product->image) }}"
     							class="banner-category">
	    						{{$product->name}}
	    						<div class="price text-center">{{number_format($product->price)}}đ</div>
		    					 <form action="{{route('front.buyFast.cart')}}" method="POST">
					                @csrf
					                <input type="hidden" name="product_id" value="{{$product->id}}">
					                <input type="hidden" name="quantity" value="1">
					                <input type="hidden" name="price" value="{{$product->price}}">
					                <button class="btn-bag btn-add-bag">Mua ngay</button>
					            </form>
			    			</div>
		    			</a>
		    		</div>
		    	@endforeach
    		</div>
    		
    	</div>
    </div>
</div>
@endsection
