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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            
            $table->string('site_title'); 
            $table->bigInteger('template_id');
            $table->bigInteger('org_id');
            $table->string('industry_type');
            $table->string('business_country');
            $table->string('time_zone');
            $table->string('currency_code');
            $table->string('business_state');
            $table->string('phone');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
