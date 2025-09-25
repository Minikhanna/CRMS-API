<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcessingQueue extends Model
{
    protected $fillable =[
        'name',
        'user_id'
    ];
}
