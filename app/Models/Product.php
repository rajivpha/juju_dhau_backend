<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product'; //table name

    protected $fillable = [

        'product_name',
        'quantity_size',
        'category_id',
        'price',
        'image',
        'mfd_date',
        'expiry_date',
        'status',
        'admin_id'

        ];
}
