<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
	protected $guarded = ['id'];     

    public function sesion()
    {
        return $this->belongsTo('App\Sesion');
    }

}
