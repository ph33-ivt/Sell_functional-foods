@extends('layouts.app')

@section('content')
<div class="container">
	<div>
    	<ul class="bread-crumd">
    		<li><a href="{{route('front.home')}}">Trang chủ</a></li>
    		<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
    		<li>Cart</a></li>
    	</ul>
     </div>
    <div class="row">
    	<div class="col-md-8">
            <table class="table cart-items">
                <tr>
                    <th></th>
                    <th style="width: 60%">Tên</th>
                    <th class="text-center" style="width: 150px">Số lượng</th>
                    <th class="text-right" >Tổng</th>
                </tr>
                @foreach($cart->getItems() as $cartItem)
                    <tr>
                        <td>
                            <a href="{{route('front.remove.cart',
                                ['product_id' => $cartItem->product_id])}}" class="text-muted">
                                <i class="fa fa-trash-o" style="font-size:20px"></i>
                            </a>
                        </td>
                        <td>
                            {{$cartItem->product->name}} <br><b class="text-danger">{{number_format($cartItem->price)}}đ</b>
                        </td>
                        <td>
                            <a href="{{route('front.update.cart',
                                ['product_id' => $cartItem->product_id,
                                'quantity'=> $cartItem->quantity-1 ])}}" class="text-muted"><i class="fa fa-minus" aria-hidden="true"></i></a>
                            <form class="form-cart-qty" method="GET" action="{{route('front.update.cart')}}">
                                <input type="hidden" name="product_id" value="{{$cartItem->product_id}}">
                                <input type="" name="quantity" value="{{$cartItem->quantity}}" class="cart-qty-input">
                            </form>
                            <a href="{{route('front.update.cart',
                                ['product_id' => $cartItem->product_id,
                                'quantity'=> $cartItem->quantity+1 ])}}" class="text-muted"><i class="fa fa-plus"></i></a>
                        </td>
                       <td class="text-right" >{{number_format($cartItem->total)}}</td>

                    </tr>
                @endforeach
            </table>
    		
    	</div>
        <div class="col-md-4">
            <table class="w-100 cart-info">
                <tr>
                    <td colspan="2"><h4>Tổng quan</h4></td>
                </tr>
                <tr>
                    <td>Tổng giá sản phẩm</td> 
                    <td class="text-right"><b>{{number_format($cart->getCartTotal())}} đ</b></td>
                </tr>
                <tr>
                    <td>Tổng phí vận chuyển</td>
                    <td class="text-right"><b>0 đ</b></td>
                </tr>
                <tr>
                    <td>Tổng tiền</td>
                    <td class="text-right text-danger"><b>{{number_format($cart->getCartTotal())}} đ</b></td>
                </tr>
                <tr>
                    <td colspan="2"><a href="{{route('front.process.order')}}" class="btn order-process">Tiến hành đặt hàng</a></td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
