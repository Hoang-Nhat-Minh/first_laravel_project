<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userdata extends Model
{
    protected $table = 'userdata';

    protected $fillable = [
        'nickname',
        'ngaysinh',
        'gioitinh',
        'diachi',
        'sodt',
        'email',
        'avatar',
    ];
}