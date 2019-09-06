@extends('layouts.admin')

@section('content')
<div class="">
    <div>
        <span class="admin-big-title">Order</span>
        <span class="admin-small-title">Order list</span>
        @if(session()->has('success'))
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session()->get('success') }}
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th class="text-center">Mã đơn hàng</th>
                <th>Tên khách hàng</th>
                <th class="text-center">Tổng tiền đơn hàng</th>
                <th class="text-center">Trạng thái đơn hàng</th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td class="text-center">
                        <a href="{{route('admin.order.detail',['id'=>$order->id])}}">
                            {{$order->id}}
                        </a>
                    </td>
                    <td>
                        <b style="text-transform: uppercase;">{{$order->username}}</b>
                        <br>Phone:{{$order->phone}}
                        <br>Email:{{$order->email}}
                        <br>Address:{{$order->address}}
                    </td>
                    <td class="text-center"><b class="text-danger">{{number_format($order->total)}} đ</b></td>
                    <td class="text-center">{{$order->status}}</td>
                </tr>
            @endforeach
        </table>

    </div>
</div>
@endsection
