<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderItem;

class Order extends Model
{
   protected $fillable = [
        'username','phone','email','address', 'total', 'status'
    ];

    function getOrderItems(){
    	return OrderItem::where('order_id', $this->id)->get();
    }
}
