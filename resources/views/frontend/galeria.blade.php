
    


@extends('layouts.frontend')


@section('title')
  Galeria de Fotos| Nautica Baum
@endsection

@section('contenido')

    <link href="<?php echo ENV('PATH_PUBLIC') ?>css/shop.css" rel="stylesheet">


  
    <link href="<?php echo ENV('PATH_PUBLIC') ?>fonts/wine/font/flaticon.css" rel="stylesheet" type="text/css">
    <!-- page_header start -->
    <div class="page_header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12 col-sm-6">
                    <h1> Galeria de Fotos </h1>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-6">
                    <div class="sub_title_section">
                        <ul class="sub_title">
                            <li> <a href="<?php echo env('PATH_PUBLIC')?>"> Home </a> <i class="fa fa-angle-right" aria-hidden="true"></i> </li>
                            <li> Galeria de Fotos </li>
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
                                <div class="tab-content btc_shop_index_content_tabs_main">
                                    <div id="grid" class="tab-pane fade in active">
                                        <div class="row">
                                          <?php foreach ($Imagenes as $Imagen) { ?>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                              <img src="<?php echo ENV('PATH_PUBLIC') ?>storage/<?php echo $Imagen->file_imagen ?>" alt="<?php echo $Imagen->titulo_del_Imagen ?>" class="img-responsive" />
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
  <!-- shop sidebar end -->
@endsection

