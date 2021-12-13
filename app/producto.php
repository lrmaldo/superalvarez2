<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    protected $table = 'productos';
    protected $fillable = [
        'id', 'titulo','precio','descripcion','url_imagen',
        'id_categoria'/* foreign key */
        ,'id_sucursal'
    ];

    public function categoria(){
        return $this
            ->belongsTo(categoria::class,'id_categoria');
            
    }
}
