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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('synctoken');
            $table->string('acctnum');
            $table->string('currencyref');
            $table->string('parentref');
            $table->text('description');
            $table->boolean('active');
            $table->string('metadata');
            $table->boolean('subaccount');
            $table->string('classification');
            $table->string('fullyqualifiedname');
            $table->string('txnlocationtype');
            $table->decimal('currentbalancewithsubaccounts');
            $table->string('accountalias');
            $table->string('taxcoderef');
            $table->string('accountsubtype');
            $table->decimal('currentbalance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
