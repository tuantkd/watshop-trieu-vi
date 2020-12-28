<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = 'san_phams';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'id_loai_sp','id_xuat_xu','ten_san_pham',
        'hinh_anh','gia_nhap','gia_ban','so_luong','xuat_xu','mieu_ta'
    ];

    public $timestamps = true;

    public function LoaiSanPham()
    {
        return $this->belongsTo('App\LoaiSanPham');
    }

    public function XuatXu()
    {
        return $this->belongsTo('App\XuatXu');
    }

    public function HoaDonChiTiet()
    {
        return $this->belongsTo('App\HoaDonChiTiet');
    }

    public function SlideBanner()
    {
        return $this->hasMany('App\SlideBanner');
    }

    //Sản phẩm có nhiều danh gia sao
    public function DanhGiaSao()
    {
        return $this->hasMany('App\DanhGiaSao');
    }


}
