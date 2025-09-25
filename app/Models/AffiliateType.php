<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffiliateType extends Model
{
    protected $fillable = [
        'name',
        'user_id',
    ];
}
