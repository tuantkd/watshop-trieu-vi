<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDonChiTiet extends Model
{
    protected $table = 'hoa_don_chi_tiets';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'id_hoa_don','id_san_pham','tong_so_luong','tong_gia'];
    public $timestamps = true;

    public function HoaDon()
    {
        return $this->belongsTo('App\HoaDon');
    }

    public function SanPham()
    {
        return $this->hasMany('App\SanPham');
    }
}
