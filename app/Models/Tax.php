<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    protected $fillable = [
        'tax_name',
        'tax_percentage',
        'tax_type',
        'tax_specific_type (Indian edition only)',
        'country_code',
    ];
}
