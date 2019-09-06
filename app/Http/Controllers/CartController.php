<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\ShoppingCart;
use App\Service\CartItem;

class CartController extends Controller
{
    public function showcart(Request $request){
        $cart = new ShoppingCart();
        return view('front.cart_page', compact('cart'));
    }

    public function addItem(Request $request){
    	$cart = new ShoppingCart();
    	$cartItem = new CartItem($request->product_id,$request->quantity,$request->price);
    	$cart->addItem($cartItem);
        return redirect()->route('front.show.cart');
    }

    public function emptyCart(Request $request){
    	$cart = new ShoppingCart();
    	$cart->emptyCart();
        return view('front.cart_page', compact('cart'));
    }

    public function updateItem(Request $request){
        $cart = new ShoppingCart();
        if($request->quantity < 1) $request->quantity = 1;
        $cart->updateItem($request->product_id, $request->quantity);
        return redirect()->route('front.show.cart');
    }

    public function removeItem(Request $request){
        $cart = new ShoppingCart();
        $cart->removeItem($request->product_id);
        return redirect()->route('front.show.cart');
    }
    public function buyFast(Request $request){
        $cart = new ShoppingCart();
        $cartItem = new CartItem($request->product_id,$request->quantity,$request->price);
        $cart->addItem($cartItem);
        return redirect()->route('front.process.order');
    }
}
