
    


@extends('layouts.frontend')


@section('title')
  Astillero | Nautica Baum
@endsection

@section('contenido')

    <link href="<?php echo ENV('PATH_PUBLIC') ?>css/shop.css" rel="stylesheet">


  
    <link href="<?php echo ENV('PATH_PUBLIC') ?>fonts/wine/font/flaticon.css" rel="stylesheet" type="text/css">
    <!-- page_header start -->
    <div class="page_header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12 col-sm-6">
                    <h1> Astillero </h1>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-6">
                    <div class="sub_title_section">
                        <ul class="sub_title">
                            <li> <a href="<?php echo env('PATH_PUBLIC')?>"> Home </a> <i class="fa fa-angle-right" aria-hidden="true"></i> </li>
                            <li> Astillero </li>
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
                                        <img src="<?php echo env('PATH_PUBLIC')?>img/10.jpg" class="img-responsive" alt="shop_img" style="width: 100%" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              
                              <p>El Astillero Baum tiene su origen a principios de 1975, cuando mi padre decidi?? construir veleros de dise??o propio, que navegan hoy en d??a en diversos lagos y r??os del pa??s.</p>

                              <p>Luego, agrega la construcci??n del kayak de casco tinglado, sumamente fuertes, a pedido de un amigo que quer??a realizar un viaje a remo desde Cataratas del Iguaz?? hasta Rosario. A este dise??o pronto se sumaron nuevos botes, gracias al ??xito de los mismos, as?? como nuevas traves??as, por ejemplo de Rosario a Villa Gesel, siendo los primeros en aventurarse a un recorrido tan largo.</p>

                              <p>El gran desempe??o de los kayak hizo que entusiastas del r??o comenzaran a pedir nuestras embarcaciones, y as?? comenzamos a fabricar para el p??blico vendiendo en la ciudad de Rosario y sus alrededores.</p>

                              <p>Hoy en d??a la consigna es fabricar mejores embarcaciones, seguras, estables, livianas y con el mejor precio de plaza en su tipo. Con diversos proyectos propios m??s la colaboraci??n y el aporte de la experiencia de avezados remeros y kayakistas, hemos logrado realizar y construidos embarcaciones con un desempe??o ideal para cada tipo de agua, ya sea en mar, lago o en r??o.</p>

                              <p>Para conseguir estos resultados utilizamos los materiales de mejor calidad del mercado, d??ndonos la seguridad de una fabricaci??n adecuada y competitiva.</p>

                              <p>La manufactura de las embarcaciones es artesanal contando con el personal id??neo y capacitado a lo largo de a??os de experiencia. Obteniendo como resultado embarcaciones con estilo propio, de l??neas cl??sicas y armoniosa de estilizadas proporciones y sentido est??tico. El objetivo de nuestra empresa es proyectarnos a nuevos mercados, en Argentina y el exterior, para lograr que nuevos clientes disfruten las Embarcaciones Baum.</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- shop sidebar end -->
@endsection

