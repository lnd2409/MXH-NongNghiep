<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nongdan extends Model
{
    protected $table = 'nongdan';
    protected $primaryKey = 'nd_id';
    public $timestamps = true;
    //public $timestamps = false;
    protected $fillable = 
    [
        //'nd_id', 
        'nd_taikhoan',
        'nd_matkhau',
        'nd_hoten',
        'nd_diachi',
        'nd_sdt',
        'n_manhom',
        'created_at',
        'updated_at',
    ];
}
