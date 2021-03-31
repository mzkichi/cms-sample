<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TGood extends Model
{
    protected $fillable = [
        'name',
        'photo',
        'notice',
        'price',
        'stock',
        'user_id',
    ];
}
