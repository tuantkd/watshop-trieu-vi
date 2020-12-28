<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuyenTruyCap extends Model
{
    protected $table = 'quyen_truy_caps';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'ten_quyen','mieu_ta'];
    public $timestamps = true;
    
    public function User()
    {
        return $this->hasMany('App\User');
    }

}

