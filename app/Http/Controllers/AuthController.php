<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\ar_customersModel;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';
    public function login()
    {
        return view('login.index');
    }
    public function register()
    {
        $arcustomers = \App\ar_customersModel::all();
        return view('login.register', ['arcustomers' => $arcustomers]);
    }
    public function prosesregister(Request $request)
    {
        $data_member = new \App\MemberModel;
        $data_member->nama_depan = $request->nama_depan;
        $data_member->nama_belakang = $request->nama_belakang;
        $data_member->username = $request->username;
        $data_member->email = $request->email;
        $data_member->role = 'member';
        $data_member->status = 'inactive';
        $data_member->password = Hash::make($request->password);
        $data_member->verified_password = $request->password;
        $data_member->remember_token = str_random(50);
        $data_member->created_by = 'Guest.';
        $data_member->save();

        return back()->with('sukses', 'Akun anda telah berhasil diajukan. Hubungi pihak managemen IT anda untuk menyetujui ajuan daftar anggota anda. Dan tunggu akan email anda untuk informasi username dan password anda');
    }
    public function postlogin(Request $request)
    {
        $request->merge(['status' => 'active']);
        if (Auth::attempt($request->only('username', 'password', 'status'))) {
            return redirect('/dashboard');
        }
        return back()->with('sukses', 'Auth authorization failed or check your username and password!');
    }
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password', 'status');
    }
    protected function attemptLogin(Request $request)
    {
        $request->merge(['status' => 'active']);
        return $this->guard()->attempt(
            $this->credentials($request),
            $request->filled('remember')
        );
        return redirect('/dashboard')->with('sukses', 'Login in...');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
