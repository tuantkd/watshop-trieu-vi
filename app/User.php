<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'id_truy_cap', 'ho_ten', 'hinh_anh', 'username', 'password', 'email',
        'gioi_tinh', 'ngay_sinh','dien_thoai','dia_chi'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function QuyenTruyCap()
    {
        return $this->belongsTo('App\QuyenTruyCap');
    }

    public function DanhGiaSao()
    {
        return $this->hasOne('App\DanhGiaSao');
    }
}
