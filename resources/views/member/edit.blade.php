@extends('layouts.layout')
@section('title','Member Managements Edit')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3>Edit user managements</h3>
            </div>
            <div class="col-6 text-right">
                <h3><small>#{{$data_member->id}} - {{$data_member->nama_depan}} {{$data_member->nama_belakang}}</small>
                </h3>
            </div>
        </div>
        <hr>
        @if(session('sukses'))
        <div class="row">
            <div class="col-12">
                <div role="alert" class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span> </button>
                    <strong><i class="fa fa-check-circle"></i> Berhasil!</strong> {{session('sukses')}} </div>
            </div>
        </div>
        @endif
        <form action="/member/{{$data_member->id}}/update" method="post">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="panggilan">Panggilan</label>
                    <input class="form-control" id="panggilan" type="text" name="nama_depan"
                        value="{{$data_member->nama_depan}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input class="form-control" id="nama_lengkap" type="text" name="nama_belakang"
                        value="{{$data_member->nama_belakang}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="username">Username</label>
                    <input class="form-control" id="username" type="text" name="username"
                        value="{{$data_member->username}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="passwordshowhide">Password</label>
                    <div class="input-group mb-3 show-hide-password">
                        <input class="form-control" id="passwordshowhide" name="password"
                            value="{{$data_member->verified_password}}" type="password">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="far fa-eye" onclick="showFunction()"></i></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" value="{{$data_member->email}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="customer">Perusahaan yang di-<i>handle</i></label>
                    <input class="form-control" type="text" name="CustomerID"
                        value="@if($data_member->CustomerID=='')Restricted user @else {{$data_member->CustomerID}} @endif"
                        readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Tipe user</label>
                    <select name="role" id="role" class="custom-select">
                        <option value="#" disabled selected>Select type of item</option>
                        <option value="administrator" @if($data_member->role=='administrator') selected
                            @endif>Administrator</option>
                        <option value="member" @if($data_member->role=='member') selected @endif>Member
                        </option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Status user</label>
                    <select name="status" id="status" class="custom-select">
                        <option value="active" @if($data_member->status=='active') selected @endif>Active
                        </option>
                        <option value="inactive" @if($data_member->status=='inactive') selected
                            @endif>Inactive</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-right">
                    <button type="submit" class="btn btn-default btn-large">Ubah data</button>
                </div>
            </div>
        </form>
    </div>
</section>
<script>
    function showFunction() {
        var Pass = document.getElementById('passwordshowhide');
        if (Pass.type === "password") {
            Pass.type = "text";
        } else {
            Pass.type = "password";
        }
    }

</script>
@endsection
