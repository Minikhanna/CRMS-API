<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DisputeReason extends Model
{
    protected $fillable = [
    'name',
    'dispute_group_id'
];
}
