<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    protected $table = 'supplies'; //table name

    protected $fillable = [

        'product_name',
        'quantity_size',
        'price',
        'total',
        'delivered_date',
        'supplier_id',
        'invoice_no',
        'image',
        'status'

    ];

   
}
