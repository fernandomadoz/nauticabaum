<?php

namespace App\Http\Controllers;
use App\Publicidad;
use App\Noticia;
use App\Varietal;
use App\Producto;
use App\User;
use Session;
use App\Pedido;
use App\Linea_de_pedido;

use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ExtController;



class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function addItem()
    {   
        $producto_id = $_POST['producto_id'];
        $cantidad = $_POST['cantidad'];
        $sesion_id = Session()->get('sesion_id');
        $Producto = Producto::find($producto_id);


        $cant_pedido = Pedido::where('sesion_id', $sesion_id)->count();
        if ($cant_pedido > 0) {
            $Pedido = Pedido::where('sesion_id', $sesion_id)->get();            
            $carro_cant = Linea_de_pedido::where('pedido_id', $Pedido[0]->id)->count();
            $carro_cant++;
            $Pedido = $Pedido[0];
        }
        else {
            $Pedido = new Pedido();
            $Pedido->sesion_id = $sesion_id;
            $Pedido->save();
            $carro_cant = 1;
        }

        $cant_lineas_de_pedido_prod = Linea_de_pedido::
            where('pedido_id', $Pedido->id)
            ->where('producto_id', $producto_id)
            ->count();
        
        if ($cant_lineas_de_pedido_prod > 0) {
            $Linea_de_pedido_prod = Linea_de_pedido::
                where('pedido_id', $Pedido->id)
                ->where('producto_id', $producto_id)
                ->get(); 
            $Linea_de_pedido_prod = $Linea_de_pedido_prod[0];
            $Linea_de_pedido_prod->cantidad = $Linea_de_pedido_prod->cantidad+$cantidad;  
            $Linea_de_pedido_prod->moneda_importe_total = $Producto->moneda_importe*$Linea_de_pedido_prod->cantidad;  
            $Linea_de_pedido_prod->save();    

            $carro_total = $Producto->moneda_importe*$Linea_de_pedido_prod->cantidad; 
        }
        else {
            $Linea_de_pedido = new Linea_de_pedido();
            $Linea_de_pedido->producto_id = $producto_id;
            $Linea_de_pedido->pedido_id = $Pedido->id;
            $Linea_de_pedido->moneda_importe = $Producto->moneda_importe;
            $Linea_de_pedido->cantidad = $cantidad;
            $Linea_de_pedido->moneda_importe_total = $Producto->moneda_importe*$cantidad;
            $Linea_de_pedido->save();  

            $carro_total = $Producto->moneda_importe*$cantidad; 
        }

        return $producto_id.'|'.$carro_cant.'|'.$carro_total;
    }

    public function backEndHome()
    {   
        //$Solicitudes = Solicitud::all();

        return View('welcome-back-end');
    }



    public function miCuenta()
    {   
        $user_id = Auth::user()->id;
        $User = User::find($user_id);

        return View('mi-cuenta')
        ->with('User', $User);
    }


    public function verNoticia($id)
    {   

        $pub_top = Publicidad::find(1);
        $pub_footer = Publicidad::find(11);

        $Destacadas = Noticia::select('noticias.id', 'noticias.titulo', 'noticias.seccion_id', 's.seccion', 'noticias.file_imagen', 's.colpick_color')
            ->join('secciones as s', 's.id', '=', 'noticias.seccion_id')
            ->where('sino_es_destacada', 'SI')
            ->orderBy('fecha', 'desc')
            ->get();

        $Noticia = Noticia::find($id);
        
        $pub_home_top_mercados = Publicidad::find(2);
        $Mercados = Mercado::all();

        return View('frontend.ver-noticia')
        ->with('pub_top', $pub_top)
        ->with('pub_footer', $pub_footer)
        ->with('Destacadas', $Destacadas)
        ->with('Noticia', $Noticia)
        ->with('pub_home_top_mercados', $pub_home_top_mercados)
        ->with('Mercados', $Mercados);
    }


    public function verVarietal($id)
    {   

        $Productos = Producto::where('varietal_id', $id)->get();

        $Varietal = Varietal::find($id);

        if ($Varietal->files_imagen == '') {
            $files_imagen_varietal = 'images/shop/banner_shop.jpg';
        }
        else {
            $files_imagen_varietal = $Varietal->files_imagen;
        }
        

        return View('frontend.ver-varietal')
        ->with('Productos', $Productos)
        ->with('files_imagen_varietal', $files_imagen_varietal)

        ->with('Varietal', $Varietal);
    }



    public function verSeccion($id)
    {   


        $Productos = DB::table('productos as p')
            ->select(DB::Raw('p.id, p.titulo_del_producto, p.moneda_importe, p.file_imagen_principal, COUNT(lp.id) cant'))
            ->leftjoin('varietales as v', 'v.id', '=', 'p.varietal_id')
            ->where('v.seccion_id', $id)
            ->get();

        $Seccion = Seccion::find($id);

        if ($Seccion->files_imagen == '') {
            $files_imagen_seccion = 'images/shop/banner_shop.jpg';
        }
        else {
            $files_imagen_seccion = $Seccion->files_imagen;
        }
        

        return View('frontend.ver-seccion')
        ->with('Productos', $Productos)
        ->with('files_imagen_seccion', $files_imagen_seccion)

        ->with('Seccion', $Seccion);
    }

}
