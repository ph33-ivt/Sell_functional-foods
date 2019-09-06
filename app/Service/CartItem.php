<?php

namespace App\Service;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class CartItem
{
	public $product_id;
    public $quantity;
    public $price;
    public $product;
    public $total;

	public function __construct($product_id,$quantity,$price)
    {
    	$this->product_id = $product_id;
    	$this->quantity = $quantity;
    	$this->price = $price;
    	$this->product = Product::find($product_id);
        $this->total = $price*$quantity;
    }
}
