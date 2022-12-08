
@extends('layouts.frontend')


@section('head')
  <!-- Event snippet for evento de whatsapp conversion page In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. --> <script> function gtag_report_conversion(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-1040256887/DyHGCPGn6ZMCEPeehPAD', 'event_callback': callback }); return false; } </script>

    <!-- // SDK MercadoPago.js V2 -->
    <script src="https://sdk.mercadopago.com/js/v2"></script>
@endsection


@section('title')
  <?php echo $titulo ?> | Nautica Baum
@endsection


@section('iniciobody')
    <script type="text/javascript">
      function regComprarFB() {
        fbq('track', 'Purchase', {
            content_ids: 1,
            currency: 'ARS', 
            value: 1,
          content_type: 'product'
        });

      };
    </script>

    <style type="text/css">
        .btnCarrito {
            background-color: #FFF !important;

        }
    </style>
@endsection

@section('contenido')
  
    <link href="<?php echo ENV('PATH_PUBLIC') ?>css/shop.css" rel="stylesheet">
    <link href="<?php echo ENV('PATH_PUBLIC') ?>fonts/wine/font/flaticon.css" rel="stylesheet" type="text/css">
    <!-- page_header start -->
    <div class="page_header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12 col-sm-6">
                    <h1> <?php echo $titulo ?> </h1>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-6">
                    <div class="sub_title_section">
                        <ul class="sub_title">
                            <li> <a href="<?php echo env('PATH_PUBLIC')?>cart-list"> Carrito </a> <i class="fa fa-angle-right" aria-hidden="true"></i>  </li>
                            <li> Datos del Comprador</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page_header end -->

        <!--cart product wrapper Wrapper Start -->
    <div class="cart_product_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="btc_shop_single_prod_right_section shop_product_single_head related_pdt_shop_head">
                        <h1>Por favor indicanos tus datos</h1>
                        <p>Esto nos permitira contactarte para coordinar la entrega de los productos y definir los colores en caso de ser necesario</p>
                        <p>Tus Productos Seleccionados (<?php echo $varshome['carro_cant'] ?>)</p>
                    </div>
                </div>
                <div class="shop_cart_page_wrapper">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

                         {!! Form::open(array
                          (
                          'action' => 'HomeController@guardarDatosDelComprador', 
                          'role' => 'form',
                          'method' => 'POST',
                          'id' => 'formMiCuenta',
                          'enctype' => 'multipart/form-data',
                          'class' => 'form-horizontal'
                          )) 
                        !!}

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                {!! Form::input('text','nombre', old('nombre'), array('class' => 'form-control', 'placeholder' => 'Nombre', 'required')) !!}
                                <div class="bg-danger" id="_nombre">{{$errors->first('nombre')}}</div>
                            </div>

                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                {!! Form::input('text','apellido', old('apellido'), array('class' => 'form-control', 'placeholder' => 'Apellido', 'required')) !!}
                                <div class="bg-danger" id="_apellido">{{$errors->first('apellido')}}</div>
                            </div>
                            
                            <div class="form-group">
                                <label for="telefono">Telefono</label>
                                {!! Form::input('text','telefono', old('telefono'), array('class' => 'form-control', 'placeholder' => 'Telefono', 'required')) !!}
                                <div class="bg-danger" id="_telefono">{{$errors->first('telefono')}}</div>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                {!! Form::input('email','email', old('email'), array('class' => 'form-control', 'placeholder' => 'E-mail', 'required')) !!}                                
                                <div class="bg-danger" id="_email">{{$errors->first('email')}}</div>
                            </div>
                            
                            <div class="form-group">
                              <label for="provincia">Provincia</label>
                              {!! Form::select('provincia', $Provincias, old('provincia'), array('class' => 'form-control', 'required')) !!}
                              <div class="bg-danger" id="_provincia">{{$errors->first('provincia')}}</div>
                            </div>

                            
                            <div class="form-group">
                                <label for="localidad">Ciudad o localidad</label>
                                {!! Form::input('text','localidad', old('localidad'), array('class' => 'form-control', 'placeholder' => 'Ciudad o localidad', 'required')) !!}                                
                                <div class="bg-danger" id="_localidad">{{$errors->first('localidad')}}</div>
                            </div>

                            <div class="form-group">
                                <label for="domicilio">Domicilio</label>
                                {!! Form::input('text','domicilio', old('domicilio'), array('class' => 'form-control', 'placeholder' => 'Domicilio', 'required')) !!}                                
                              <div class="bg-danger" id="_domicilio">{{$errors->first('domicilio')}}</div>
                            </div>


                            <div class="form-group">
                                <label for="comentarios">Comentarios</label>
                                {!! Form::input('textarea','comentarios', old('comentarios'), array('class' => 'form-control', 'placeholder' => 'Comentarios u observaciones')) !!}
                                <div class="bg-danger" id="_comentarios">{{$errors->first('comentarios')}}</div>
                            </div>

                            <button type="submit" class="btn btn-primary">Continuar</button>

                        {!! Form::close() !!}    

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart product wrapper end -->
</div>
@endsection

