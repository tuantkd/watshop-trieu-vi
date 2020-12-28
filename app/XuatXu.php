<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class XuatXu extends Model
{
    protected $table = 'xuat_xus';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'xuat_xu','thong_tin'];
    public $timestamps = true;


    public function SanPham()
    {
        return $this->hasMany('App\SanPham');
    }
}
