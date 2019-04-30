<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class paymentPaid extends Model
{

    protected $table = 'payment_paids'; //table name

    protected $fillable = [

        'paid_date',
        'cheque_no',
        'paid_amount',
        'supplier',

    ];
}
