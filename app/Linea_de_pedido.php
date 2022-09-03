<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linea_de_pedido extends Model
{
	protected $guarded = ['id'];     

    public function pedido()
    {
        return $this->belongsTo('App\Pedido');
    }

    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }

    protected $table = 'lineas_de_pedido';

}
