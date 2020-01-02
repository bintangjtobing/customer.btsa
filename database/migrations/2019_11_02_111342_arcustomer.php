<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Arcustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ar_customers', function (Blueprint $table) {
            $table->bigIncrements('CustomerID');
            $table->string('CustomerCode');
            $table->string('CustomerName');
            $table->string('BillingAddressLine1');
            $table->string('BillingAddressLine2');
            $table->string('BillingCity');
            $table->string('BillingState');
            $table->string('BillingCountry');
            $table->string('BillingZipCode');
            $table->string('ShippingCity');
            $table->string('Phone');
            $table->string('Fax');
            $table->string('Email');
            $table->string('Website');
            $table->string('NPWP');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ar_customers');
    }
}
