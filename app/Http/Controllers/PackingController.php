<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\packingDB;

class PackingController extends Controller
{
    public function index()
    {
        $data_packing = DB::table('packinglist')
            ->select('packinglist.*')
            ->get();
        return view('packingList.index', ['data_packing' => $data_packing]);
    }
}
