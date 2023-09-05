<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('updated_at', 'desc')->get();
        return view('order.index', compact('orders'));
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

