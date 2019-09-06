@extends('layouts.admin')

@section('content')
<div class="container">
    <div>
        <span class="admin-big-title">Category</span>
        <span class="admin-small-title">Category list</span>
        <table class="table table-bordered">
            <tr>
                <th class="text-center">Id</th>
                <th class="text-center">Name</th>
                <th class="text-center">Edit</th>
                <th class="text-center">Delete</th>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <td class="text-center">{{$category->id}}</td>
                    <td class="text-center">{{$category->name}}</td>
                    <td class="text-center">
                        <a href="{{route('admin.category.edit',['id'=>$category->id])}}">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a></td>
                    <td class="text-center">
                        <form action="{{route('admin.category.destroy',['id'=>$category->id])}}" method="post">
                            <input type="hidden" name="_method" value="delete" />
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button><i class="fa fa-times"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
</div>
@endsection
