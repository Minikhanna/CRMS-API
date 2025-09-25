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
        Schema::create('variants', function (Blueprint $table) {
            $table->id();
            $table->string('product_id');
            $table->string('rate');
            $table->string('initial_stock');
            $table->string('attribute_option_name1');
            $table->string('attribute_option_name2');
            $table->string('attribute_option_name3');
            $table->string('attribute_option_data1');
            $table->string('attribute_option_data2');
            $table->string('attribute_option_data3');
            $table->string('label_rate');
            $table->json('document_ids');
            $table->string('sku');
            $table->json('custom_fields');
            $table->bigInteger('customfield_id');
            $table->string('value');
            $table->string('reorder_level');
            $table->json('package_details');
            $table->string('height');
            $table->string('weight');
            $table->string('length');
            $table->string('width');
            $table->string('ean');
            $table->string('upc');
            $table->string('isbn');
            $table->string('part_number');
            $table->string('hsn_or_sac');
            $table->string('avatax_tax_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variants');
    }
};
