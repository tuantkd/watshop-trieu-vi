<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LienHe extends Model
{
    protected $table = 'lien_hes';

    protected $primaryKey = 'id';

    protected $fillable = ['id','fullname', 'address', 'email', 'phone','note'
    ];
    public $timestamps = true;
}
