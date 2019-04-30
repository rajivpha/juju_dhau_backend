<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category'; //table name

    protected $fillable = [

        'category_name',
        'image',
        'status'
        ];
}
