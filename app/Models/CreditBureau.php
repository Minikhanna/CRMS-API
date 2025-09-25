<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreditBureau extends Model
{
    protected $fillable = [
        'bureau_name',
        'address',
        'city',
        'state',
        'zip',
        'phone_number'
    ];

}
