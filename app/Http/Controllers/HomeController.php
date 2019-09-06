<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');bắt buộc đăng nhập
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        return view('home', compact('categories'));
    }

    public function categoryPage($id){
        $category = Category::find($id);
        return view('front.category_page', compact('category'));
    }

    public function productPage($id){
        $product = Product::find($id);
        $category = $product->category();
        return view('front.product_page', compact('product','category'));
    }

    public function getCategory(){
        $categories = Category::all();
        return $categories;
    }

    public function productShow($id){
         $category = Category::find($id);
        return view('home', compact('category'));
    }

}
