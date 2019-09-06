<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $product = Product::create([
        //     'name' => $request->name,
        //     'price' => $request->price, 
        //     'description' => $request->description, 
        //     'info' => $request->info, 
        //     'code' => $request->code, 
        //     'category_id' => $request->category_id
        // ]);
        // return redirect()->route('admin.product');
         // $product= Product::create();
        $data = [
            'name' => $request->name,
            'price' => $request->price, 
            'description' => $request->description, 
            'info' => $request->info, 
            'code' => $request->code, 
            'category_id' => $request->category_id
        ];
        if ($request->hasFile('image')) {
            $file = $request->image;
            $fileEx = $file->getClientOriginalExtension();
            if (!in_array($fileEx, array('jpg', 'gif', 'png', 'jpeg'))){
                return redirect()->route('admin.product')->withErrors('Invalid image extension we just allow JPG, GIF, PNG');
            }
            $fileName = time().".".$fileEx;
            if($file->move(base_path().'/public/uploads/product/first', $fileName)){
                $data['image'] = $fileName;
            };
        }
        // $product->save($data);
        Product::create($data);
        return redirect()->route('admin.product');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
         return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product= Product::find($id);
        $data = [
            'name' => $request->get('name'),
            'price' => $request->get('price'), 
            'description' => $request->get('description'), 
            'info' => $request->get('info'), 
            'code' => $request->get('code'), 
            'category_id' => $request->get('category_id')
        ];
        if ($request->hasFile('image')) {
            $file = $request->image;
            $fileEx = $file->getClientOriginalExtension();
            if (!in_array($fileEx, array('jpg', 'gif', 'png', 'jpeg'))){
                return redirect()->route('admin.product')->withErrors('Invalid image extension we just allow JPG, GIF, PNG');
            }
            $fileName = time().".".$fileEx;
            if($file->move(base_path().'/public/uploads/product/first', $fileName)){
                $data['image'] = $fileName;
            };
        }
        $product->update($data);
        return redirect()->route('admin.product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('admin.product');
    }
}
