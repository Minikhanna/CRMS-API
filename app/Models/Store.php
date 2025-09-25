<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'site_title',
        'template_id',
        'org_id',
        'industry_type',
        'business_country',
        'time_zone',
        'currency_code',
        'business_state',
        'phone'
        ];
}
