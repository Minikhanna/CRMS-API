<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerPayment extends Model
{
    protected $fillable = [
        'payment_mode',
        'reference_number',
        'date',
        'description',
        'payment_id',
        'amount',
        'invoice_id',
        ];
}
