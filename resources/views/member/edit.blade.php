@extends('layouts.layout')
@section('title','Member Managements Edit')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Edit user managements</h3>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="panggilan">Panggilan</label>
                <input class="form-control" id="panggilan" type="text" value="{{$data_member->nama_depan}}">
            </div>
            <div class="form-group col-md-6">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input class="form-control" id="nama_lengkap" type="text" value="{{$data_member->nama_belakang}}">
            </div>
            <div class="form-group col-md-6">
                <label for="username">Username</label>
                <input class="form-control" id="username" type="text" value="{{$data_member->username}}">
            </div>
            <div class="form-group col-md-6">
                <label for="passwordshowhide">Password</label>
                <div class="input-group mb-3 show-hide-password">
                    <input class="form-control" id="passwordshowhide" value="{{$data_member->password}}"
                        type="password">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="far fa-eye" onclick="showFunction()"></i></span>
                    </div>
                </div>
            </div>
</section>

<div class="card">
    <div class="card-title">
        <h4>Edit User Managements</h4>
    </div>
    <div class="card-body">
        @if (session('sukses'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <strong>Successfull!</strong> {{session('sukses')}}
        </div>
        @endif
        <form action="/member/{{$data_member->id}}/update" method="POST">
            {{ csrf_field() }}
            <div class="basic-elements">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-row">
                            <div class="col">
                                <label for="nama_depan">Nama Depan</label>
                                <input type="text" class="form-control" name="nama_depan"
                                    value="{{$data_member->nama_depan}}" autofocus>
                            </div>
                            <div class="col">
                                <label for="nama_belakang">Nama Belakang</label>
                                <input type="text" class="form-control" name="nama_belakang"
                                    value="{{$data_member->nama_belakang}}" autofocus>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <div class="col">
                                <label for="username">Username</label>
                                <input type="text" value="{{$data_member->username}}" class="form-control"
                                    name="username">
                            </div>
                            <div class="col">
                                <label for="CustomerID">Customer Name</label>
                                <input type="text" value="{{$data_member->CustomerID}}" class="form-control"
                                    name="CustomerID" readonly>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <div class="col">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" value="{{$data_member->email}}" name="email">
                            </div>
                            <div class="col">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" value="{{$data_member->password}}"
                                    title="Kamu tidak dapat mengubah password kamu. Jika ingin mengubah silahkan hubungi super administrator  kamu."
                                    data-toggle="tooltip" data-placement="top" name="password" readonly>
                            </div>
                        </div>
                        <div class="form-group">

                        </div>
                        <div class="form-group form-row">
                            <div class="col">
                                <label for="role">Tipe user</label><br>
                                <select name="role" id="role" class="custom-select">
                                    <option value="#" disabled selected>Select type of item</option>
                                    <option value="administrator" @if($data_member->role=='administrator') selected
                                        @endif>Administrator</option>
                                    <option value="member" @if($data_member->role=='member') selected @endif>Member
                                    </option>
                                    <option value="legal" @if($data_member->role=='legal') selected @endif>Legal
                                    </option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="role">Status</label><br>
                                <select name="status" id="status" class="custom-select">
                                    <option value="active" @if($data_member->status=='active') selected @endif>Active
                                    </option>
                                    <option value="inactive" @if($data_member->status=='inactive') selected
                                        @endif>Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Member Data</button>
                </div>
        </form>
    </div>
</div>
<script>
    function showFunction() {
        const Pass = document.getElementById('passwordshowhide');
        if (Pass.type === "password") {
            Pass.type = "text";
        } else {
            Pass.type = "password";
        }
    }

</script>
@endsection
