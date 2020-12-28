<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    protected $table = 'loai_san_phams';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'ten_loai_sp'];
    public $timestamps = true;

    public function SanPham()
    {
        return $this->hasMany('App\SanPham');
    }
}
