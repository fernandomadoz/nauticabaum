<?php

namespace App\Http\Controllers;
use App\Publicidad;
use App\Noticia;
use App\Slider;
use App\Producto;
use App\Imagen_de_producto;
use App\Pedido;
use App\Seccion;
use App\Linea_de_pedido;
use App\User;
use App\Imagen_de_galeria;
use App\Http\Requests\DatosCompradorRequest;

use MercadoPago;
use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ExtController;



class HomeController extends Controller
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

    public function index()
    {   
        $Secciones = Seccion::all();
        $Destacados = Producto::where('sino_es_destacado', 'SI')->get();
        $Nuevos = Producto::where('sino_es_nuevo', 'SI')->get();
        $Ofertas = Producto::where('sino_es_oferta', 'SI')->get();
        $Noticias = Noticia::where('sino_es_destacada', 'SI')->get();

        $MasVendidos = DB::table('productos as p')
            ->select(DB::Raw('p.id, p.titulo_del_producto, p.moneda_importe, p.file_imagen_principal, COUNT(lp.id) cant'))
            ->leftjoin('lineas_de_pedido as lp', 'p.id', '=', 'lp.producto_id')
            ->orderBy('cant', 'desc')
            ->groupBy('p.id')
            ->limit(9)
            ->get();

        $Slider = Slider::whereRaw('sino_es_combo IS NULL or sino_es_combo = "NO"')->orderBy('orden')->get();
        $Combo = Slider::where('sino_es_combo', 'SI')->get();

        $varshome = $this->varshome();


        $title = 'Home | NauticaBaum Kayaks';
        $description = 'Fabricación y venta de Kayaks singles, dobles, fibra de vidirio, remos, salvavidas, accesorios e indumentaria.';
        $keywords = 'kayak rosario, venta de kayak, precio kayak, comprar kayak, kayak doble, kayak single, cordoba, santa fe, rosario, bs as, rio negro, entre rios, buenos aires, cordoba, kayak travesia, remos para kayak, accesorios para kayak, kayak fibra de vidrio, salvavidas, indumentaria';
        $og_imagen = env('PATH_PUBLIC').'img/logo-cuadrado.png';
        $og_url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        return View('welcome')
        ->with('Secciones', $Secciones)
        ->with('Destacados', $Destacados)
        ->with('Nuevos', $Nuevos)
        ->with('Ofertas', $Ofertas)
        ->with('MasVendidos', $MasVendidos)
        ->with('Noticias', $Noticias)
        ->with('Slider', $Slider)
        ->with('Combo', $Combo)
        ->with('varshome', $varshome)
        ->with('title', $title)
        ->with('description', $description)
        ->with('keywords', $keywords)
        ->with('og_imagen', $og_imagen)
        ->with('og_url', $og_url);
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


    public function verNoticia($noticia_id)
    {   

        $Noticia = Noticia::find($noticia_id);

        //$Imagenes_de_producto = Imagen_de_producto::where('producto_id', $producto_id)->get();

        $varshome = $this->varshome();

        return View('frontend.ver-noticia')
        ->with('Noticia', $Noticia)
        ->with('varshome', $varshome);

    }





    public function verProducto($producto_id)
    {   
        $Secciones = Seccion::all();
        $Producto = Producto::find($producto_id);

        $Imagenes_de_producto = Imagen_de_producto::where('producto_id', $producto_id)->get();

        $varshome = $this->varshome();


        $title = 'Kayak '.$Producto->titulo_del_producto.' | NauticaBaum Kayaks';
        
        $description = $Producto->meta_description;

        if ($Producto->meta_keywords == '') {
            $keywords = "kayak  ". $Producto->titulo_del_producto."  rosario, venta de kayak  ". $Producto->titulo_del_producto." , precio kayak  ". $Producto->titulo_del_producto." , comprar kayak  ". $Producto->titulo_del_producto." , kayak  ". $Producto->titulo_del_producto.", cordoba, santa fe, rosario, rio negro, entre rios, buenos aires, cordoba, kayak travesia, kayak fibra de vidrio";
        }
        else {
            $keywords = $Producto->meta_keywords;    
        }
        
        $og_imagen = ENV('PATH_PUBLIC').'storage/'.$Producto->file_imagen_principal;
        $og_url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        return View('frontend.ver-producto')
        ->with('Secciones', $Secciones)
        ->with('Producto', $Producto)
        ->with('Imagenes_de_producto', $Imagenes_de_producto)
        ->with('varshome', $varshome)
        ->with('title', $title)
        ->with('description', $description)
        ->with('keywords', $keywords)
        ->with('og_imagen', $og_imagen)
        ->with('og_url', $og_url);
    }


    public function blog()
    {   

        $Noticias = Noticia::all();
        $varshome = $this->varshome();

        return View('frontend.noticias')
        ->with('Noticias', $Noticias)
        ->with('varshome', $varshome);
    }

    public function contacto()
    {   
        $Secciones = Seccion::all();
        $varshome = $this->varshome();

        $title = 'Contacto | NauticaBaum Kayaks';
        $description = 'Nautica Baum, Colombia bis 1039, Rosario, Santa Fe. Cel: 0341-155817439 (WhatsApp) - E-mail: nauticabaum@hotmail.com - Plazos de entrega, Formas de pago, envíos, garantías.';
        $keywords = 'tel nautica baum, email nautica baum, direccion nautica baum, kayak rosario, nautica baum';
        $og_imagen = env('PATH_PUBLIC').'img/logo-cuadrado.png';
        $og_url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];


        return View('frontend.contacto')
        ->with('Secciones', $Secciones)
        ->with('varshome', $varshome)
        ->with('title', $title)
        ->with('description', $description)
        ->with('keywords', $keywords)
        ->with('og_imagen', $og_imagen)
        ->with('og_url', $og_url);;
    }

    public function astillero()
    {   

        $title = 'Astillero Baum | NauticaBaum Kayaks';
        $description = 'El Astillero Baum tiene su origen a principios de 1975, cuando mi padre decidió construir veleros de diseño propio, que navegan hoy en día en diversos lagos y ríos del país.';
        $keywords = 'nautica baum, astillero, Astillero Baum, kayak rosario, Astillero nautica baum, fabricación de kayak, Embarcaciones Baum, kayak single, kayak doble abierto full, kayak doble cerrado, kayak doble abierto, kayak  ". $Producto->titulo_del_producto." , kayak single, kayak super especial, kayak single XL';
        $og_imagen = env('PATH_PUBLIC').'img/logo-cuadrado.png';
        $og_url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        $Secciones = Seccion::all();
        $varshome = $this->varshome();

        return View('frontend.astillero')
        ->with('Secciones', $Secciones)
        ->with('varshome', $varshome)
        ->with('title', $title)
        ->with('description', $description)
        ->with('keywords', $keywords)
        ->with('og_imagen', $og_imagen)
        ->with('og_url', $og_url);
    }


    public function comoComprar()
    {   

        $Secciones = Seccion::all();
        $varshome = $this->varshome();

        $title = 'Como Comprar | NauticaBaum Kayaks';
        $description = 'Toda la info de como comprar nuestros productos';
        $keywords = 'como comprar kayak, gastos de envio kayak, kayak single, kayak doble abierto full, kayak doble cerrado, kayak doble abierto, kayak, kayak single, kayak super especial, kayak single XL';
        $og_imagen = env('PATH_PUBLIC').'img/logo-cuadrado.png';
        $og_url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        return View('frontend.como-comprar')
        ->with('Secciones', $Secciones)
        ->with('varshome', $varshome)
        ->with('title', $title)
        ->with('description', $description)
        ->with('keywords', $keywords)
        ->with('og_imagen', $og_imagen)
        ->with('og_url', $og_url);
    }



    public function verSeccion($id)
    {   

        $Secciones = Seccion::all();
        $Productos = Producto::where('seccion_id', $id)->get();

        $Seccion = Seccion::find($id);

        if ($Seccion->file_imagen == '') {
            $file_imagen = ENV('PATH_PUBLIC').'images/shop/banner_shop.jpg';
        }
        else {
            $file_imagen = ENV('PATH_PUBLIC').'storage/'.$Seccion->file_imagen;
        }

        $titulo = $Seccion->seccion;
        $varshome = $this->varshome();

        $title = $Seccion->seccion.' | NauticaBaum Kayaks';
        $description = $Seccion->meta_description;
        $keywords = $Seccion->meta_keywords;
        $og_imagen = ENV('PATH_PUBLIC').'storage/'.$Seccion->file_imagen_principal;
        $og_url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        return View('frontend.list-productos')
        ->with('Secciones', $Secciones)
        ->with('Productos', $Productos)
        ->with('file_imagen', $file_imagen)
        ->with('titulo', $titulo)
        ->with('varshome', $varshome)
        ->with('title', $title)
        ->with('description', $description)
        ->with('keywords', $keywords)
        ->with('og_imagen', $og_imagen)
        ->with('og_url', $og_url);
    }




    public function galeria()
    {   

        $Secciones = Seccion::all();
        $Imagenes = Imagen_de_galeria::all();

        $varshome = $this->varshome();

        $title = 'Galeria de Imagenes | NauticaBaum Kayaks';
        $description = 'Nuestros kayak en plena acción. Fotos enviadas por nuestros clientes y amigos.';
        $keywords = 'imagenes nautica baum, imagenes kayak baum, imagenes Astillero Baum, imagenes kayak, kayak single, kayak doble abierto full, kayak doble cerrado, kayak doble abierto, kayak  ". $Producto->titulo_del_producto." , kayak single, kayak super especial, kayak single XL';
        $og_imagen = env('PATH_PUBLIC').'img/logo-cuadrado.png';
        $og_url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];


        return View('frontend.galeria')
        ->with('Secciones', $Secciones)
        ->with('Imagenes', $Imagenes)
        ->with('varshome', $varshome)
        ->with('title', $title)
        ->with('description', $description)
        ->with('keywords', $keywords)
        ->with('og_imagen', $og_imagen)
        ->with('og_url', $og_url);
    }




    public function resBusqueda()
    {   

        $Secciones = Seccion::all();
        $criterio = $_POST['criterio'];
        $Productos = Producto::whereRaw("titulo_del_producto like '%$criterio%'")->get();

        $file_imagen = '';
        $titulo = 'Resultados de Búsqueda: '.$criterio;

        $varshome = $this->varshome();


        $title = 'Home | NauticaBaum Kayaks';
        $description = 'Fabricación y venta de Kayaks singles, dobles, fibra de vidirio, remos, salvavidas, accesorios e indumentaria.';
        $keywords = 'kayak rosario, venta de kayak, precio kayak, comprar kayak, kayak doble, kayak single, cordoba, santa fe, rosario, bs as, rio negro, entre rios, buenos aires, cordoba, kayak travesia, remos para kayak, accesorios para kayak, kayak fibra de vidrio, salvavidas, indumentaria';
        $og_imagen = env('PATH_PUBLIC').'img/logo-cuadrado.png';
        $og_url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];


        return View('frontend.list-productos')
        ->with('Productos', $Productos)
        ->with('Secciones', $Secciones)
        ->with('file_imagen', $file_imagen)
        ->with('titulo', $titulo)
        ->with('varshome', $varshome)
        ->with('title', $title)
        ->with('description', $description)
        ->with('keywords', $keywords)
        ->with('og_imagen', $og_imagen)
        ->with('og_url', $og_url);
    }

    public function cartList()
    {   
        $Secciones = Seccion::all();
        $infoList = $this->infoList();

        $sesion_id = $infoList['sesion_id'];
        $titulo = $infoList['titulo'];
        $Lineas_de_pedido = $infoList['Lineas_de_pedido'];

        $varshome = $this->varshome();


        $title = 'Mi Carrito | NauticaBaum Kayaks';
        $description = 'Fabricación y venta de Kayaks singles, dobles, fibra de vidirio, remos, salvavidas, accesorios e indumentaria.';
        $keywords = 'kayak rosario, venta de kayak, precio kayak, comprar kayak, kayak doble, kayak single, cordoba, santa fe, rosario, bs as, rio negro, entre rios, buenos aires, cordoba, kayak travesia, remos para kayak, accesorios para kayak, kayak fibra de vidrio, salvavidas, indumentaria';
        $og_imagen = env('PATH_PUBLIC').'img/logo-cuadrado.png';
        $og_url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        

        return View('frontend.cart-list')
        ->with('Secciones', $Secciones)
        ->with('Lineas_de_pedido', $Lineas_de_pedido)
        ->with('titulo', $titulo)
        ->with('varshome', $varshome)
        ->with('title', $title)
        ->with('description', $description)
        ->with('keywords', $keywords)
        ->with('og_imagen', $og_imagen)
        ->with('og_url', $og_url);

    }


    public function delItem($id)
    {   
        $Secciones = Seccion::all();
        Linea_de_pedido::where('id', $id)->delete();

        $infoList = $this->infoList();

        $sesion_id = $infoList['sesion_id'];
        $titulo = $infoList['titulo'];
        $Lineas_de_pedido = $infoList['Lineas_de_pedido'];

        $varshome = $this->varshome();


        $title = 'Mi Carrito | NauticaBaum Kayaks';
        $description = 'Fabricación y venta de Kayaks singles, dobles, fibra de vidirio, remos, salvavidas, accesorios e indumentaria.';
        $keywords = 'kayak rosario, venta de kayak, precio kayak, comprar kayak, kayak doble, kayak single, cordoba, santa fe, rosario, bs as, rio negro, entre rios, buenos aires, cordoba, kayak travesia, remos para kayak, accesorios para kayak, kayak fibra de vidrio, salvavidas, indumentaria';
        $og_imagen = env('PATH_PUBLIC').'img/logo-cuadrado.png';
        $og_url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];


        return View('frontend.cart-list')
        ->with('Secciones', $Secciones)
        ->with('Lineas_de_pedido', $Lineas_de_pedido)
        ->with('titulo', $titulo)
        ->with('varshome', $varshome)
        ->with('title', $title)
        ->with('description', $description)
        ->with('keywords', $keywords)
        ->with('og_imagen', $og_imagen)
        ->with('og_url', $og_url);

    }

    public function infoList()
    {   
        $sesion_id = Session()->get('sesion_id');
        $Lineas_de_pedido = DB::table('productos as p')
            ->select(DB::Raw('lp.pedido_id, lp.id, lp.producto_id, p.titulo_del_producto, lp.moneda_importe, lp.moneda_importe_total, lp.cantidad, p.file_imagen_principal, s.seccion'))
            ->leftjoin('secciones as s', 's.id', '=', 'p.seccion_id')
            ->leftjoin('lineas_de_pedido as lp', 'p.id', '=', 'lp.producto_id')
            ->leftjoin('pedidos as pe', 'pe.id', '=', 'lp.pedido_id')
            ->where('pe.sesion_id', $sesion_id)
            ->whereRaw('(pe.sino_pedido_procesado IS NULL or pe.sino_pedido_procesado  = "NO")')
            ->get();



        $titulo = 'Carro de Pedido';
        $cantCarrito = $this->cantCarrito();


        $valores = [
            'cantCarrito' => $cantCarrito,
            'titulo' => $titulo,
            'sesion_id' => $sesion_id,
            'Lineas_de_pedido' => $Lineas_de_pedido
        ];

        return $valores;


    }

    public function varshome()
    {   

        $MasVendidos_3 = DB::table('productos as p')
            ->select(DB::Raw('p.id, p.titulo_del_producto, p.moneda_importe, p.file_imagen_principal, p.cantidad_de_estrellas, COUNT(lp.id) cant'))
            ->leftjoin('lineas_de_pedido as lp', 'p.id', '=', 'lp.producto_id')
            ->leftjoin('pedidos as pe', 'pe.id', '=', 'lp.pedido_id')
            ->whereRaw('(pe.sino_pedido_procesado IS NULL or pe.sino_pedido_procesado  = "NO")')
            ->orderBy('cant', 'desc')
            ->groupBy('p.id')
            ->limit(3)
            ->get();
        
        $RecienLlegados = Producto::orderBy('id', 'desc')
            ->limit(3)
            ->get();

        $Popular = Producto::where('sino_es_popular_destacado', 'SI')
            ->limit(1)
            ->get();

        $cantCarrito = $this->cantCarrito();

        $varshome = [
            'carro_cant' => $cantCarrito['carro_cant'],
            'carro_importe' => $cantCarrito['carro_importe'],
            'RecienLlegados' => $RecienLlegados,
            'MasVendidos_3' => $MasVendidos_3,
            'Popular' => $Popular
        ];

        return $varshome;
    }


    public function cantCarrito()
    {   

        $sesion_id = Session()->get('sesion_id');
        $cant_pedido = Pedido::where('sesion_id', $sesion_id)
            ->whereRaw('(sino_pedido_procesado IS NULL or sino_pedido_procesado  = "NO")')->count();
        if ($cant_pedido > 0) {
            $Pedido = Pedido::where('sesion_id', $sesion_id)->get();
            $Lineas_de_pedido = Linea_de_pedido::where('pedido_id', $Pedido[0]->id)->get();
            $carro_cant = Linea_de_pedido::where('pedido_id', $Pedido[0]->id)->count();
            $carro_importe = 0;
            foreach ($Lineas_de_pedido as $linea) {
                $carro_importe = $carro_importe + $linea->moneda_importe_total;
            }
        } 
        else {
            $carro_cant = 0;
            $carro_importe = 0;

        }

        $cantCarrito = [
            'carro_cant' => $carro_cant,
            'carro_importe' => $carro_importe
            ];

        return $cantCarrito;
    }

    public function enviarPedido()
    {   
        $Secciones = Seccion::all();
        $sesion_id = Session()->get('sesion_id');
        $Pedido = Pedido::where('sesion_id', $sesion_id)
            ->whereRaw('(sino_pedido_procesado IS NULL or sino_pedido_procesado  = "NO")')->get();
        $pedido_id = $Pedido[0]->id;
        $Lineas_de_pedido = DB::table('productos as p')
            ->select(DB::Raw('lp.id, lp.producto_id, p.titulo_del_producto, lp.moneda_importe, lp.moneda_importe_total, lp.cantidad, p.file_imagen_principal, s.seccion'))
            ->leftjoin('secciones as s', 's.id', '=', 'p.seccion_id')
            ->leftjoin('lineas_de_pedido as lp', 'p.id', '=', 'lp.producto_id')
            ->leftjoin('pedidos as pe', 'pe.id', '=', 'lp.pedido_id')
            ->where('pe.sesion_id', $sesion_id)
            ->whereRaw('(pe.sino_pedido_procesado IS NULL or pe.sino_pedido_procesado  = "NO")')
            ->get();

        $texto_inicio = 'Hola NauticaBaum quiero conocer los medios de pagos para hacer el siguiente Pedido '."\n"."\n";
        $texto_productos = '';
        $total = 0;
        foreach ($Lineas_de_pedido as $Linea) {
            $texto_productos .= $Linea->cantidad.' '.$Linea->titulo_del_producto."\n";
            $total = $total+$Linea->moneda_importe_total;
        }

        
        $texto_final = "\n".'*Total: $ '.$total.'*';
        $texto_final .= "\n"."\n".'_Pedido (#'.$pedido_id.')_';
        $texto = $texto_inicio.$texto_productos.$texto_final;
        $texto_encode = urlencode($texto);


        $url = 'https://api.whatsapp.com/send?phone=5493415817439&text='.$texto_encode;
        $Pedido = Pedido::find($pedido_id);
        $Pedido->moneda_importe_total = $total;
        $Pedido->sino_solicitado = 'SI';        
        $Pedido->save();


        $titulo = '';
        $varshome = $this->varshome();
/*
        return View('frontend.enviar-pedido')
        ->with('Secciones', $Secciones)
        ->with('url', $url)
        ->with('Pedido', $Pedido)
        ->with('titulo', $titulo)
        ->with('varshome', $varshome);
*/
        return redirect($url);

    }





    public function bodyProductView()
    {   

        $producto_id = $_POST['producto_id'];

        $Producto = Producto::find($producto_id);

        $Imagenes_de_producto = Imagen_de_producto::where('producto_id', $producto_id)->get();



        return View('frontend.body-modal-product-view')
        ->with('Producto', $Producto)
        ->with('Imagenes_de_producto', $Imagenes_de_producto);
    }


    public function datosDelComprador()
    {   
        $Secciones = Seccion::all();
        $infoList = $this->infoList();

        $sesion_id = $infoList['sesion_id'];
        $titulo = $infoList['titulo'];
        $Lineas_de_pedido = $infoList['Lineas_de_pedido'];

        $varshome = $this->varshome();


        $title = 'Mi Carrito | NauticaBaum Kayaks';
        $description = 'Fabricación y venta de Kayaks singles, dobles, fibra de vidirio, remos, salvavidas, accesorios e indumentaria.';
        $keywords = 'kayak rosario, venta de kayak, precio kayak, comprar kayak, kayak doble, kayak single, cordoba, santa fe, rosario, bs as, rio negro, entre rios, buenos aires, cordoba, kayak travesia, remos para kayak, accesorios para kayak, kayak fibra de vidrio, salvavidas, indumentaria';
        $og_imagen = env('PATH_PUBLIC').'img/logo-cuadrado.png';
        $og_url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        $Provincias = array(
            "Buenos Aires" => "Buenos Aires",
            "Catamarca" => "Catamarca",
            "Chaco" => "Chaco",
            "Chubut" => "Chubut",
            "Córdoba" => "Córdoba",
            "Corrientes" => "Corrientes",
            "Entre Ríos" => "Entre Ríos",
            "Formosa" => "Formosa",
            "Jujuy" => "Jujuy",
            "La Pampa" => "La Pampa",
            "La Rioja" => "La Rioja",
            "Mendoza" => "Mendoza",
            "Misiones" => "Misiones",
            "Neuquén" => "Neuquén",
            "Río Negro" => "Río Negro",
            "Salta" => "Salta",
            "San Juan" => "San Juan",
            "San Luis" => "San Luis",
            "Santa Cruz" => "Santa Cruz",
            "Santa Fe" => "Santa Fe",
            "Santiago del Estero" => "Santiago del Estero",
            "Tierra del Fuego" => "Tierra del Fuego",
            "Tucumán" => "Tucumán",
        );
        

        //dd($preference->id);
        

        return View('frontend.datos-del-comprador')
        ->with('Secciones', $Secciones)
        ->with('Lineas_de_pedido', $Lineas_de_pedido)
        ->with('titulo', $titulo)
        ->with('varshome', $varshome)
        ->with('title', $title)
        ->with('description', $description)
        ->with('keywords', $keywords)
        ->with('og_imagen', $og_imagen)
        ->with('og_url', $og_url)
        ->with('Provincias', $Provincias);

    }


    public function guardarDatosDelComprador(DatosCompradorRequest $request)
    {   
        $Secciones = Seccion::all();
        $infoList = $this->infoList();

        $sesion_id = $infoList['sesion_id'];
        $titulo = $infoList['titulo'];
        $Lineas_de_pedido = $infoList['Lineas_de_pedido'];

        $varshome = $this->varshome();


        $title = 'Mi Carrito | NauticaBaum Kayaks';
        $description = 'Fabricación y venta de Kayaks singles, dobles, fibra de vidirio, remos, salvavidas, accesorios e indumentaria.';
        $keywords = 'kayak rosario, venta de kayak, precio kayak, comprar kayak, kayak doble, kayak single, cordoba, santa fe, rosario, bs as, rio negro, entre rios, buenos aires, cordoba, kayak travesia, remos para kayak, accesorios para kayak, kayak fibra de vidrio, salvavidas, indumentaria';
        $og_imagen = env('PATH_PUBLIC').'img/logo-cuadrado.png';
        $og_url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        $Pedido = Pedido::find($Lineas_de_pedido[0]->pedido_id);
        $Pedido->nombre = $request->input('nombre');
        $Pedido->apellido = $request->input('apellido');
        $Pedido->email = $request->input('email');
        $Pedido->telefono = $request->input('telefono');
        $Pedido->domicilio = $request->input('domicilio');
        $Pedido->localidad = $request->input('localidad');
        $Pedido->provincia = $request->input('provincia');
        $Pedido->comentarios = $request->input('comentarios');
        $Pedido->save();        

        $preference = $this->crearPreferenceMP($Lineas_de_pedido);
        

        return View('frontend.seleccionar-medio-de-pago')
        ->with('Secciones', $Secciones)
        ->with('Lineas_de_pedido', $Lineas_de_pedido)
        ->with('titulo', $titulo)
        ->with('varshome', $varshome)
        ->with('title', $title)
        ->with('description', $description)
        ->with('keywords', $keywords)
        ->with('og_imagen', $og_imagen)
        ->with('og_url', $og_url)
        ->with('preference', $preference);

    }

    public function crearPreferenceMP($Lineas_de_pedido) {

        //$MercadoPago = new MercadoPago();
        MercadoPago::setAccessToken(ENV('MP_ACCESS_TOKEN'));

        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();

        $preference->back_urls = array(
            "success" => ENV('PATH_PUBLIC').'compra-mp-success',
            "failure" => ENV('PATH_PUBLIC').'compra-mp-failure',
            "pending" => ENV('PATH_PUBLIC').'compra-mp-pending'
        );
        $preference->auto_return = "approved";

        $items = array();
        foreach ($Lineas_de_pedido as $linea) {
            // Crea un ítem en la preferencia
            $item = new MercadoPago\Item();
            $item->id = $linea->producto_id;
            $item->title = $linea->titulo_del_producto;
            $item->quantity = $linea->cantidad;
            $item->currency_id = "ARS";
            $item->unit_price = $linea->moneda_importe;
            //$preference->items = array($item);

            array_push($items, $item);

        }
        $preference->items = $items;
        $preference->save();

        return $preference;
    }


    public function compraMPFailure(Request $request)
    {   
        $Secciones = Seccion::all();
        $infoList = $this->infoList();

        $sesion_id = $infoList['sesion_id'];
        $titulo = $infoList['titulo'];
        $Lineas_de_pedido = $infoList['Lineas_de_pedido'];

        $varshome = $this->varshome();


        $title = 'Mi Carrito | NauticaBaum Kayaks';
        $description = 'Fabricación y venta de Kayaks singles, dobles, fibra de vidirio, remos, salvavidas, accesorios e indumentaria.';
        $keywords = 'kayak rosario, venta de kayak, precio kayak, comprar kayak, kayak doble, kayak single, cordoba, santa fe, rosario, bs as, rio negro, entre rios, buenos aires, cordoba, kayak travesia, remos para kayak, accesorios para kayak, kayak fibra de vidrio, salvavidas, indumentaria';
        $og_imagen = env('PATH_PUBLIC').'img/logo-cuadrado.png';
        $og_url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        $Pedido = Pedido::find($Lineas_de_pedido[0]->pedido_id);
        $Pedido->sino_pedido_procesado = 'NO';
        $Pedido->metodo_del_pago = 'Mercado Pago';
        $Pedido->estado_del_pago = 'Fallo el Pago';
        $Pedido->collection_id = $request->collection_id;
        $Pedido->collection_status = $request->collection_status;
        $Pedido->payment_id = $request->payment_id;
        $Pedido->status = $request->status;
        $Pedido->external_reference = $request->external_reference;
        $Pedido->payment_type = $request->payment_type;
        $Pedido->merchant_order_id = $request->merchant_order_id;
        $Pedido->preference_id = $request->preference_id;
        $Pedido->site_id = $request->site_id;
        $Pedido->processing_mode = $request->processing_mode;
        $Pedido->merchant_account_id = $request->merchant_account_id;
        $Pedido->save();        

        $preference = $this->crearPreferenceMP($Lineas_de_pedido);        

        $mensaje = 'ERROR: Por alguna razón su pago ha fallado, y no hemos podido procesarlo. Vuelva a intentarlo o comuniquese con nosotros a nuestra linea de WhatsApp: <a href="https://api.whatsapp.com/send?phone=5493415817439&text=Hola%20NauticaBaum%20estoy%20teniendo%20problemas%20para%20procesar%20el%20pago%20de%20mercadopago,%20mi%20pedido%20es%20el%20id:%20'.$Pedido->id.'">+549 341-5817439</a>!';
        $class_mensaje = 'box_message_failure';

        return View('frontend.seleccionar-medio-de-pago')
        ->with('Secciones', $Secciones)
        ->with('Lineas_de_pedido', $Lineas_de_pedido)
        ->with('titulo', $titulo)
        ->with('varshome', $varshome)
        ->with('title', $title)
        ->with('description', $description)
        ->with('keywords', $keywords)
        ->with('og_imagen', $og_imagen)
        ->with('og_url', $og_url)
        ->with('preference', $preference)
        ->with('mensaje', $mensaje)
        ->with('class_mensaje', $class_mensaje);

    }


    public function compraMPSuccess(Request $request)
    {   
        $Secciones = Seccion::all();
        $infoList = $this->infoList();
        $Lineas_de_pedido = $infoList['Lineas_de_pedido'];



        $title = 'Mi Carrito | NauticaBaum Kayaks';
        $description = 'Fabricación y venta de Kayaks singles, dobles, fibra de vidirio, remos, salvavidas, accesorios e indumentaria.';
        $keywords = 'kayak rosario, venta de kayak, precio kayak, comprar kayak, kayak doble, kayak single, cordoba, santa fe, rosario, bs as, rio negro, entre rios, buenos aires, cordoba, kayak travesia, remos para kayak, accesorios para kayak, kayak fibra de vidrio, salvavidas, indumentaria';
        $og_imagen = env('PATH_PUBLIC').'img/logo-cuadrado.png';
        $og_url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        $Pedido = Pedido::find($Lineas_de_pedido[0]->pedido_id);
        $Pedido->sino_pedido_procesado = 'SI';
        $Pedido->metodo_del_pago = 'Mercado Pago';
        $Pedido->estado_del_pago = 'Pago Exitoso';
        $Pedido->collection_id = $request->collection_id;
        $Pedido->collection_status = $request->collection_status;
        $Pedido->payment_id = $request->payment_id;
        $Pedido->status = $request->status;
        $Pedido->external_reference = $request->external_reference;
        $Pedido->payment_type = $request->payment_type;
        $Pedido->merchant_order_id = $request->merchant_order_id;
        $Pedido->preference_id = $request->preference_id;
        $Pedido->site_id = $request->site_id;
        $Pedido->processing_mode = $request->processing_mode;
        $Pedido->merchant_account_id = $request->merchant_account_id;
        $Pedido->save();        

        $infoList = $this->infoList();
        $Lineas_de_pedido = $infoList['Lineas_de_pedido'];
        $preference = $this->crearPreferenceMP($Lineas_de_pedido);        

        $sesion_id = $infoList['sesion_id'];
        $titulo = $infoList['titulo'];
        $Lineas_de_pedido = $infoList['Lineas_de_pedido'];

        $varshome = $this->varshome();

        $mensaje = 'Felicitaciones: Su pedido ha sido procesado, en breve nos comunicaremos con Ud. mediante sus datos de contacto o bien escribanos a nuestros telefonos que figuran en esta página o a nuestra linea de WhatsApp: <a href="https://api.whatsapp.com/send?phone=5493415817439&text=Hola%20NauticaBaum%20he%20pagado%20mi%20pedido%20nro:%20'.$Pedido->id.'%20y%20quisiera%20coordinar%20los%20detalles%20de%20la%20entrega">+549 341-5817439</a>';
        
        $class_mensaje = 'box_message_success';

        return View('frontend.seleccionar-medio-de-pago')
        ->with('Secciones', $Secciones)
        ->with('Lineas_de_pedido', $Lineas_de_pedido)
        ->with('titulo', $titulo)
        ->with('varshome', $varshome)
        ->with('title', $title)
        ->with('description', $description)
        ->with('keywords', $keywords)
        ->with('og_imagen', $og_imagen)
        ->with('og_url', $og_url)
        ->with('preference', $preference)
        ->with('mensaje', $mensaje)
        ->with('class_mensaje', $class_mensaje);

    }



    public function compraMPPending(Request $request)
    {   
        $Secciones = Seccion::all();
        $infoList = $this->infoList();
        $Lineas_de_pedido = $infoList['Lineas_de_pedido'];



        $title = 'Mi Carrito | NauticaBaum Kayaks';
        $description = 'Fabricación y venta de Kayaks singles, dobles, fibra de vidirio, remos, salvavidas, accesorios e indumentaria.';
        $keywords = 'kayak rosario, venta de kayak, precio kayak, comprar kayak, kayak doble, kayak single, cordoba, santa fe, rosario, bs as, rio negro, entre rios, buenos aires, cordoba, kayak travesia, remos para kayak, accesorios para kayak, kayak fibra de vidrio, salvavidas, indumentaria';
        $og_imagen = env('PATH_PUBLIC').'img/logo-cuadrado.png';
        $og_url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        $Pedido = Pedido::find($Lineas_de_pedido[0]->pedido_id);
        $Pedido->sino_pedido_procesado = 'SI';
        $Pedido->metodo_del_pago = 'Mercado Pago';
        $Pedido->estado_del_pago = 'Pago Pendiente';
        $Pedido->collection_id = $request->collection_id;
        $Pedido->collection_status = $request->collection_status;
        $Pedido->payment_id = $request->payment_id;
        $Pedido->status = $request->status;
        $Pedido->external_reference = $request->external_reference;
        $Pedido->payment_type = $request->payment_type;
        $Pedido->merchant_order_id = $request->merchant_order_id;
        $Pedido->preference_id = $request->preference_id;
        $Pedido->site_id = $request->site_id;
        $Pedido->processing_mode = $request->processing_mode;
        $Pedido->merchant_account_id = $request->merchant_account_id;
        $Pedido->save();        

        $infoList = $this->infoList();
        $Lineas_de_pedido = $infoList['Lineas_de_pedido'];
        $preference = $this->crearPreferenceMP($Lineas_de_pedido);        

        $sesion_id = $infoList['sesion_id'];
        $titulo = $infoList['titulo'];
        $Lineas_de_pedido = $infoList['Lineas_de_pedido'];

        $varshome = $this->varshome();

        $mensaje = 'Felicitaciones: Su pedido ha sido enviado, y su pago ha quedado pendiente, en breve nos comunicaremos con Ud. mediante sus datos de contacto o bien escribanos a nuestros telefonos que figuran en esta página o a nuestra linea de WhatsApp: <a href="https://api.whatsapp.com/send?phone=5493415817439&text=Hola%20NauticaBaum%20he%20pagado%20mi%20pedido%20nro:%20'.$Pedido->id.'%20y%20quisiera%20coordinar%20los%20detalles%20de%20la%20entrega">+549 341-5817439</a>';

        $class_mensaje = 'box_message_pending';

        return View('frontend.seleccionar-medio-de-pago')
        ->with('Secciones', $Secciones)
        ->with('Lineas_de_pedido', $Lineas_de_pedido)
        ->with('titulo', $titulo)
        ->with('varshome', $varshome)
        ->with('title', $title)
        ->with('description', $description)
        ->with('keywords', $keywords)
        ->with('og_imagen', $og_imagen)
        ->with('og_url', $og_url)
        ->with('preference', $preference)
        ->with('mensaje', $mensaje)
        ->with('class_mensaje', $class_mensaje);


    }
}
