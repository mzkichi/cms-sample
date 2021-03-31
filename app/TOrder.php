<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TOrder extends Model
{
    protected $fillable = [
        'goods_id',
        'amount',
    ];
}
