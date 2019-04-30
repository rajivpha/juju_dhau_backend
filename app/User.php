<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users'; //table name

    protected $fillable = [
        'name',
        'first_name',
        'middle_name',
        'last_name',
        'contact_no',
        'email',
        'address',
        'password',
        'image',
        'approval',
        'admin_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
