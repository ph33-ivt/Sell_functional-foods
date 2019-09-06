@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="px-5">
        <span class="admin-big-title">Product</span>
        <span class="admin-small-title">Product create</span>
        <form action='{{route("admin.product.store")}}' method='POST'>
            <div class="row p-5 card mt-3">
                <div class="col-md-2">Name</div>
                <div class="col-md-9">
                    <input type="" name="name" class="form-control">
                </div>
                <div class="col-md-2">Price</div>
                <div class="col-md-9">
                    <input type="" name="price" class="form-control">
                </div>
                <div class="col-md-2">Description</div>
                <div class="col-md-9">
                    <input type="" name="description" class="form-control">
                </div>
                <div class="col-md-2">Info</div>
                <div class="col-md-9">
                    <input type="" name="info" class="form-control">
                </div>
                <div class="col-md-2">Code</div>
                <div class="col-md-9">
                    <input type="" name="code" class="form-control">
                </div>
                <div class="col-md-2">Category ID</div>
                <div class="col-md-9">
                    <input type="" name="category_id" class="form-control">
                </div>
                 <div class="col-md-2">Image</div>
                <div class="col-md-9">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-9 mt-3">
                    <button class="btn btn-primary">Save</button>
                </div>
            </div>
            @csrf
        </form>

    </div>
</div>
@endsection
