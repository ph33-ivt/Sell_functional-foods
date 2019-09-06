<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class OrderItem extends Model
{
   protected $fillable = [
        'order_id','product_id','quantity','price','total'
    ];

    public function getProduct(){
    	return Product::find($this->product_id);
    }
}
