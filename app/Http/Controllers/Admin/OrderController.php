<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    public function index(Request $request){
    	$orders = Order::all();
    	return view('admin.order.index', compact('orders'));
    }

    public function detail(Request $request, $id){
    	$order = Order::find($id);
    	$orderStatusValid = [];

    	if($order->status=='MỚI'){
    		$orderStatusValid = ['ĐANG VẬN CHUYỂN', 'HỦY'];
    	} elseif($order->status=='ĐANG VẬN CHUYỂN'){
    		$orderStatusValid = ['ĐÃ CHUYỂN HÀNG VÀ NHẬN TIỀN', 'TRẢ LẠI HÀNG'];
    	} elseif($order->status=='ĐÃ CHUYỂN HÀNG VÀ NHẬN TIỀN'){
    		$orderStatusValid = ['TRẢ LẠI HÀNG'];
    	}
    	return view('admin.order.detail', compact('order', 'orderStatusValid'));
    }

    public function update(Request $request){
    	$order = Order::find($request->order_id);
    	$order->update([
    		'status' => $request->order_status
    	]);
    	return redirect()->route('admin.order')->withSuccess('Cập nhật trạng thái đơn hàng thành công');
    }
}
