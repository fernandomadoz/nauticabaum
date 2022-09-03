<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
	protected $guarded = ['id'];     

    public function descrip_modelo()
    {    

    	$descripcion = $this->titulo_del_producto.' ('.$this->seccion->seccion.')';

        return $descripcion;
    }

    public function seccion()
    {
        return $this->belongsTo('App\Seccion');
    }

}
