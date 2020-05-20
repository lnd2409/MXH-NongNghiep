<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
class NongDan extends Authenticatable
{
    use Notifiable;

    protected $table = 'nongdan';
    protected $guard = 'nongdan';

    protected $primaryKey = 'nd_id';

    protected $fillable = [
        // 'nv_id',
        'username', 
        'password',
        'nd_hoten',
        'nd_diachi',
        'nd_sdt',
        'remember_token',
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','remember_token'
    ];
}
