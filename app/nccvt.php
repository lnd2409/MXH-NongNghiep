<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nccvt extends Model
{
    protected $table = 'nccvt';
    protected $primaryKey = 'nccvt_id';
    public $timestamps = true;
    protected $fillable =
    [
        'nccvt_id',
        'nccvt_ten',
        'nccvt_tendangnhap',
        'nccvt_matkhau',
        'nccvt_diachi',
        'nccvt_sdt',
        'create_at',
        'updated_at'
    ];

}
