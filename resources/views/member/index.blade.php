@extends('layouts.layout')
@section('title','User Managements')
@section('statususer','active')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3>User managements</h3>
            </div>
            <div class="col-6 text-right">
                <a href="#additem">
                    <button type="button" class="btn btn-primary btn-flat btn-addon m-b-10 float-right"
                        data-toggle="modal" data-target="#additem">
                        <span class="ti-plus"></span> Add Member
                    </button>
                </a>
            </div>
        </div>
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
        <div class="row">
            <?php $i = 1; ?>
            <div class="table-responsive">
                <table class="table" id="tableDashboard">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_member as $member)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$member->nama_depan}} {{$member->nama_belakang}}</td>
                            <td>{{$member->username}}</td>
                            <td>{{$member->email}}</td>
                            <td>{{$member->role}}</td>
                            <td>@if($member->status=='active')
                                <span style="color: green" title="Active"><i class="fas fa-check-circle"></i></span>
                                @else
                                <span style="color: red" title="Active"><i class="fas fa-times-circle"></i></span>
                                @endif
                            </td>
                            <td><a href="/member/{{$member->id}}/edit">
                                    <button class="btn btn-xs btn-slide btn-warning" data-width="75">
                                        <i class="fas fa-pen"></i>
                                        <span>Edit</span>
                                    </button>
                                </a>
                                <a href="/member/{{$member->id}}/delete">
                                    <button class="btn btn-xs btn-slide btn-danger" data-width="75">
                                        <i class="fas fa-trash-alt"></i>
                                        <span>Hapus</span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="additem" tabindex="-1" role="dialog" aria-labelledby="additem" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="/member/addnew" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="basic-elements">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-row form-group">
                                        <div class="col">
                                            <label for="nama_depan">Panggilan</label>
                                            <select name="nama_depan">
                                                <option selected>Pilih panggilan kamu disini...</option>
                                                <option value="Bpk.">Bapak</option>
                                                <option value="Ibu.">Ibu</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="nama_belakang">Nama Belakang</label>
                                            <input type="text" name="nama_belakang" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <div class="col">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" name="username" required>
                                        </div>
                                        <div class="col">
                                            <label for="nohp">Nomor telepon</label>
                                            <input type="text" name="nohp" class="form-control" required
                                                pattern=".{12,}">
                                            <small>Ex: 08xxxxxxxxxx | maksimal 12 nomor.</small>
                                        </div>
                                        <div class="col">
                                            <label for="CustomerID">Perusahaan / Instansi</label>
                                            <select name="CustomerID" id="CustomerID" class="custom-select">
                                                <option value="">- None -</option>
                                                @foreach ($dataarcustomer as $item)
                                                <option value="{{$item->CustomerID}}">{{$item->CustomerName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row form-group">
                                        <div class="col">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" name="email" required
                                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                                            <small>Ex: *****@mail.com</small>
                                        </div>
                                        <div class="col">
                                            <label for="password">Password</label>
                                            <input type="text" class="form-control" name="password"
                                                value="{{$generatepass}}" id="password" readonly>
                                            <small><a onclick="copyFunction();return false;" href="#">Copy
                                                    password to clipboard</a></small>
                                        </div>
                                        <div class="col">
                                            <label for="role">Tipe user</label>
                                            <select name="role" id="role" class="custom-select">
                                                <option value="administrator">Administrator</option>
                                                <option value="member">Member</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah member baru</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('button[name="btn-regist"]').click(function () {
        if ($('input[name="password"]').val().length < 6) {
            alert('Minimum password length = 6');
        } else if {
            if ($('input[name="nohp"]').val().length < 12) {
                alert('Nomor hp minimal mempunyai 12 angka.');
            } else {
                $('form').submit();
            }

        }
    });

</script>
<script>
    function copyFunction() {
        const copyText = document.getElementById('password');

        copyText.select();
        document.execCommand("copy");

        alert("Password berhasil disalin: " + copyText.value);
    }

</script>
@endsection
