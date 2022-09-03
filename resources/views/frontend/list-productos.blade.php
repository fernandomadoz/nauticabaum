
    


@extends('layouts.frontend')


@section('title')
  <?php echo $titulo ?> | Nautica Baum
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

  <!-- shop sidebar wrapper start -->
    <div class="shop_sidebar_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="sidebar_shop_right">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="sidebar_widget">
                                    <div class="sc_shop_add">
                                      <?php if ($file_imagen <> '') { ?>
                                        <img src="<?php echo $file_imagen ?>" class="img-responsive" alt="shop_img" style="width: 100%" />
                                      <?php } ?>
                                    </div>
                                </div>
                                <div class="sidebar_widget">
                                    <div class="filter-area">
                                        <div class="showpro">
                                            <!--p><span>Mostrando 1-9</span> de 256 Resultados</p-->
                                        </div>
                                       <div class="list-grid">
                                            <ul class="list-inline nav nav-pills">
                                                <li class="active"><a data-toggle="pill" href="#grid"><i class="fa fa-th-large"></i></a></li>
                                                <li><a data-toggle="pill" href="#list"><i class="fa fa-list"></i></a></li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="tab-content btc_shop_index_content_tabs_main">
                                    <div id="grid" class="tab-pane fade in active">
                                        <div class="row">
                                          <?php foreach ($Productos as $Producto) { ?>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="btc_shop_indx_cont_box_wrapper">
                                                    <div class="btc_shop_indx_img_wrapper">
                                                        <?php if ($Producto->sino_agotado == 'SI') { ?>
                                                          <span class="btc_shop_price btc_shop_new"  style="width: 80px; background-color: #999">Agotado</span>
                                                        <?php } 
                                                        else { ?>                                
                                                            <?php if ($Producto->sino_es_nuevo == 'SI') { ?>
                                                            <span class="btc_shop_price btc_shop_new">Nuevo</span>
                                                            <?php } ?>
                                                        <?php } ?>
                                                        <img src="<?php echo ENV('PATH_PUBLIC') ?>storage/<?php echo $Producto->file_imagen_principal ?>" alt="<?php echo $Producto->titulo_del_producto ?>" class="img-responsive" />
                                                        <div class="cc_li_img_overlay">
                                                            <div class="cc_li_img_text">
                                                                <ul>
                                                                  <a href="#" class="quick_link" data-toggle="modal" data-target="#product_view" title="Vista Rapida" v-on:click="bodyProdcutView(<?php echo $Producto->id ?>)">
                                                                    <i class="fa fa-eye"></i>
                                                                  </a>
                                                                  
                                                                  <!--a href="#" class="btn_like" title="Agregar al carrito">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                  </a-->
                                                                  
                                                                </ul>
                                                          </div>
                                                      </div>
                                                    </div>

                                                    <div class="btc_shop_indx_img_cont_wrapper">

                                                        <h1><a href="<?php echo ENV('PATH_PUBLIC') ?>producto/<?php echo $Producto->id ?>">
                                                          <?php 
                                                          /*
                                                          if (strlen($Producto->titulo_del_producto) > 25) {
                                                            $titulo_del_producto = substr($Producto->titulo_del_producto, 0, 22).'...';
                                                          }
                                                          else {
                                                            $titulo_del_producto = $Producto->titulo_del_producto;
                                                          }
                                                          */
                                                          $titulo_del_producto = $Producto->titulo_del_producto;
                                                          ?>
                                                          <?php echo $titulo_del_producto ?></a></h1><br>
                                                        <h5>$ <?php echo number_format($Producto->moneda_importe, 2, ',', '.') ?></h5>
                                                        <div class="cc_li_cont_wrapper">
                                                          <?php 
                                                          for ($i=1; $i<=5; $i++) { 
                                                            
                                                            if ($Producto->cantidad_de_estrellas >= $i) {
                                                              $o = '';
                                                            }
                                                            else {
                                                              $o = '-o';  
                                                            }
                                                            echo '<i class="fa fa-star'.$o.'"></i>';
                                                          }
                                                          ?>
                                                        </div>
                                                        <?php if ($Producto->sino_agotado <> 'SI') { ?>
                                                          <button class="btn1" v-on:click="addItem(<?php echo $Producto->id ?>, 1)">
                                                            Agregar
                                                          </button>
                                                        <?php } 
                                                        else { ?>
                                                          <button disabled="disabled" class="btn1" style=" background-color: #CCC; border-color: #CCC">
                                                            Agregar
                                                          </button>
                                                        <?php } ?>
                                                        <div id="alert_<?php echo $Producto->id ?>" class="alert alert-success" z-index="10" >
                                                          <br><br>
                                                          <button type="button" class="close" data-dismiss="alert">x</button>
                                                          <strong>Genial! </strong> Producto agregado al carrito.
                                                        </div>                                                        
                                                    </div>
                                                </div>
                                            </div>
                                          <?php } ?>

                                        </div>
                                    </div>
                                    <div id="list" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                              <?php foreach ($Productos as $Producto) { ?>
                                                <div class="btc_shop_indx_cont_list_box_wrapper">
                                                  <div class="btc_shop_list_img_wrapper">
                                                    <ul>
                                                            <li class="btc_shop_list_price">new</li>
                                                      </ul>
                                                      <img src="<?php echo ENV('PATH_PUBLIC') ?>storage/<?php echo $Producto->file_imagen_principal ?>" alt="<?php echo $Producto->titulo_del_producto ?>" class="img-responsive" />
                                                    </div>
                                                    <div class="btc_shop_list_img_cont_wrapper">

                                                        <h1><a href="<?php echo ENV('PATH_PUBLIC') ?>producto/<?php echo $Producto->id ?>"><?php echo $Producto->titulo_del_producto ?></a></h1>
                                                        <h2>$  <?php echo $Producto->moneda_importe ?></h2>
                                                        <p><?php echo $Producto->descripcion_producto ?>.</p>
                                                        <div class="cc_shop_list">
                                                            <?php 
                                                          for ($i=1; $i<=5; $i++) { 
                                                            
                                                            if ($Producto->cantidad_de_estrellas >= $i) {
                                                              $o = '';
                                                            }
                                                            else {
                                                              $o = '-o';  
                                                            }
                                                            echo '<i class="fa fa-star'.$o.'"></i>';
                                                          }
                                                          ?>
                                                        </div>
                                                        <div class="btc_shop_list_bottom_social_wrapper ">
                                                            <ul>

                                                                <button class="btn1" v-on:click="addItem(<?php echo $Producto->id ?>, 1)">
                                                                  Agregar
                                                                </button>
                                                                <div id="alert2_<?php echo $Producto->id ?>" class="alert alert-success" z-index="10" >
                                                                  <br><br>
                                                                  <button type="button" class="close" data-dismiss="alert">x</button>
                                                                  <strong>Genial! </strong> Producto agregado al carrito.
                                                                </div>  
                                                                

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                              <?php } ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- shop sidebar end -->
@endsection

