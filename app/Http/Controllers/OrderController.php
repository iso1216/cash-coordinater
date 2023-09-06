<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
	public function index()
	{
		//SELECT sum(num_of*cost), cash.created_at FROM `order` INNER JOIN goods ON order.goods_id = goods.id INNER JOIN cash ON order.cash_id = cash.id GROUP BY cash_id
		$orders = Order::select(DB::raw('cash_id, sum(num_of * cost) as cash_total, cash.created_at'))->join('goods', 'order.goods_id', '=', 'goods.id')->join('cash', 'order.cash_id', '=', 'cash.id')->groupBy('cash_id')->orderBy('cash_id', 'desc')->get();
		$sum_cash_total = 0;
		foreach ($orders as $order) {
			$sum_cash_total += $order->cash_total;
		}
		return view('order.index', compact('orders', 'sum_cash_total'));
	}

	public function detail($id)
	{
		//SELECT sum(num_of*cost), cash.created_at FROM `order` INNER JOIN goods ON order.goods_id = goods.id INNER JOIN cash ON order.cash_id = cash.id GROUP BY cash_id
		$orders = Order::join('goods', 'order.goods_id', '=', 'goods.id')->join('cash', 'order.cash_id', '=', 'cash.id')->where('cash_id', $id)->orderBy('cash_id', 'desc')->get();
		return view('order.detail', compact('orders'));
	}

	public function create()
	{
		return view('order.create');
	}

	public function store(Request $request)
	{
		$validatedData = $request->validate([
			'num_of' => 'required|integer',
		]);

		$order = new Order();
		$order->num_of = $validatedData['num_of'];
		$order->goods_id = Auth::id();
		$order->order_id = Auth::id();
		$order->save();

		return redirect()->route('order.index')->with('success', '投稿が作成されました');
	}
}

