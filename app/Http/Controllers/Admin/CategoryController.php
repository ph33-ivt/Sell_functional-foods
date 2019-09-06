<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::create([
            'name' => $request->name
        ]);
        return redirect()->route('admin.category');
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
        $category = Category::find($id);
         return view('admin.category.edit', compact('category'));
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
        $category= Category::find($id);
        $data = [
            'name' => $request->get('name'),
            'description' =>  $request->get('description')
        ];

        if ($request->hasFile('icon')) {
            $file = $request->icon;
            $fileEx = $file->getClientOriginalExtension();
            if (!in_array($fileEx, array('jpg', 'gif', 'png'))){
                return redirect()->route('admin.category')->withErrors('Invalid image extension we just allow JPG, GIF, PNG');
            }
            $fileName = time().".".$fileEx;
            if($file->move(base_path().'/public/uploads/category/icon', $fileName)){
                $data['icon'] = $fileName;
            };
        }
        if ($request->hasFile('banner')) {
            $file = $request->banner;
            $fileEx = $file->getClientOriginalExtension();
            if (!in_array($fileEx, array('jpg', 'gif', 'png'))){
                return redirect()->route('admin.category')->withErrors('Invalid image extension we just allow JPG, GIF, PNG');
            }
            $fileName = time().".".$fileEx;
            if($file->move(base_path().'/public/uploads/category/banner', $fileName)){
                $data['banner'] = $fileName;
            };
        }
        $category->update($data);
        return redirect()->route('admin.category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('admin.category');
    }
}
