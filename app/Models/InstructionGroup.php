<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstructionGroup extends Model
{
    protected $fillable = [
        'name',
        'category'
    ];
}
