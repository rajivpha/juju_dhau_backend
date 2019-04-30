<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers'; //table name

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'company_name',
        'address',
        'contact_no',
        'email',
        'image',
        'goods_supplied',
        'admin_id'

    ];

    protected $hidden = [
        'remember_token',
    ];
}
