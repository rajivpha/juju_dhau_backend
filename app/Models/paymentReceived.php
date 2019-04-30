<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class paymentReceived extends Model
{
    protected $table = 'payment_receiveds'; //table name

    protected $fillable = [

        'received_date',
        'receipt_no',
        'received_amount',
        'user_id',

    ];
}
