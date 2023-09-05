<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [];
    public function order()
    {
        return $this->hasMany(Order::class, 'cash_id');
    }
}



