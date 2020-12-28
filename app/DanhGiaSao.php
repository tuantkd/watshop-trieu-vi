<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhGiaSao extends Model
{
    protected $table = 'danh_gia_saos';

    protected $primaryKey = 'id';

    protected $fillable = ['id', 'number_star', 'id_user', 'id_sp'];

    public $timestamps = true;

    //danh gia thuoc nhieu san pham
    public function Product()
    {
        return $this->belongsTo('App\Product');
    }

    //danh gia thuoc nhieu san pham
    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
