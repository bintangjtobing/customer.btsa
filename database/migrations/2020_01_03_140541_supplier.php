<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Supplier extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AP_Suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('SupplierID');
            $table->string('SupplierCode');
            $table->string('SupplierName');
            $table->string('City');
            $table->string('State');
            $table->string('Country');
            $table->string('ZipCode');
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
        Schema::dropIfExists('AP_Suppliers');
    }
}
