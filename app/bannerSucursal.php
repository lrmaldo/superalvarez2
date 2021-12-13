<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bannerSucursal extends Model
{
    protected $table = 'banner_sucursals';
    protected $fillable = [
        'id', 'url_imagen', 'id_sucursal'
    ];
}
