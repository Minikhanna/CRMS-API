<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FreezeBureau extends Model
{
    protected $fillable = [
        'company_name',
        'address',
        'city',
        'state',
        'zip',
        'phone_number'
    ];
}
