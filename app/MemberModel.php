<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberModel extends Model
{
    protected $table = 'users';
    protected $fillable = ['nama_depan', 'nama_belakang', 'username', 'email', 'password', 'nohp', 'CustomerID', 'verified_password', 'role', 'status', 'remember_token', 'created_at', 'updated_at'];
}
