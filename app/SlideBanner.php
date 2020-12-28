<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SlideBanner extends Model
{
    protected $table = 'slide_banners';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'id_san_pham','hinh_anh_slide'];
    public $timestamps = true;
    
    public function SanPham()
    {
        return $this->belongsTo('App\SanPham');
    }
}
