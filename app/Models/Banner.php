<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banners';

    protected $fillable = [
        'image',
        'alt_text',
        'caption',
        'status',
        'rank',
        'admin_id'

    ];



}
