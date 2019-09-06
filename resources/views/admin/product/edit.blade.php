@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="px-5">
        <span class="admin-big-title">Product</span>
        <span class="admin-small-title">Product edit</span>
        <form action='{{route("admin.product.update",["id" => $product->id])}}' method='POST'  enctype="multipart/form-data">
            <input type="hidden" name="_method" value="put" />
            <div class="row p-5 card mt-3">
                <div class="col-md-2">Name</div>
                <div class="col-md-9">
                    <input type="" name="name" value="{{$product->name}}" class="form-control">
                </div>
                <div class="col-md-2">Price</div>
                <div class="col-md-9">
                    <input type="" name="price" value="{{$product->price}}" class="form-control">
                </div>
                <div class="col-md-2">Description</div>
                <div class="col-md-9">
                    <input type="" name="description" value="{{$product->description}}" class="form-control">
                </div>
                <div class="col-md-2">Info</div>
                <div class="col-md-9">
                    <input type="" name="info" value="{{$product->info}}" class="form-control">
                </div>
                <div class="col-md-2">Code</div>
                <div class="col-md-9">
                    <input type="" name="code" value="{{$product->code}}" class="form-control">
                </div>
                <div class="col-md-2">Category ID</div>
                <div class="col-md-9">
                    <input type="" name="category_id" value="{{$product->category_id}}" class="form-control">
                </div>
                <div class="col-md-2">Image</div>
                <div class="col-md-9">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-md-9 mt-3">
                    <button class="btn btn-primary">Update</button>
                </div>
            </div>
            @csrf
        </form>

    </div>
</div>
@endsection
