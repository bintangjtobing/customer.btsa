@extends('layouts.layout')
@section('title','Dashboard')
@section('breadcrumb','Home')
@section('content')
<div class="page-menu menu-creative">
    <div class="container">
        <nav>
            <ul>
                <li class="active"><a href="/dashboard">Home</a></li>
                <li><a href="#">User management</a></li>
                <li><a href="#">Packing list</a></li>
            </ul>
        </nav>
        <div id="pageMenu-trigger">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</div>
@endsection
