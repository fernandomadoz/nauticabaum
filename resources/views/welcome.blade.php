


@extends('layouts.frontend')

@section('title')
  <?php echo $title ?>
@endsection



@section('contenido')




	<!--SLIDER-->
    	<!--div class="shop_slider_wrapper">
    	    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    	        <div class="carousel-inner" role="listbox">
    	        	<?php 
    	        	$i = 0;
    	        	foreach ($Slider as $Slide) { 
    	        		$i++;
    	        		if ($i == 1) {
    	        			$active = 'active';
    	        		}
    	        		else {
    	        			$active = '';
    	        		}
    	        	?>
    	    		<div class="item <?php echo $active ?>">
    	                <div class="carousel-captions caption-<?php echo $i ?>" style="background: url('<?php echo ENV('PATH_PUBLIC') ?>storage/<?php echo $Slide->file_imagen ?>');">
    	                    <div class="container">
    	                        <div class="row">
    	                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    					              <div class="content">
    					                <h2 data-animation="animated fadeInUp"><?php echo $Slide->titulo ?></h2>
    					                <small class="phone_head" data-animation="animated fadeInLeft"> <?php echo $Slide->subtitulo ?></small>
    					                <div class="custom_btn_wrapper animated fadeInUp">
    					                  <ul>
    					                    <li>
    					                      <a href="<?php echo $Slide->url_enlace ?>" class="btn1">
    					                        Ver Mas
    					                      </a>
    					                    </li>
    					                  </ul>
    					                </div>
    					              </div>
    	                            </div>
    	                        </div>
    	                    </div>
    	                </div>
    	            </div>	            
    	        	<?php } ?>
    	    		<div class="carousel-nevigation">
    	                <a class="prev" href="#carousel-example-generic" role="button" data-slide="prev">
    	                    <i class="fa fa-angle-left"></i>
    	                </a>
    	                <a class="next" href="#carousel-example-generic" role="button" data-slide="next">
    	                    <i class="fa fa-angle-right"></i>
    	                </a>
    	            </div>
    			    <ol class="carousel-indicators">
    	        	<?php 
    	        	$i = -1;
    	        	foreach ($Slider as $Slide) { 
    	        		$i++;
    	        		if ($i == 1) {
    	        			$active = 'active';
    	        		}
    	        		else {
    	        			$active = '';
    	        		}
    	        	?>
    			      <li data-target="#carousel-example-generic" data-slide-to="0" class="<?php echo $active ?>"></li>
    			    <?php } ?>
    	           </ol> 
    	  </div>
    	    </div>
    	</div-->
	<!--SLIDER-->
  
  	<!-- VARIETALES start -->
    <!--div class="products_category_wrapper">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-4">
	          <div class="pizz_cat">
	            <figure>
	              <a href="<?php echo env('PATH_PUBLIC')?>seccion/1" class="cat_link">
	                <img src="images/shop/organic/cat1.jpg" alt="">
	              </a>
	            </figure>
	            <div class="pizz_content">
	              
	              <a href="<?php echo env('PATH_PUBLIC')?>seccion/1">Tintos</a>
	            </div>
	          </div>
	        </div>
	        <div class="col-md-4">
	          <div class="pizz_cat active_cat">
	            <figure>
	              <a href="<?php echo env('PATH_PUBLIC')?>seccion/2" class="cat_link">
	                <img src="images/shop/organic/cat2.jpg" alt="">
	              </a>
	            </figure>
	            <div class="pizz_content">
	              
	              <a href="<?php echo env('PATH_PUBLIC')?>seccion/2">Blancos</a>
	            </div>
	          </div>
	        </div>
	        <div class="col-md-4">
	          <div class="pizz_cat">
	            <figure>
	              <a href="<?php echo env('PATH_PUBLIC')?>seccion/3" class="cat_link">
	                <img src="images/shop/organic/cat3.jpg" alt="">
	              </a>
	            </figure>
	            <div class="pizz_content">
	              
	              <a href="<?php echo env('PATH_PUBLIC')?>seccion/3">Espumantes</a>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
  	</div-->
  	<!-- VARIETALES end -->
  
  	<!-- DESTACADOS start -->
    <div class="portfolio_wrapper">
        <div class="container">
            <div class="row">
                <!-- section_heading start -->
                <!--div class="col-lg-8 col-md-12 col-xs-12 col-sm-12 col-lg-offset-2">
                    <div class="section_heading">
                        <h2>Recien Llegados</h2>
                        <span class="bordered-icon">
                          <i class="flaticon-016-wine-8"></i>
                        </span>
                     </div>
                    <div class="section_content">
                        <p>Te mostramos las etiquetas nuevas en nuestro portfolio de productos.</p>
                    </div>
                </div-->
                <!-- section_heading end -->
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <div class="portfolio-area">
                        <!--div class="portfolio-filter clearfix text-center">
                          <ul class="list-inline" id="filter">
                            <li>
                              <a class="active" data-group="all"> 
                                <i class="flaticon-050-wine-21"></i>
                                Todos
                              </a>
                            </li>
                                            <li>
                              <a data-group="Tintos">
                                <i class="flaticon-037-grapes"></i>
                                Tintos        
                              </a>
                            </li>
                                            <li>
                              <a data-group="Blancos"> 
                                <i class="flaticon-apple"></i>
                                Blancos
                              </a>
                            </li>
                                            <li>
                              <a data-group="Espumantes"> 
                                <i class="flaticon-011-toast-1"></i>
                                Espumantes 
                              </a>
                            </li>
                            <li>
                              <a data-group="Oliva"> 
                                <i class="flaticon-039-wine-18"></i>
                                Olivas
                              </a>
                            </li>
                          </ul>
                        </div-->
                        <div class="row three-column">
            	              <div id="gridWrapper" class="clearfix">
            	              	<?php foreach ($Destacados as $Producto) { ?>
            	                <div class="col-xs-12 col-sm-6 col-md-4 portfolio-wrapper III_column" data-groups='["all", "<?php echo $Producto->seccion->seccion ?>"]'>
            	                  <div class="portfolio-thumb">
            	                    <div class="btc_shop_indx_cont_box_wrapper">
            	                      <div class="btc_shop_indx_img_wrapper">
            	                      	<?php if ($Producto->sino_agotado == 'SI') { ?>
            	                        <span class="btc_shop_price btc_shop_new" style="width: 80px; background-color: #999">Agotado</span>
            	                    	<?php } 
                                        else { ?>                                
                                            <?php if ($Producto->sino_es_nuevo == 'SI') { ?>
                                            <span class="btc_shop_price btc_shop_new">Nuevo</span>
                                            <?php } ?>
                                        <?php } ?>
            	                        <a href="<?php echo ENV('PATH_PUBLIC') ?>producto/<?php echo $Producto->id ?>" class="product_img">
            	                          <img class="first-img" src="<?php echo ENV('PATH_PUBLIC') ?>storage/<?php echo $Producto->file_imagen_principal ?>" alt="<?php echo $Producto->titulo_del_producto ?>">
            	                        </a>
            	                        <div class="cc_li_img_text">
            	                          <a href="" class="quick_link" data-toggle="modal" data-target="#product_view" title="Vista Rapida" v-on:click="bodyProdcutView(<?php echo $Producto->id ?>)">
            	                            <i class="fa fa-eye"></i>
            	                          </a>
            	                          <!--a href="#" class="btn_like" title="Agregar al carrito">
            	                            <i class="fa fa-shopping-cart"></i>
            	                          </a-->
            	                        </div>
            	                      </div>
            	                      <div class="btc_shop_indx_img_cont_wrapper">
            	                        <div class="name">
            	                          <a href="<?php echo ENV('PATH_PUBLIC') ?>producto/<?php echo $Producto->id ?>">
            	                            <?php echo $Producto->titulo_del_producto ?>
            	                          </a>
            	                        </div>
            	                        <p class="price">
            	                          $ <?php echo number_format($Producto->moneda_importe, 2, ',', '.') ?>
            	                        </p>
                                        <?php if ($Producto->sino_agotado <> 'SI') { ?>
                                            <button class="btn1" v-on:click="addItem(<?php echo $Producto->id ?>, 1)">
                                              <i class="flaticon-shopping-basket"></i>&ensp;Agregar al Carro
                                            </button>
                                        <?php } 
                                        else { ?>
                                            <button disabled="disabled" class="btn1" style=" background-color: #CCC; border-color: #CCC">
                                              <i class="flaticon-shopping-basket"></i>&ensp;Agregar al Carro
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
            	                </div>
            	            	<?php } ?>

            	              </div>
                        </div>
                                   <!-- /.row -->
                         
                         <!--a href="shop_sidebar-LB.html" class="btn1">Ver Todo </a-->
                         
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <!-- DESTACADOS end -->
  
  
  
  	<!-- NUEVOS-MASVENDIDOS-OFERTAS start -->
    <div class="product_slider_main_wrapper">
        <div class="container">
            <div class="row">

            	<!-- NUEVOS start -->
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
                    <div class="product_slider_heading">
                        <h4>NUEVOS</h4>
                    </div>
                    <div class="product_slider_wrapper">
                        <div class="owl-carousel owl-theme">
                        	<?php 
                        	$i = 0; 
                        	foreach ($Nuevos as $Producto) { 
                        		$i++;
                        		if ($i == 1 or ($i-1)%3 == 0) {
                        			echo '<div class="item">';
                        		}
                        	?>

                                <div class="slider_wrapper">
                                    <div class="product_slider_image">
                                        <img src="<?php echo ENV('PATH_PUBLIC') ?>storage/<?php echo $Producto->file_imagen_principal ?>" alt="<?php echo $Producto->titulo_del_producto ?>">
                                    </div>
                                    <div class="product_slider_text">
                                        <a href="<?php echo ENV('PATH_PUBLIC') ?>producto/<?php echo $Producto->id ?>">
					                      <?php echo $Producto->titulo_del_producto ?>
					                    </a>
                                        <div class="product_slider_price">
                                            <span>$<?php echo number_format($Producto->moneda_importe, 2, ',', '.') ?></span>
                                        </div>
                                    </div>
                                    <a class="add_to_wishlist" href="#" title="Add to Wishlist">
                                        <span class="fa fa-heart-o"></span>
                                        <span class="fa fa-heart"></span>
                                    </a>
                                </div>

                        	<?php 
                        		if ($i%3 == 0 or $i == $Nuevos->count()) {
                        			echo '</div>';
                        		}
                        	}
                        	?>                                
                        </div>
                    </div>
                </div>
                <!-- NUEVOS end -->

            	<!-- MASVENDIDOS start -->
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
                    <div class="product_slider_heading">
                        <h4>MAS VENDIDOS</h4>
                    </div>
                    <div class="product_slider_wrapper">
                        <div class="owl-carousel owl-theme">
                        	<?php 
                        	$i = 0; 
                        	foreach ($MasVendidos as $Producto) { 
                        		$i++;
                        		if ($i == 1 or ($i-1)%3 == 0) {
                        			echo '<div class="item">';
                        		}
                        	?>

                                <div class="slider_wrapper">
                                    <div class="product_slider_image">
                                        <img src="<?php echo ENV('PATH_PUBLIC') ?>storage/<?php echo $Producto->file_imagen_principal ?>" alt="<?php echo $Producto->titulo_del_producto ?>">
                                    </div>
                                    <div class="product_slider_text">
                                        <a href="<?php echo ENV('PATH_PUBLIC') ?>producto/<?php echo $Producto->id ?>">
					                      <?php echo $Producto->titulo_del_producto ?>
					                    </a>
                                        <div class="product_slider_price">
                                            <span>$<?php echo number_format($Producto->moneda_importe, 2, ',', '.') ?></span>
                                        </div>
                                    </div>
                                    <a class="add_to_wishlist" href="#" title="Add to Wishlist">
                                        <span class="fa fa-heart-o"></span>
                                        <span class="fa fa-heart"></span>
                                    </a>
                                </div>

                        	<?php 
                        		if ($i%3 == 0 or $i == $MasVendidos->count()) {
                        			echo '</div>';
                        		}
                        	}
                        	?>   
                        </div>
                    </div>
                </div>
                <!-- MASVENDIDOS end -->

            	<!-- OFERTAS start -->
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
                    <div class="product_slider_heading">
                        <h4>OFERTAS</h4>
                    </div>
                    <div class="product_slider_wrapper">
                        <div class="owl-carousel owl-theme">
                        	<?php 
                        	$i = 0; 
                        	foreach ($Ofertas as $Producto) { 
                        		$i++;
                        		if ($i == 1 or ($i-1)%3 == 0) {
                        			echo '<div class="item">';
                        		}
                        	?>

                                <div class="slider_wrapper">
                                    <div class="product_slider_image">
                                        <img src="<?php echo ENV('PATH_PUBLIC') ?>storage/<?php echo $Producto->file_imagen_principal ?>" alt="<?php echo $Producto->titulo_del_producto ?>">
                                    </div>
                                    <div class="product_slider_text">
                                        <a href="<?php echo ENV('PATH_PUBLIC') ?>producto/<?php echo $Producto->id ?>">
					                      <?php echo $Producto->titulo_del_producto ?>
					                    </a>
                                        <div class="product_slider_price">
                                            <span>$<?php echo number_format($Producto->moneda_importe, 2, ',', '.') ?></span>
                                        </div>
                                    </div>
                                    <a class="add_to_wishlist" href="#" title="Add to Wishlist">
                                        <span class="fa fa-heart-o"></span>
                                        <span class="fa fa-heart"></span>
                                    </a>
                                </div>

                        	<?php 
                        		if ($i%3 == 0 or $i == $Ofertas->count()) {
                        			echo '</div>';
                        		}
                        	}
                        	?>     
                        </div>
                    </div>
                </div>
                <!-- OFERTAS end -->

            </div>
        </div>
    </div>
    <!-- NUEVOS-MASVENDIDOS-OFERTAS end -->
  
	<!-- discount_wrapper Start -->
	<?php if ($Combo->count() > 0) { ?>
	<div class="discount_wrapper">
	    <div class="container">
	      <!-- discount_wrapper Start -->
	      <div class="">
	        <div class="row">
	          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	          	<a href="<?php echo $Combo[0]->url_enlace ?>">
	            	<img src="<?php echo ENV('PATH_PUBLIC') ?>storage/<?php echo $Combo[0]->file_imagen ?>" alt="<?php echo $Producto->titulo_del_producto ?>" style="max-width: 100%">
	            </a>
	          </div>
	        </div>
	      </div>
	    </div>
	</div>
	<?php } ?>
	<!-- discount_wrapper End -->
  
  	<!-- blog_section start -->
    <!--div class="blog_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-xs-12 col-sm-12 col-lg-offset-2">
                    <div class="section_heading">
            			<h2>Nuestro Blog</h2>
                        <span class="bordered-icon">
			              <i class="flaticon-043-wine-tasting-1"></i>
			            </span>
                     </div>
                    <div class="section_content">
                        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus.</p>
                    </div>
                </div>
                <?php foreach ($Noticias as $Noticia) { ?>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  	<article class="blog-post-wrapper clearfix">
			            <div class="post-thumbnail">
			              <img src="<?php echo ENV('PATH_PUBLIC') ?>storage/<?php echo $Noticia->file_imagen ?>" alt="<?php echo $Noticia->titulo ?>" alt="Image">
			            </div>
			            <div class="blog-content">
			               <div class="entry-content">
			                <header class="entry-header">
			                  <h4 class="entry-title">
			                    <a href="<?php echo ENV('PATH_PUBLIC') ?>ver-noticia/<?php echo $Noticia->id ?>"><?php echo $Noticia->titulo ?></a>
			                  </h4>
			                </header> 
			                <p><?php echo $Noticia->copete ?></p>
			                <a href="<?php echo ENV('PATH_PUBLIC') ?>noticia/<?php echo $Noticia->id ?>">
			                <button class="btn1"> Ver Nota </button>
			              </a>               </div>
			            </div>
		          	</article>
                </div>
            	<?php } ?>
            </div>
        </div>
    </div-->
    <!-- blog_section end -->
  
  	<!-- services_section start -->
    <div class="services_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="services_wrapper m-40">
                        <i class="flaticon-shipped" aria-hidden="true"></i>
            <div class="services_info_content">
              <h4><a href="#">ENVÍOS A TODO EL PAÍS</a></h4>
              <p>No te preocupes por el envio, nosotros nos encargamos (pago a cargo del cliente)</p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="services_wrapper m-40">
                        <i class="flaticon-money-transfer" aria-hidden="true"></i>
            <div class="services_info_content">
              <h4><a href="#">PAGOS POR TRANSFERENCIA</a></h4>
            </div>
          </div>
        </div>
        
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="services_wrapper m-40">
                        <i class="flaticon-transfer" aria-hidden="true"></i>
            <div class="services_info_content">
              <h4><a href="#">MERCADO PAGO</a></h4>
              <p>Trabajamos con Mercado Pago desde hace mas de 10 años</p>
            </div>
          </div>
        </div>
        
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="services_wrapper m-40">
                        <i class="flaticon-technics" aria-hidden="true"></i>
            <div class="services_info_content">
              <h4><a href="#">SOMOS FABRICANTES</a></h4>
              <p>Tenemos nuestro propio astillero desde 1975</p>
            </div>
          </div>
        </div>
        
      </div>
    	</div>
  	</div>
  	<!-- services_section end -->    


@endsection
