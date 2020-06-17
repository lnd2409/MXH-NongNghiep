<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class NCCVT extends Authenticatable
{
    protected $table ='nccvt';

    protected $primaryKey ='nccvt_id';

    protected $keyType = 'int';

    protected $fillable =[
        'nccvt_ten',
        'nccvt_sdt',
        'nccvt_diachi',
        'username',
        'password',
        'remember_token'
        
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
