


@extends('layouts.frontend')


@section('title')
  <?php echo $Producto->titulo_del_producto ?> | Nautica Baum
@endsection

@section('contenido')
  
    <link href="<?php echo ENV('PATH_PUBLIC') ?>fonts/wine/font/flaticon.css" rel="stylesheet" type="text/css">



    <!-- page_header start -->
    <div class="page_header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12 col-sm-6">
                    <h1> <?php echo $Producto->titulo_del_producto ?> </h1>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-6">
                    <div class="sub_title_section">
                        <ul class="sub_title">
                            <li> <a href="<?php echo env('PATH_PUBLIC')?>"> Home </a> <i class="fa fa-angle-right" aria-hidden="true"></i> </li>
                            <li> <?php echo $Producto->titulo_del_producto ?> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page_header end -->

    <!-- CC ps top product Wrapper Start -->
    <div class="cc_ps_top_product_main_wrapper">
        <div class="container">
          <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="video_img_section_wrapper">
                      <div class="cc_ps_top_slider_section">
                          <div class="owl-carousel owl-theme">
                              <div class="item" data-hash="data0">
                                <figure>
                                  <img src="<?php echo ENV('PATH_PUBLIC') ?>storage/<?php echo $Producto->file_imagen_principal ?>" alt="<?php echo $Producto->titulo_del_producto ?>" class="img-responsive">
                                </figure>
                              </div>
                              <?php 
                              $i = 0;
                              foreach ($Imagenes_de_producto as $Imagen) { 
                                $i++;
                              ?>
                                <div class="item" data-hash="data<?php echo $i ?>">
                                  <figure>
                                    <img src="<?php echo ENV('PATH_PUBLIC') ?>storage/<?php echo $Imagen->file_imagen ?>" alt="<?php echo $Producto->titulo_del_producto ?>" class="img-responsive">
                                  </figure>
                                </div>
                              <?php } ?>
                          </div>
                          <div class="video_nav_img hidden-sm hidden-xs">
                              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                  <a class="product_img button secondary url owl_nav" href="#data0">
                                    <figure>
                                      <img src="<?php echo ENV('PATH_PUBLIC') ?>storage/<?php echo $Producto->file_imagen_principal ?>" alt="<?php echo $Producto->titulo_del_producto ?>" class="img-responsive">
                                    </figure>
                                  </a>
                              </div>
                              <?php 
                              $i = 0;
                              foreach ($Imagenes_de_producto as $Imagen) { 
                                $i++;
                              ?>
                              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                  <a class="product_img button secondary url owl_nav" href="#data<?php echo $i ?>">
                                    <figure>
                                      <img src="<?php echo ENV('PATH_PUBLIC') ?>storage/<?php echo $Imagen->file_imagen ?>" alt="<?php echo $Producto->titulo_del_producto ?>" class="img-responsive">
                                    </figure>
                                  </a>
                              </div>
                            <?php } ?>
                          </div>
                          <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                  <div class="video_nav_img visible-sm visible-xs">
                                      <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <a class="product_img button secondary url owl_nav" href="#data0">
                                              <figure>
                                                <img src="<?php echo ENV('PATH_PUBLIC') ?>storage/<?php echo $Producto->file_imagen_principal ?>" alt="<?php echo $Producto->titulo_del_producto ?>" class="img-responsive">
                                              </figure>
                                            </a>
                                        </div>
                                        <?php 
                                        $i = 0;
                                        foreach ($Imagenes_de_producto as $Imagen) { 
                                          $i++;
                                        ?>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <a class="product_img button secondary url owl_nav" href="#data<?php echo $i ?>">
                                              <figure>
                                                <img src="<?php echo ENV('PATH_PUBLIC') ?>storage/<?php echo $Imagen->file_imagen ?>" alt="<?php echo $Producto->titulo_del_producto ?>" class="img-responsive">
                                              </figure>
                                            </a>
                                        </div>
                                        <?php } ?>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="btc_shop_single_prod_right_section">
                  <h1><?php echo $Producto->titulo_del_producto ?></h1>
                  <div class="btc_shop_sin_pro_icon_wrapper">

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

                    <div class="btc_shop_product_price_wrapper">
                      <!--span class="btc_shop_sale">Get 70% off </span-->
                      <ul>
                        <li>$ <?php echo number_format($Producto->moneda_importe, 2, ',', '.') ?> </li>
                        <?php if ($Producto->moneda_importe_antes <> '') { ?>
                        <li><del>$ <?php echo number_format($Producto->moneda_importe_antes, 2, ',', '.') ?></del></li>
                        <?php } ?>
                      </ul>
                      <span>Incluye todos los inpuestos</span>
                    </div>
                    <h5 style="white-space: pre-wrap"><?php echo $Producto->rtf_descripcion_producto ?></h5>
                  </div>
                  <div class="cc_ps_cart_btn_wrapper">
                    <div class="cc_ps_cart_btn">
                      <span>Cantidad</span>
                      <ul>
                        <?php if ($Producto->sino_agotado <> 'SI') { ?>
                        <li>
                          <div class="cc_ps_quantily_info">
                            <div class="select_number" style="padding-right: 25px">
                               <button onclick="changeQty(1); return false;" title="increase" class="increase">
                                <i class="fa fa-angle-up"></i>
                               </button>
                               <input type="text" name="quantity" value="1" size="2" id="input-quantity" class="form-control" />
                               <button onclick="changeQty(-1); return  false;" title="decrease" class="decrease">
                                <i class="fa fa-angle-down"></i>
                               </button>
                            </div>
                            <input type="hidden" name="product_id" />
                          </div>
                        </li>
                        <?php } ?>
                        <li>
                          <div id="alert_prod" class="alert alert-success" z-index="10" >
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>Genial! </strong> Producto agregado al carrito.
                          </div>
                          <?php if ($Producto->sino_agotado <> 'SI') { ?>
                            <a  title="Agregar al Carro" class="btn1"  onclick="addItem(<?php echo $Producto->id ?>)"> 
                              <i class="flaticon-shopping-basket"></i> 
                              Agregar al Carro
                            </a>
                          <?php } 
                          else { ?>
                            <a  title="Agotado" class="btn1" style=" background-color: #CCC; border-color: #CCC"> 
                              <i class="flaticon-shopping-basket"></i> 
                              Agotado
                            </a>
                          <?php } ?>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
    </div>
    <!-- CC ps top product Wrapper End -->
  
  <!-- product_tab_section start -->
  <!--div class="product_tab_section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div role="tabpanel">
            <ul id="product_tab" class="nav nav-tabs">
              <li class="active">
                  <a href="#product_tab_2" data-toggle="tab">
                     Informacion Adicional
                  </a>
              </li>
            </ul>
            <div class="tab-pane fade in active" id="product_tab_2">
              <table class="table table-striped table-bordered">
                <tbody>
                  <tr>
                    <th>Conformacion</th>
                    <td><?php echo $Producto->conformacion ?></td>
                  </tr>
                  <tr>
                    <th>Contenido</th>
                    <td><?php echo $Producto->contenido ?></td>
                  </tr>
                  <tr>
                    <th>Origen</th>
                    <td><?php echo $Producto->origen ?></td>
                   </tr>
                  <tr>
                    <th>Maridaje</th>
                    <td><?php echo $Producto->maridaje ?></td>
                  </tr>
                </tbody>
              </table>    
            </div>
          </div>
        </div>
      </div>
    </div>
  </div-->
  <!-- product_tab_section end -->
  <br>



<script type="text/javascript">
  function changeQty(cantidad) {
    var cant = parseInt($("#input-quantity").val())+cantidad
    if (cant < 0 ) {
      cant = 0;
    }
    $("#input-quantity").val(cant)
  }

  function addItem(producto_id) {              

    $.ajax({
      url: '<?php echo env('PATH_PUBLIC')?>additem',
      type: 'POST',
      dataType: 'html',
      async: true,
      data:{
        _token: "{{ csrf_token() }}",
        producto_id: producto_id,
        cantidad: parseInt($("#input-quantity").val())
      },
      success: function success(data, status) {    

          resulltado = data.split("|");
          $("#alert_prod").fadeTo(2000, 500).slideUp(500, function() {
            $("#success-alert").slideUp(500);
          });
          $("#alert2_").fadeTo(2000, 500).slideUp(500, function() {
            $("#success-alert").slideUp(500);
          });
          app["carro_cant"] = resulltado[1]
          app["carro_importe"] = resulltado[2]
        
      },
      error: function error(xhr, textStatus, errorThrown) {
          alert(errorThrown);
      }
    });

  }

</script>

<script type="text/javascript">
  $(document).ready(function() {
  $(".alert").hide();
});
</script>

@endsection

