<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('coupon_code');
            $table->string('coupon_name');
            $table->boolean('activation_time');
            $table->string('minimum_order_value');
            $table->string('discount_type');
            $table->string('discount_value');
            $table->integer('max_redemption_count');
            $table->integer('max_redemption_count_per_user');
            $table->json('eligible_products');
            $table->json('eligible_shipping_zones');
            $table->json('eligible_customers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
