<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class packingDB extends Model
{
    protected $table = 'packinglist';
    protected $fillable = [
        'PackingListID',
        'PackingListType',
        'PackingListNo',
        'ExternalRef',
        'Date',
        'VesselID',
        'ExpeditionID',
        'OriginLocationID',
        'DestinationLocationID',
        'ETD',
        'ETA',
        'ItemCount',
        'VoyageID',
        'Summary',
        'ContractNo',
        'NoAJU',
        'NoHS',
        'TglSPPB',
        'PLStatus',
        'Destination',
        'Party',
        'RegNo',
        'TPenimbunan',
        'VoyageNo',
        'BLNo',
        'BLDate', 'created_at', 'updated_at'
    ];
}
