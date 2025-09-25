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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('synctoken');
            $table->string('displayname');
            $table->string('title');
            $table->string('givenname');
            $table->string('middlename');
            $table->string('suffix');
            $table->string('familyname');
            $table->string('primaryemailaddr');
            $table->string('resalenum');
            $table->string('secondarytaxidentifier');
            $table->json('araccountref');
            $table->json('defaulttaxcoderef');
            $table->string('preferreddeliverymethod');
            $table->string('GSTIN');
            $table->string('salestermref');
            $table->string('customertyperef');
            $table->string('fax');
            $table->string('businessnumber');
            $table->boolean('billwithparent');
            $table->string('currencyref');
            $table->string('mobile');
            $table->Boolean('job');
            $table->decimal('balancewithjobs');
            $table->string('primaryphone');
            $table->date('openbalancedate');
            $table->boolean('taxable');
            $table->string('alternatephone');
            $table->string('metadata');
            $table->json('parentref');
            $table->string('notes');
            $table->string('webaddr');
            $table->boolean('active');
            $table->string('companyname');
            $table->decimal('balance');
            $table->string('shipaddr');
            $table->json('paymentmethodref');
            $table->boolean('isproject');
            $table->string('source');
            $table->string('primarytaxidentifier');
            $table->string('GSTregistrationtype');
            $table->string('printoncheckname');
            $table->string('billaddr');
            $table->string('fullyqualifiedname');
            $table->integer('Level');
            $table->integer('taxexemptionreasonid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
