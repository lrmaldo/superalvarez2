<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bannerprincipal extends Model
{
     protected $table = 'bannerprincipals';
    protected $fillable = [
        'id', 'url_imagen', 'id_sucursal'
    ];
}
