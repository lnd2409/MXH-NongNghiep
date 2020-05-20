<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ThuongLai extends Authenticatable
{
    protected $table ='thuonglai';

    protected $primaryKey ='tl_id';

    protected $keyType = 'int';

    protected $fillable =[
        'tl_hoten',
        'tl_diachi',
        'tl_sdt',
        'username',
        'password'
        
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','remember_token'
    ];
}

