<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen_de_producto extends Model
{
	protected $guarded = ['id'];     

    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }

    protected $table = 'imagenes_de_producto';
}
