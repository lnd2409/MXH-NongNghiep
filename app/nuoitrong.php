<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nuoitrong extends Model
{
    protected $table = 'nuoitrong';
    //protected $primaryKey = 'nd_id';
    public $timestamps = true;
    //public $timestamps = false;
    protected $fillable = 
    [
        //'nd_id', 
        'mv_id',
        'nd_id',
        'spnt_id',
        'nt_sanluongdutinh',
        'nt_sanluongthucte',
        'created_at',
        'updated_at',
    ];
}
