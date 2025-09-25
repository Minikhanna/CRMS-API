<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'coupon_code',
        'coupon_name',
        'activation_time',
        'expiry_time' ,
        'restrict_for_guest_user' ,
        'minimum_order_value',
        'discount_type',
        'discount_value',
        'max_redemption_count',
        'max_redemption_count_per_user',
        'eligible_products',
        'eligible_shipping_zones',
        'eligible_customers',
        
          ];
          protected $casts = [
            'eligible_products' => 'array',
            'eligible_shipping_zones' => 'array',
            'eligible_customers' => 'array',
        ];
}
