@extends('layouts.admin')

@section('content')
<div class="">
    <div>
        <span class="admin-big-title">Product</span>
        <span class="admin-small-title">Product list</span>
        <table class="table table-bordered">
            <tr>
                <th class="text-center">Id</th>
                <th class="text-center">Image</th>
                <th class="text-center">Name</th>
                <th class="text-center">Price</th>
                <!-- <th class="text-center">Description</th> -->
                <th class="text-center">Info</th>
                <th class="text-center">Code</th>
                <th class="text-center">Category Id</th>
                <th></th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td class="text-center">{{$product->id}}</td>
                    <td><img src="{{ asset('uploads/product/first/'.$product->image) }}" class="" style="height: 80px"></td>
                    <td class="text-center">
                        <a href="{{route('admin.product.edit',['id'=>$product->id])}}">
                            {{$product->name}}
                        </a></td>
                    <td class="text-center">{{number_format($product->price)}}</td>
                    <!-- <td class="text-center">{{$product->description}}</td> -->
                    <td class="text-center">{{$product->info}}</td>
                    <td class="text-center">{{$product->code}}</td>
                    <td class="text-center">{{$product->category_id}}</td>
                    <td class="text-center">
                        <form action="{{route('admin.product.destroy',['id'=>$product->id])}}" method="post">
                            <input type="hidden" name="_method" value="delete" />
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button><i class="fa fa-times"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $products->links() }}
    </div>
</div>
@endsection
