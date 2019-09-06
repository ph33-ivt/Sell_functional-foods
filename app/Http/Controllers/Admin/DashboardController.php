<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function product()
    {
        return view('admin.product');
    }

    public function category()
    {
        return view('admin.category');
    }
}
