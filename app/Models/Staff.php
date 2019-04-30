<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff'; //table name

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'address',
        'contact_no',
        'email',
        'password',
        'image',
        'position',
        'admin_id'
        ];


    protected $hidden = [
         'remember_token',
    ];
}
