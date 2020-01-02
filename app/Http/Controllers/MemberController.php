<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\MemberModel;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function index()
    {
        $data_member = DB::table('users')
            ->select('users.*')
            ->get();
        $generatepass = str_random(8);
        $dataarcustomer = DB::table('ar_customers')
            ->select('ar_customers.CustomerID', 'ar_customers.CustomerName')
            ->get();
        return view('member.index', ['data_member' => $data_member, 'generatepass' => $generatepass, 'dataarcustomer' => $dataarcustomer]);
    }
    public function addnewmember(Request $request)
    {
        $data_member = new \App\MemberModel;
        $data_member->nama_depan = $request->nama_depan;
        $data_member->nama_belakang = $request->nama_belakang;
        $data_member->username = $request->username;
        $data_member->email = $request->email;
        $data_member->role = $request->role;
        $data_member->nohp = $request->nohp;
        $data_member->CustomerID = $request->CustomerID;
        $data_member->status = $request->status;
        $data_member->password = Hash::make($request->password);
        $data_member->verified_password = $request->password;
        $data_member->remember_token = str_random(50);
        $data_member->created_by = auth()->user()->nama_depan;
        $data_member->save();

        return back()->with('sukses', 'Akun anda telah berhasil diajukan. Hubungi pihak managemen IT anda untuk menyetujui ajuan daftar anggota anda. Dan tunggu akan email anda untuk informasi username dan password anda');
    }
    public function registered(Request $request)
    {
        $data_member = new \App\MemberModel;
        $data_member->nama_depan = $request->nama_depan;
        $data_member->nama_belakang = $request->nama_belakang;
        $data_member->username = $request->username;
        $data_member->email = $request->email;
        $data_member->role = $request->role;
        $data_member->status = 'inactive';
        $data_member->password = Hash::make($request->password);
        $data_member->verified_password = $request->password;
        $data_member->remember_token = str_random(50);
        $data_member->created_by = 'Guest.';
        $data_member->save();

        return back()->with('sukses', 'Akun anda telah berhasil diajukan. Hubungi pihak managemen IT anda untuk menyetujui ajuan daftar anggota anda. Dan tunggu akan email anda untuk informasi username dan password anda');
    }
    public function delete($id)
    {
        $data_member = MemberModel::find($id);

        if ($data_member) {
            if ($data_member->delete()) {

                DB::statement('ALTER TABLE users AUTO_INCREMENT = ' . (count(MemberModel::all()) + 1) . ';');

                return back()->with('sukses', 'Akun keanggotaan telah berhasil dihapus!');
            }
        }
    }
    public function edit($id)
    {
        $data_member = \App\MemberModel::find($id);
        $datmember = DB::table('users')
            ->join('ar_customers', 'users.id', '=', 'ar_customers.CustomerID')
            ->select('users.*', 'ar_customers.*')
            ->get();
        return view('member.edit', ['data_member' => $data_member, 'datmember' => $datmember]);
    }
    public function update(Request $request, $id)
    {
        $data_member = \App\MemberModel::find($id);
        $data_member->nama_depan = $request->nama_depan;
        $data_member->nama_belakang = $request->nama_belakang;
        $data_member->username = $request->username;
        $data_member->email = $request->email;
        $data_member->role = $request->role;
        $data_member->status = $request->status;
        $data_member->remember_token = str_random(50);
        $data_member->updated_by = auth()->user()->nama_depan;
        $data_member->created_by = auth()->user()->nama_depan;
        $data_member->save();
        return back()->with('sukses', 'Member data has been successfully updated!');
    }
}
