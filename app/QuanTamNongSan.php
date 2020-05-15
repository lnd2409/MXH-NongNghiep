<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuanTamNongSan extends Model
{
    protected $table ='quantamnongsan';

    protected $primaryKey='qtns_id';

    protected $keyType='int';

    protected $fillable=[
        'qtns_quymo'
    ];

    public $timestamp =true;
    protected $dates =['delete_at'];
    
}
