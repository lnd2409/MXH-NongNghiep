<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class muavu extends Model
{
    protected $table = 'muavu';
    protected $primaryKey = 'mv_id';
    public $timestamps = true;
    //public $timestamps = false;
    protected $fillable = 
    [
        //'mv_id', 
        'mv_thangbatdau',
        'mv_thangketthuc',
    ];
}