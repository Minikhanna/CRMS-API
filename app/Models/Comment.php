<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'description',
        'show_comment_to_client',
        'mail_to_customer',
        'transaction_type'
        ];
}
