@extends('layouts.app')

@section('content')
<div class="menu-header">
    <div class="container">
    	<h3>Danh mục sản phẩm</h3>
        <div class="row">
            @foreach(
                app('App\Http\Controllers\HomeController')->getCategory() as $category)
                <div class="col-md-4 p-2 category-menu">
                    <div class="card p-2 text-center">
                        <a href="{{route('front.category.page',['id'=>$category->id])}}">
                            <img src="{{ asset('uploads/category/icon/'.$category->icon) }}" class="icon-category">
                        </a>
                        <a href="{{route('front.category.page',['id'=>$category->id])}}">{{$category->name}}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="body">

    <div class="container">
        <h4>Sản phẩm đặc trưng</h4>
        @foreach($categories as $category)
        <h5 style="color:yellow; margin-top: 30px"><a href="{{route('front.category.page',['id'=>$category->id])}}">{{$category->name}}</a></h5>
            <div class="row">
                @foreach($category->products(4) as $product)
                    <div class="col-md-3 mt-3">
                        <a href="{{route('front.product.page',['id'=>$product->id])}}" class="product-card">
                            <div class="card p-3">
                                <img src="{{ asset('uploads/product/first/'.$product->image) }}"
                                class="banner-category">
                                {{$product->name}}
                                <div class="price text-center">{{number_format($product->price)}}đ</div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endforeach 
    </div>
</div>
@endsection
