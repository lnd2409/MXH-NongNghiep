<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    protected $table = 'sanpham';
    protected $primaryKey = 'sp_id';
    public $timestamps = true;
    protected $fillable =
    [
        'sp_id',
        'sp_ten',
        'sp_chitiet',
        'sp_gia',
        'sp_soluongcungcap',
        'lsp_id',
        'nccvt_id',
        'create_at',
        'updated_at'
    ];
}
