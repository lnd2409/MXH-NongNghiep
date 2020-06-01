<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sanphamnuoitrong extends Model
{
    use Notifiable;

    protected $table = 'sanphamnuoitrong';

    protected $primaryKey = 'spnt_id';

    protected $fillable = [
        // 'nv_id',
        'spnt_ten', 
        'spnt_thongtin',
        'lns_id',
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;



    //public $timestamps = false;
}
