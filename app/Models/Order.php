<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['num_of', 'goods_id', 'order_id'];
    public function goods()
    {
        return $this->belongsTo(Goods::class, 'goods_id');
    }
    public function cash()
    {
        return $this->belongsTo(Cash::class, 'cash_id');
    }
}



