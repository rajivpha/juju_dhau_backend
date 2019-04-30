<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'orders'; //table name

    protected $fillable = [

        'product_name',
        'quantity',
        'order_date',
        'approval',
        'user_id'

    ];
}
