<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'sesion'], function () {	
	Route::get('/', 'HomeController@index');
	Route::get('/home', 'HomeController@index');
	Route::get('/noticia/{id}', 'HomeController@verNoticia');
	Route::get('/varietal/{id}', 'HomeController@verVarietal');
	Route::get('/seccion/{id}', 'HomeController@verSeccion');
	Route::get('/producto/{id}', 'HomeController@verProducto');
	Route::get('/noticia/{id}', 'HomeController@verNoticia');
	Route::post('/body-product-view', 'HomeController@bodyProductView');
	Route::get('/blog', 'HomeController@blog');

	Route::get('/galeria-de-fotos', 'HomeController@galeria');
	Route::get('/como-comprar', 'HomeController@comoComprar');
	Route::get('/astillero', 'HomeController@astillero');
	Route::get('/contacto', 'HomeController@contacto');

	Route::get('/del-item/{id}', 'HomeController@delItem');
	Route::post('/search', 'HomeController@resBusqueda');
	Route::post('/additem', 'CartController@addItem');

	Route::get('/cart-list', 'HomeController@cartList');
	Route::get('/enviar-pedido', 'HomeController@enviarPedido');
	Route::get('/datos-del-comprador', 'HomeController@datosDelComprador');	
	Route::post('/guardar-datos-del-comprador', 'HomeController@guardarDatosDelComprador');
	Route::get('/compra-mp-success', 'HomeController@compraMPSuccess');	
	Route::get('/compra-mp-failure', 'HomeController@compraMPFailure');	
	Route::get('/compra-mp-pending', 'HomeController@compraMPPending');	
	


});


	

Route::group(['middleware' => 'auth'], function () {

	Route::get('/backend/home', 'HomeController@backEndHome');

	// RUTAS GENERICAS
	Route::post('/crearlista', 'GenericController@crearLista');
	Route::post('/crearabm', 'GenericController@crearABM');
	Route::post('/enviarabm/{gen_modelo}', 'GenericController@crearABM');
	Route::post('/store', 'GenericController@store');
	Route::get('/list/{gen_modelo}/{gen_opcion}', 'GenericController@index');
	// FIN RUTAS GENERICAS

	Route::get('/list/Pedido/ver-pedido/{pedido_id}', 'HomeController@verPedido');
	Route::get('/ver-pedido/{pedido_id}', 'HomeController@verPedido');



});

Route::get('/prueba', function () {
    return view('prueba');
});	


Auth::routes();

Route::get('/delcache', function () {
    $exitCode = Artisan::call('cache:clear');
    echo 'Cache Borrada';
});



//FORMS
