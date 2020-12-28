<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    protected $table = 'hoa_dons';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'id_khach_hang','ngay_dat_hang','ngay_giao_hang','trang_thai'];
    public $timestamps = true;

    public function KhachHang()
    {
        return $this->belongsTo('App\KhachHang');
    }

    public function HoaDonChiTiet()
    {
        return $this->hasMany('App\HoaDonChiTiet');
    }
}
