<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    protected $table = 'categorias';
    protected $fillable = [
        'id','titulo','color','url_imagen','id_sucursal'
    ];


    public function productos(){
        return $this->hasMany(producto::class);
        
    }
}
