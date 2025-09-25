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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->json('line');
            $table->json('customerref');
            $table->string('synctoken');
            $table->boolean('shipfromaddr');
            $table->boolean('currencyref');
            $table->enum('GlobalTaxCalculation',['taxexcluded','taxinclusive','NotApplicable']);
            $table->string('docnumber');
            $table->string('projectref');
            $table->string('billemail');
            $table->date('txndate');
            $table->date('shipdate');
            $table->string('trackingnum');
            $table->boolean('classref');
            $table->string('printstatus');
            $table->json('salestermref');
            $table->string('txnsource');
            $table->json('linkedtxn');
            $table->json('deposittoaccountref');
            $table->boolean('AllowOnlineACHPayment');
            $table->string('transactionlocationtype');
            $table->date('duedate');
            $table->string('metadata');
            $table->string('privatenote');
            $table->string('billemailcc');
            $table->string('customermemo');
            $table->string('emailstatus');
            $table->decimal('exchangerate');
            $table->decimal('deposit');
            $table->boolean('txntaxdetail');
            $table->boolean('allowonlinecreditcardpayment');
            $table->string('customfield');
            $table->string('shipaddr');
            $table->boolean('departmentref');
            $table->string('billemailbcc');
            $table->string('shipmethodref');
            $table->string('billaddr');
            $table->boolean('applytaxafterdiscount');
            $table->decimal('homebalance');
            $table->string('deliveryinfo');
            $table->decimal('totalamt');
            $table->string('invoicelink');
            $table->string('recurdataref');
            $table->json('taxexemptionref');
            $table->decimal('balance');
            $table->decimal('hometotalamt');
            $table->boolean('freeformaddress');
            $table->boolean('allowonlinepayment');
            $table->boolean('allowIPNpayment');
            


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
