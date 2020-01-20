<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\packingDB;
use App\ar_customersModel;
use App\MemberModel;

class PackingController extends Controller
{
    public function index($CustomerID)
    {
        $data_packing = DB::table('packinglist')
            ->join('users', 'packinglist.ExpeditionID', '=', 'users.CustomerID')
            ->where('packinglist.ExpeditionID', '=', $CustomerID)
            ->select('packinglist.*', 'users.*')
            ->get();
        $data_cust = DB::table('ar_customers')
            ->join('users', 'ar_customers.CustomerID', '=', 'users.CustomerID')
            ->where('ar_customers.CustomerID', '=', $CustomerID)
            ->select('ar_customers.*', 'users.*')
            ->get();
        $data_vessel = DB::table('TRS_Vessel')
            ->join('packinglist', 'TRS_Vessel.vessel_id', '=', 'packinglist.VesselID')
            ->where('TRS_Vessel.vessel_id', '=', 'packinglist.VesselID')
            ->select('packinglist.*', 'TRS_Vessel.*')
            ->get();
        return view('packingList.index', ['data_packing' => $data_packing, 'data_cust' => $data_cust, 'data_vessel' => $data_vessel]);
    }
}
