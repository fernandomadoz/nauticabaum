
    


@extends('layouts.frontend')


@section('title')
  Como comprar | Nautica Baum
@endsection

@section('contenido')

    <link href="<?php echo ENV('PATH_PUBLIC') ?>css/shop.css" rel="stylesheet">


  
    <link href="<?php echo ENV('PATH_PUBLIC') ?>fonts/wine/font/flaticon.css" rel="stylesheet" type="text/css">
    <!-- page_header start -->
    <div class="page_header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12 col-sm-6">
                    <h1> Como comprar </h1>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-6">
                    <div class="sub_title_section">
                        <ul class="sub_title">
                            <li> <a href="<?php echo env('PATH_PUBLIC')?>"> Home </a> <i class="fa fa-angle-right" aria-hidden="true"></i> </li>
                            <li> Como comprar </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page_header end -->

  <!-- shop sidebar wrapper start -->
    <div class="shop_sidebar_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="sidebar_shop_right">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                              <div class="ck ck-content ck-editor__editable ck-rounded-corners ck-editor__editable_inline ck-blurred" lang="en" dir="ltr" role="textbox" aria-label="Rich Text Editor, main" contenteditable="true"><p><strong>¿Cómo compro ON-LINE?</strong><br>Navegue los distintos modelos de kayak o sus accesorios o remos.<br>Una vez que decida su compra diríjase al botón <strong>COMPRAR</strong>. Le aparecerá una pantalla para decidir cómo realizar su pago. Una vez elegida la forma de pago, seleccione el botón FINALIZAR COMPRA.<br>Si eligió Transferencia Bancaria le aparecerá un formulario, complete y envíe sus inquietudes. Le llegará una respuesta a la brevedad.<br>Si su elección fue Mercado Pago, una vez que clickee el botón FINALIZAR COMPRA, se le abrirá una página nueva, correspondiente a Mercado Pago. Una vez que seleccionó esto podrá seguir las indicaciones de las pantallas.<br>Si no puede visualizar la pantalla de Mercado Pago, busque en su explorador la opción "permitir elementos emergentes en este sitio".<br><br>Si su compra es de varios productos, o la cantidad varía, escriba el número correspondiente y seleccione el botón ACTUALIZAR COMPRA, y podrá ver el precio final de su compra.<br><br><strong>Gastos de Envío</strong><br>Consulte el link <strong>Envíos y Transportes</strong>, ahí mismo figuran los gastos para cada provincia o zona de la República Argentina</p><p><strong>¿Quién me entrega mis productos?</strong><br>Consultar la guía y costos de los Transportes.<br>En caso Ud. prefiera otro modo de envío, agradeceremos remitir la información necesaria (domicilio, teléfono y persona de contacto si existiese), para coordinar la entrega a través del Expreso que usted desee</p><p><strong>¿Puedo informarme sobre el estado del envío?</strong><br>Al confirmar el envío, informaremos vía email, el número de guía o remito y datos del transporte.<br>También puede realizar sus consultas de seguimiento de envíos llamando por teléfono a los Teléfonos o mail de contacto.</p><p><strong>¿Cuáles son los tiempos de entrega de los productos?</strong><br>Son coordinados en el momento de la compra dependiendo temporada del año, condiciones climáticas y distancia de entrega.<br><strong>¿Desde dónde puedo comprar?</strong><br>Desde cualquier localidad del territorio argentino.</p><p><strong>¿Dónde me entregan los productos?</strong><br>Realizaremos la &nbsp;entrega en el domicilio que nos indique si es de Rosario, en depósito del transporte o por retiro personalmente.<br>Es importante que al registrarse ingrese los datos de un domicilio real. También tiene la opción de registrar un domicilio diferente al registrado cuando finaliza la selección de los productos de su compra (Ejemplos: regalos, viajes, mudanzas, etc.).</p><p><strong>¿En qué moneda han expresado los Precios?</strong><br>Todos los precios están en pesos argentinos.</p><p><strong>¿Cuál es el monto mínimo para mis compras?</strong><br>Un artículo.</p><p><strong>¿Existe algún tipo de descuento cuando compro al por mayor?</strong><br>Para consultar por compras al por mayor, escríbanos a nauticabaum@hotmail.com corresponde la aplicación de descuento por &nbsp;cantidad.</p><p><strong>¿Puedo comercializar la marca dentro del territorio de la República Argentina?</strong><br>Envíenos un e-mail con sus datos y propuesta.</p><p><strong>¿Cómo sé que mi compra fue aceptada?</strong><br>Confirmación &nbsp;compra: la confirmación de compra se realiza a través del pago de una seña por depósito bancario o entrega en forma personal o en el caso de elegir la opción tarjetas&nbsp; con&nbsp; Mercado Pago cuando se acredite el pago en dicho sitio (en Gral. 48 hs). En todos los casos se informa al cliente que ya fue aceptada su compra.<br>Cualquier información adicional puede ponerse en <a href="https://www.nauticabaum.com.ar/v2/index_main.asp?mod=infocompra#">contacto</a> con nosotros.</p></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- shop sidebar end -->
@endsection

