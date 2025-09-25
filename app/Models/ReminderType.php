<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReminderType extends Model
{
    protected $fillable=[
        'name','user_id'
    ];
}
