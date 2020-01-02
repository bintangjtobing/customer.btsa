@extends('layouts.layout')
@section('title','Customer Login')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-4">
                <div class="panel ">
                    <div class="panel-body">
                        <h3>Login</h3>
                        <form action="/postlogin" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="sr-only">Username</label>
                                <input type="text" placeholder="Username" class="form-control" name="username">
                            </div>
                            <div class="form-group m-b-5">
                                <label class="sr-only">Password</label>
                                <input type="password" placeholder="Password" class="form-control" name="password">
                            </div>
                            <div class="form-group form-inline m-b-10 ">
                                <div class="form-check">
                                    <label>
                                        <input type="checkbox"><small class="m-l-10"> Remember me</small>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- <a class="small">Don't have an account yet? <a href="#">Register New Account</a></a> --}}
            </div>
        </div>
    </div>
</section>
@endsection
