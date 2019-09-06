<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
class Category extends Model
{
    protected $fillable = [
        'name','icon','banner','description'
    ];
    public function products($limit=null){
    	$products = Product::where('category_id',$this->id);
    	if($limit){
    		$products = $products->limit($limit);
    	}
    	$products = $products->get();
    	return $products;
	}
}
