<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuanTamNongHo extends Model
{
    protected $table ='quantamnongho';

    protected $primaryKey = 'qtnh_id';

    protected $keyType = 'int';

    protected $fillable =[
        'qtnh_thangnam'
    ];

    public $timestamp = true;
    protected $dates =['delete_at'];
}
