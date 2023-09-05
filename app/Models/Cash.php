<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    protected $fillable = [];
    public function order()
    {
        return $this->hasMany(Order::class, 'cash_id');
    }
}



