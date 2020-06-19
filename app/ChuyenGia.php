<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ChuyenGia extends Authenticatable
{
    protected $table ='chuyengia';

    protected $primaryKey ='cg_id';

    protected $keyType = 'int';

    protected $fillable =[
        'cg_hoten',
        'cg_diachi',
        'cg_sdt',
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
