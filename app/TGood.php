<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class TGood extends Model
{
    use Sortable;

    protected $fillable = [
        'name',
        'photo',
        'notice',
        'price',
        'stock',
        'user_id',
    ];

    public $sortable = [
        'name',
        'notice',
        'price',
        'stock'
    ];
}
