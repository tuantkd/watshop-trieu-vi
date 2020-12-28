<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    protected $table = 'khach_hangs';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'ho_ten','so_dien_thoai','email', 'dia_chi','ghi_chu'];
    public $timestamps = true;

    public function HoaDon()
    {
        return $this->hasMany('App\HoaDon');
    }
}
