<?php

namespace App\Http\Controllers;

use App\Models\Spends;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpendsController extends Controller
{
    public function index()
    {
        $spends = Spends::orderBy('id')->get();
        $sum_cost_total = Spends::sum('cost');
        return view('spends.index', compact('spends', 'sum_cost_total'));
    }

    public function create()
    {
        return view('spends.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'cost' => 'required|integer',
        ]);

        $spends = new Spends();
        $spends->user_name = $validatedData['user_name'];
        $spends->name = $validatedData['name'];
        $spends->cost = $validatedData['cost'];
        $spends->save();

        return redirect()->route('spends.index')->with('success', '商品が作成されました');
    }
}

