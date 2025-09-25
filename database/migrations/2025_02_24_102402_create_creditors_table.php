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
        Schema::create('creditors', function (Blueprint $table) {
            $table->id();
            $table->string('company_name'); 
            $table->string('address'); 
            $table->string('city'); 
            $table->string('state'); 
            $table->string('zip'); 
            $table->string('phone_number');
            $table->string('extensions'); 
            $table->string('account_type'); 
            $table->string('fax_number'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creditors');
    }
};
