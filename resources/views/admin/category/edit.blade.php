@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="px-5">
        <span class="admin-big-title">Category</span>
        <span class="admin-small-title">Category edit</span>
        <form action='{{route("admin.category.update",["id" => $category->id])}}' method='POST'  enctype="multipart/form-data">
            <input type="hidden" name="_method" value="put" />
            <div class="row p-5 card mt-3">
                <div class="col-md-2">Name</div>
                <div class="col-md-9">
                    <input type="" name="name" class="form-control" value="{{$category->name}}">
                </div>
                <div class="col-md-2">Icon</div>
                <div class="col-md-9">
                    <input type="file" name="icon" class="form-control" value="{{$category->name}}">
                </div>
                <div class="col-md-2">Banner</div>
                <div class="col-md-9">
                    <input type="file" name="banner" class="form-control" value="{{$category->name}}">
                </div>
                <div class="col-md-2">Description</div>
                <div class="col-md-9">
                    <textarea name="description" id="description" class="form-control" value="{{$category->description}}">{{$category->description}}</textarea>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-9 mt-3">
                    <button class="btn btn-primary">Update</button>
                </div>
            </div>
            @csrf
        </form>

    </div>
</div>
<script type="text/javascript">
    $( document ).ready(function() {
        CKEDITOR.replace('description');
    });
</script>
@endsection
