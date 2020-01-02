@extends('layouts.layout')
@section('title','Member Managements')
@section('breadcrumb','Member managements')
@section('content')
<div class="card">
    <div class="card-title">
        <h4>Member Managements</h4>
        <a href="#additem">
            <button type="button" class="btn btn-primary btn-flat btn-addon m-b-10 float-right" data-toggle="modal"
                data-target="#additem">
                <span class="ti-plus"></span> Add Member
            </button>
        </a>
    </div>
    <div class="card-body">
        @if (session('sukses'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <strong>Successfull!</strong> {{session('sukses')}}
        </div>
        @endif
        <div class="table-responsive">
            <table id="memberTables" class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Fullname</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!$data_member->isEmpty())

                    @php $no = 1; @endphp
                    @foreach($data_member as $dt_member)
                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{$dt_member->nama_depan}} {{$dt_member->nama_belakang}}</td>
                        <td><span class="badge badge-primary">{{$dt_member->username}}</span></td>
                        <td>{{$dt_member->email}}</td>
                        <td>{{$dt_member->role}}</td>
                        <td>
                            @if($dt_member->status=='active') <span style="color: green" title="Active"><i
                                    class="fas fa-check-circle"></i></span>
                            @else
                            <span style="color: red"><i class="fas fa-times-circle"></i></span>
                            @endif</td>
                        <td><a href="/member/{{$dt_member->id}}/edit"><button class="btn btn-rounded btn-warning"><i
                                        class="fas fa-edit"></i></button></a> <a
                                href="/member/{{$dt_member->id}}/delete"><button class="btn btn-rounded btn-danger"><i
                                        class="fas fa-trash-alt"></i></button></a></td>
                    </tr>
                    @endforeach
                    @else
                    <td colspan="7" class="text-center">No data founded!</td>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#memberTables').DataTable();
    });

</script>
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
                                            <label for="nama_depan">Nama Depan</label>
                                            <input type="text" class="form-control" name="nama_depan" autofocus
                                                required>
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
                                                value="{{$generatepass}}" readonly>
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
@endsection
