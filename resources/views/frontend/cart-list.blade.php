
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
                            <li> <a href="<?php echo env('PATH_PUBLIC')?>"> Home </a> <i class="fa fa-angle-right" aria-hidden="true"></i> </li>
                            <li> <?php echo $titulo ?> </li>
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
                <?php if ($Lineas_de_pedido->count() > 0) { ?>                
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="btc_shop_single_prod_right_section shop_product_single_head related_pdt_shop_head">
                            <h1>Tus Productos Seleccionados (<?php echo $varshome['carro_cant'] ?>)</h1>
                            <p>Los colores del producto a comprar serán indicados via mail o telefónicamente</p>
                        </div>
                    </div>
                    <div class="shop_cart_page_wrapper">
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="table-responsive cart-calculations">
                                <table class="table">

                                    <thead class="cart_table_heading">
                                        <tr>
                                            <th>item</th>

                                            <th>Producto</th>
                                            <th>Detalle</th>
                                            <th>Precio</th>

                                            <th>Cantidad</th>

                                            <th>Precio Total</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $i=0; 
                                        foreach ($Lineas_de_pedido as $Linea) { 
                                            $i++; 
                                        ?>
                                          <tr>
                                              <td>
                                                  <?php echo $i ?>
                                              </td>
                                              <td>
                                                <a href="<?php echo ENV('PATH_PUBLIC') ?>producto/<?php echo $Linea->producto_id ?>">
                                                  <div class="table_cart_img">
                                                     
                                                          <img src="<?php echo ENV('PATH_PUBLIC') ?>storage/<?php echo $Linea->file_imagen_principal ?>" alt=""  style="max-width: 100px" />
                                                     
                                                  </div>
                                                  </a>
                                              </td>
                                              <td>
                                                
                                                  <div class="table_cart_cntnt">
                                                    <a href="<?php echo ENV('PATH_PUBLIC') ?>producto/<?php echo $Linea->producto_id ?>">
                                                      <h1><?php echo $Linea->titulo_del_producto ?></h1>
                                                    </a>
                                                      <p><?php echo $Linea->seccion ?></p>
                                                  </div>
                                              </td>
                                              <td class="cart_page_price">$<?php echo number_format($Linea->moneda_importe, 2, ',', '.') ?></td>
                                              <td>
                                                  <?php echo $Linea->cantidad ?>
                                              </td>
                                              <td class="cart_page_totl">$<?php echo number_format($Linea->moneda_importe_total, 2, ',', '.') ?></td>
                                              <td>
                                                  <a href="<?php echo ENV('PATH_PUBLIC') ?>del-item/<?php echo $Linea->id ?>"> <i class="fa fa-trash"></i></a>
                                              </td>
                                          </tr>
                                        <?php } ?>


                                        <tr>
                                            <td colspan="4"> 
                                                <div class="shop_btn_wrapper shop_car_btn_wrapper">
                                                    <ul>
                                                        <li><a href="<?php echo ENV('PATH_PUBLIC') ?>datos-del-comprador">Pagar</a></li>
                                                        <li><a href="<?php echo ENV('PATH_PUBLIC') ?>">Continuar Comprando</a></li>

                                                    </ul>
                                                </div>
                                            </td>

                                            <td class="cart_btn_cntnt"> Total : <span>$ <?php echo number_format($varshome['carro_importe'], 2, ',', '.') ?> </span> </td>
                                            <td></td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                            
                        </div>
                    </div>
                <?php } 
                else { ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="btc_shop_single_prod_right_section shop_product_single_head related_pdt_shop_head">
                            <h1>Tus Productos Seleccionados (<?php echo $varshome['carro_cant'] ?>)</h1>
                            <p>Tu carrito esta vacio</p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- cart product wrapper end -->

@endsection

