<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaisanpham extends Model
{
    protected $table = 'loasanpham';
    protected $primaryKey = 'lsp_id';
    public $timestamps =true;
    protected $fillable = 
    [
        'lsp_id',
        'lsp_ten',
        'create_at',
        'updated_at'
    ];
}
