<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThuongLai extends Model
{
    protected $table ='thuonglai';

    protected $primaryKey ='tl_id';

    protected $keyType = 'int';

    protected $fillable =[
        'tl_hoten',
        'tl_diachi',
        'tl_sdt',
        'tl_tendangnhap',
        'tl_matkhau'
        
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}

