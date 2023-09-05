<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $fillable = ['name', 'cost'];
    public function order()
    {
        return $this->hasMany(Order::class, 'goods_id');
    }
}



