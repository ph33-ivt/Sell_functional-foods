<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'description', 'info', 
        'code', 'category_id', 'image'
    ];
    public function categories(){
    	return $this->belongTo('App\Category');
	}

	public function category(){
    	return Category::find($this->id);
	}
}
