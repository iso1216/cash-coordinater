<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Goods;
use App\Models\Cash;
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
		$orders = Order::join('goods', 'order.goods_id', '=', 'goods.id')->join('cash', 'order.cash_id', '=', 'cash.id')->where('cash_id', $id)->orderBy('cash_id', 'desc')->get();
		return view('order.detail', compact('orders'));
	}

	public function create()
	{
		$goods = Goods::orderBy('id')->get();
		return view('order.create', compact('goods'));
	}

	public function store(Request $request)
	{
		$num = Goods::select('id')->get();
		$flg=0;
		foreach ($num as $value) {
			if ($request[$value['id']] != 0) {
				$flg=1;
				break;
			}
		} 
		if ($flg!=0){
			$cash = new Cash();
			$cash->save();
			$id = $cash->id;

			foreach ($num as $value) {
				if ($request[$value['id']] == 0) continue;
				$order = new Order();
				$order->num_of = $request[$value['id']];
				$order->goods_id = $value['id'];
				$order->cash_id = $id;
				$order->save();
			}
		}
		return redirect()->route('order.index');
	}
	public function confirm()
	{
		$orders = Order::select(DB::raw('cash_id, sum(num_of * cost) as cash_total, cash.created_at'))->join('goods', 'order.goods_id', '=', 'goods.id')->join('cash', 'order.cash_id', '=', 'cash.id')->groupBy('cash_id')->orderBy('cash_id', 'desc')->get();
		$sum_cash_days = (object) [
			'0'   => 0,
		];
		$len=0;
		$day = 0;
		foreach ($orders as $order) {
			$days = $order->created_at->format('Y/m/d');
			if ($day == $days){
				$sum_cash_days->$day += $order->cash_total;
			} else {
				$day = $days;
				$sum_cash_days->$day = $order->cash_total;
				$len++;
			}
		}
		return view('order.confirm', compact('orders', 'sum_cash_days', 'len'));
	}


}

