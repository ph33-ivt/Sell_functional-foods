<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\ShoppingCart;
use App\Service\CartItem;
use App\Order;
use App\OrderItem;

class OrderController extends Controller
{
    public function processOrder(Request $request){
    	return view('front.process_order');
    }
    public function checkoutOrder(Request $request){
    	$cart = new ShoppingCart();
    	$order = Order::create([
    		'username' => $request->username,
    		'email' => $request->email,
    		'phone' => $request->phone,
    		'address' => $request->address,
    		'total' => $cart->getCartTotal(),
            'status' => 'MỚI'
    	]);

    	foreach ($cart->items as $key => $cartItem) {
    		OrderItem::create([
                'order_id' => $order->id,
    			'product_id' => $cartItem->product_id,
    			'quantity' => $cartItem->quantity,
    			'price' => $cartItem->price,
    			'total' => $cartItem->total
    		]);
    	}
        $cart->emptyCart();
    	return redirect()->route('front.complete.order');
    }

    public function completeOrder(Request $request){
    	return view('front.complete_order');
    }


}
