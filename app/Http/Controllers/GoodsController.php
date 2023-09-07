<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoodsController extends Controller
{
    public function index()
    {
        $goods = Goods::orderBy('id')->get();
        return view('goods.index', compact('goods'));
    }

    public function create()
    {
        return view('goods.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'cost' => 'required|integer',
        ]);

        $goods = new Goods();
        $goods->name = $validatedData['name'];
        $goods->cost = $validatedData['cost'];
        $goods->save();

        return redirect()->route('goods.index')->with('success', '商品が作成されました');
    }

    public function edit($id)
    {
        $goods = Goods::findOrFail($id);
        return view('goods.edit', compact('goods'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'cost' => 'required|integer',
        ]);

        $goods = Goods::findOrFail($id);
        $goods->name = $validatedData['name'];
        $goods->cost = $validatedData['cost'];
        $goods->save();

        return redirect()->route('goods.index')->with('success', '商品が更新されました');
    }
}

