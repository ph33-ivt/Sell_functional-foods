<?php

namespace App\Service;
use Session;
use App\Service\CartItem;

class ShoppingCart
{
    public $items = [];
    public function __construct()
    {
        if(empty(Session::get('shopping.cart'))){
            Session::put('shopping.cart',[]);
        }
        $this->items = Session::get('shopping.cart');
    }
    public function addItem($cartItem){
        $this->mergeCart($cartItem);
        $this->items = Session::get('shopping.cart');
    }

    public function removeItem($product_id){
        $sessionItems = Session::get('shopping.cart');
        $cartItems = [];
        foreach ($sessionItems as $key => $sessionItem) {
            if($sessionItem->product_id!=$product_id){
                $cartItems[] = $sessionItem;
            }
        }
        Session::put('shopping.cart', $cartItems);
    }

    public function updateItem($product_id, $quantity){
        $sessionItems = Session::get('shopping.cart');
        $cartItems = [];
        foreach ($sessionItems as $key => $sessionItem) {
            if($sessionItem->product_id!=$product_id){
                $cartItems[] = $sessionItem;
            } else {
                $cartItemUpdate = new CartItem($product_id, $quantity, $sessionItem->price);
                $cartItems[] = $cartItemUpdate;
            }
        }
        Session::put('shopping.cart', $cartItems);
    }

    public function mergeCart($cartItem){
        $sessionItems = Session::get('shopping.cart');
        $merge = false;
        $cartItems = [];
        foreach ($sessionItems as $key => $sessionItem) {
            if($sessionItem->product_id==$cartItem->product_id){
                $merge = true;
                $quantity = $sessionItem->quantity + $cartItem->quantity;
                $item = new CartItem($sessionItem->product_id, $quantity, $sessionItem->price);
                $cartItems[] = $item;
            } else {
                $cartItems[] = $sessionItem;
            }
        }
        if($merge){
            Session::put('shopping.cart', $cartItems);
        } else {
            Session::push('shopping.cart',$cartItem);
        }
    }

    public static function emptyCart(){
        Session::put('shopping.cart',[]);
        return [];
    }

    public function getItems(){
        return $this->items;
    }

    public function getCartTotal(){
        $sessionItems = Session::get('shopping.cart');
        $cartTotal = 0;
        foreach ($sessionItems as $key => $sessionItem) {
            $cartTotal += $sessionItem->price * $sessionItem->quantity;
        }
        return $cartTotal;
    }
}
