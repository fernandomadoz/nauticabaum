
    <link href="<?php echo ENV('PATH_PUBLIC') ?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo ENV('PATH_PUBLIC') ?>css/fonts.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="<?php echo ENV('PATH_PUBLIC') ?>css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo ENV('PATH_PUBLIC') ?>css/owl.carousel.css"/>
    <link rel="stylesheet" href="<?php echo ENV('PATH_PUBLIC') ?>css/owl.theme.default.css" />
    <!-- Animation Css -->
    <link href="<?php echo ENV('PATH_PUBLIC') ?>css/animate.css" rel="stylesheet">
  <!-- Magnific popup css -->
    <link href="<?php echo ENV('PATH_PUBLIC') ?>css/magnific-popup.css"  rel="stylesheet">
  <!-- Product Css -->
   <link href="<?php echo ENV('PATH_PUBLIC') ?>css/jquery-ui.min.css" rel="stylesheet">
    <!-- Flaticon Css -->
    <link href="<?php echo ENV('PATH_PUBLIC') ?>css/organic_flaticon.css" rel="stylesheet"> 
    <!-- Style CSS -->
    <link href="<?php echo ENV('PATH_PUBLIC') ?>css/shop_organic.css" rel="stylesheet">
    <link href="<?php echo ENV('PATH_PUBLIC') ?>fonts/wine/font/flaticon.css" rel="stylesheet" type="text/css">

    <!-- vue.js -->
    <script src="<?php echo env('PATH_PUBLIC')?>js/vue/vue.js"></script>
    <script src="<?php echo env('PATH_PUBLIC')?>js/vee-validate/dist/vee-validate.js"></script>
    <script src="<?php echo env('PATH_PUBLIC')?>js/vee-validate/dist/locale/es.js"></script>
    <script type="text/javascript" src="<?php echo env('PATH_PUBLIC')?>js/vue-form-generator/vfg.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo env('PATH_PUBLIC')?>js/vue-form-generator/vfg.css">
    <script src="https://cdn.jsdelivr.net/vue.resource/1.3.1/vue-resource.min.js"></script> 


<script>
  fbq('track', 'ViewContent', {
    content_ids: '<?php echo $Producto->id ?>',
    content_type: 'product',
    content_category: 'Kayak',
    content_name: '<?php echo $Producto->titulo_del_producto ?>',
    currency: 'ARS',
    value: <?php echo $Producto->moneda_importe_antes ?>
  });
</script>

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
              </li>
              <?php if ($Producto->sino_agotado <> 'SI') { ?>
                <a  title="Agregar al Carro" class="btn1"  onclick="addItem(<?php echo $Producto->id ?>)"> 
                  <i class="flaticon-shopping-basket"></i> 
                  Agregar al Carro
                </a>
              <?php } 
              else {?>
                <a  title="Agregar al Carro" class="btn1"  style=" background-color: #CCC; border-color: #CCC"> 
                  <i class="flaticon-shopping-basket"></i> 
                  Agotado
                </a>
              <?php } ?>
            </ul>
          </div>



        </div>
      </div>
    </div>
</div>


<script src="<?php echo ENV('PATH_PUBLIC') ?>js/jquery.min.js"></script>
<script src="<?php echo ENV('PATH_PUBLIC') ?>js/bootstrap.min.js"></script>
<!-- Owl Carousel js -->
<script src="<?php echo ENV('PATH_PUBLIC') ?>js/owl.carousel.js"></script>
<!-- Magnific Popup js -->
<script src="<?php echo ENV('PATH_PUBLIC') ?>js/jquery.magnific-popup.js"></script>
<!-- Portfolio Filter js -->
<script src="<?php echo ENV('PATH_PUBLIC') ?>js/jquery.shuffle.min.js"></script>
<script src="<?php echo ENV('PATH_PUBLIC') ?>js/jquery.inview.min.js"></script>
<script src="<?php echo ENV('PATH_PUBLIC') ?>js/portfolio.js"></script>
<!-- Product js -->
<script src="<?php echo ENV('PATH_PUBLIC') ?>js/jquery-ui.min.js"></script>
<!-- Custom js -->
<script src="<?php echo ENV('PATH_PUBLIC') ?>js/shop.js"></script>
<!-- Custom js -->
<script src="<?php echo ENV('PATH_PUBLIC') ?>js/custom.js"></script>

<script type="text/javascript">
  function changeQty(cantidad) {
    var cant = parseInt($("#input-quantity").val())+cantidad
    if (cant < 1 ) {
      cant = 1;
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