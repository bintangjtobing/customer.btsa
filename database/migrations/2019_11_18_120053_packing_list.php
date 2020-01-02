<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PackingList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packinglist', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('PackingListID');
            $table->string('PackingListType');
            $table->string('PackingListNo');
            $table->string('ExternalRef');
            $table->string('Date');
            $table->string('VesselID');
            $table->string('ExpeditionID');
            $table->string('OriginLocationID');
            $table->string('DestinationLocationID');
            $table->string('ETD');
            $table->string('ETA');
            $table->string('ItemCount');
            $table->integer('VoyageID');
            $table->string('Summary');
            $table->string('ContractNo');
            $table->string('NoAJU');
            $table->string('NoHS');
            $table->string('TglSPPB');
            $table->string('PLStatus');
            $table->string('Destination');
            $table->string('Party');
            $table->string('RegNo');
            $table->string('TPenimbunan');
            $table->string('VoyageNo');
            $table->string('BLNo');
            $table->string('BLDate');
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
        Schema::dropIfExists('packinglist');
    }
}
