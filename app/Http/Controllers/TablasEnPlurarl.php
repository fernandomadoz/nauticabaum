<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TablasEnPlurarl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function tablasEnPlural() {

        $tb_plural_distintas = [
            "Rol_de_usuario" => "roles_de_usuario",
            "Opcion" => "opciones",
            "Varietal" => "varietales",
            "Imagen_de_producto" => "imagenes_de_producto",
            "Seccion" => "secciones",
            "Linea_de_pedido" => "lineas_de_pedido",
            "Imagen_de_galeria" => "imagenes_de_galeria"
        ];
        
        return $tb_plural_distintas;

    }


}
