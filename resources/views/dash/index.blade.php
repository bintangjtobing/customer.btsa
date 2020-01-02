@extends('layouts.layout')
@section('title','Dashboard')
@section('statusdashboard','active')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h3>Selamat datang di Customer Service BTSA LOGISTICS</h3>
                <p>Hallo <strong>{{auth()->user()->nama_depan}} {{auth()->user()->nama_belakang}}</strong>, ada yang
                    bisa kami bantu?<br>
                    Silahkan pilih beberapa tombol dibawah untuk dapat menikmati fasilitas yang kami berikan.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-6 text-right">
                <a href="/member" class="btn btn-light btn-lg">USER MANAGEMENT</a>
            </div>
            <div class="col-6 text-left">
                <a href="/packing-list" class="btn btn-light btn-lg">PACKING LIST</a>
            </div>
        </div>
    </div>
</section>
@endsection
