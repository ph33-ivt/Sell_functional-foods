@extends('layouts.admin')

@section('content')
<div class="pb-5">
    <div>
        <span class="admin-big-title">Order</span>
        <span class="admin-small-title">Order detail</span>

        <h4 class="py-4">Thông tin đặt hàng</h4>
        <table class="table table-bordered">
            <tr>
                <th class="text-center">Mã đơn hàng</th>
                <td>
                    <b>{{$order->id}}</b>
                </td>
                
            </tr>
            <tr>
                <th  class="text-center">Tên khách hàng</th>
                <td>
                    <b style="text-transform: uppercase;">{{$order->username}}</b>
                    <br>Phone:{{$order->phone}}
                    <br>Email:{{$order->email}}
                    <br>Address:{{$order->address}}
                </td>
                
            </tr>
            <tr>
                <th class="text-center">Tổng tiền đơn hàng</th>
                <td><b class="text-danger">{{number_format($order->total)}} đ</b></td>
            </tr>
            <tr>
                <th class="text-center">Trạng thái đơn hàng</th>
                <td >{{$order->status}}</td>
            </tr>
        </table>
        <h4 class="py-4">Sản phẩm đơn hàng</h4>
        <table class="table table-bordered">
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th class="text-right">Số lượng</th>
                <th class="text-right">Tổng</th>
            </tr>
            @foreach($order->getOrderItems() as $key => $orderItem )
                <tr>
                    <td>
                        {{$orderItem->product_id}}
                    </td>
                    <td>
                        <img src="{{ asset('uploads/product/first/'.$orderItem->getProduct()->image) }}"
                                style="width: 70px;float: left;">
                        {{$orderItem->getProduct()->name}}<br>
                        <b class="text-danger">{{number_format($orderItem->price)}}đ</b>
                    </td>
                    <td class="text-right">
                        {{$orderItem->quantity}}
                    </td>
                    <td class="text-right">
                        <b>{{number_format($orderItem->total)}} đ</b>
                    </td>
                </tr>
            @endforeach
        </table>

        <h4 class="py-4">Cập nhật trạng thái đơn hàng</h4>
        <form method="POST" action="{{route('admin.order.update')}}">
            <input type="hidden" name="order_id" value="{{$order->id}}">
            @csrf
            <table class="table table-bordered">
                <tr>
                    <th class="text-center">Trạng thái đơn hàng hiện tại</th>
                    <td>
                        <b>{{$order->status}}</b>
                    </td>
                    
                </tr>
                <tr>
                    <th  class="text-center">Chọn trạng thái muốn cập nhật</th>
                    <td>
                        <select class="form-control" name='order_status' style="width: 300px">
                            @foreach($orderStatusValid as $key => $statusValid )
                                <option>{{$statusValid}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th class="text-center"></th>
                    <td><button class="btn btn-primary">Cập nhật</button></td>
                </tr>
            </table>
        </form>
    </div>
</div>
@endsection
