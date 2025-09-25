<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Creditor extends Model
{
    protected $fillable = [

       'company_name',
       'address',
       'city',
       'state',
       'zip',
       'phone_number',
       'extensions',
       'account_type',
       'fax_number'
    ];
}
