


@extends('layouts.frontend')


@section('title')
  Blog | Nautica Baum
@endsection

@section('contenido')
  
    <link href="css/blog_style_3.css" rel="stylesheet">
    <link href="<?php echo ENV('PATH_PUBLIC') ?>fonts/wine/font/flaticon.css" rel="stylesheet" type="text/css">



    <!-- page_header start -->
    <div class="page_header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12 col-sm-6">
                    <h1> Blog </h1>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-6">
                    <div class="sub_title_section">
                        <ul class="sub_title">
                            <li> <a href="<?php echo env('PATH_PUBLIC')?>"> Home </a> <i class="fa fa-angle-right" aria-hidden="true"></i> </li>
                            <li> Blog </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page_header end -->

  <!-- blog_section start -->
  <div class="blog_section gray-bg ptb-100">
        <div class="container">
            <div class="row">
              <?php foreach ($Noticias as $Noticia) { ?>
                <div class="col-md-6">
                    <article class="blog-post-wrapper clearfix">

                        <div class="post-thumbnail">
                            <img src="<?php echo ENV('PATH_PUBLIC') ?>storage/<?php echo $Noticia->file_imagen ?>" class="" alt="Image">

                            <!--ul class="entry-meta">
                                <li><a class="comments" href="#"><i class="fa fa-comment"></i> 25</a>
                                </li>
                                <li><a class="likes" href="#"><i class="fa fa-heart"></i> 480</a>
                                </li>
                                <li><a class="share" href="#"><i class="fa fa-share"></i> Share</a>
                                </li>
                            </ul-->
                        </div>
                        <!-- /.post-thumbnail -->


                        <div class="blog-content">
                            <header class="entry-header">
                                <h4 class="entry-title"><a href="<?php echo ENV('PATH_PUBLIC') ?>noticia/<?php echo $Noticia->id ?>"><?php echo $Noticia->titulo ?> </a></h4>
                                <div class="entry-meta">
                                    <ul class="list-inline">
                                        <li><span class="author"> Por: <a href="#"><?php echo $Noticia->autor ?></a></span>
                                        </li>
                                        <li><span class="the-time"><a href="#"><?php echo $Noticia->fecha ?></a></span>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.entry-meta -->
                            </header>
                            <!-- /.entry-header -->

                            <div class="entry-content">
                                <p><?php echo $Noticia->copete ?></p>
                                <a class="readmore_btn" href="<?php echo ENV('PATH_PUBLIC') ?>noticia/<?php echo $Noticia->id ?>"> Mas</a>

                            </div>
                            <!-- /.entry-content -->
                        </div>
                    </article>
                </div>
              <?php } ?>


                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">

                    <!-- blog_pagination_section start -->
                    <!--div class="blog_pagination_section">
                        <ul>
                            <li>
                                <a href="#" class="prev"> <i class="fa fa-angle-left" aria-hidden="true"></i> Anteriro </a>
                            </li>
                            <li><a href="#">1</a>
                            </li>
                            <li class="hidden-xs"><a href="#">2</a>
                            </li>
                            <li class="hidden-xs"><a href="#">3</a>
                            </li>
                            <li class="hidden-xs"><a href="#">4</a>
                            </li>
                            <li class="hidden-xs"><a href="#">5</a>
                            </li>
                            <li class="hidden-xs"><a href="#">6</a>
                            </li>
                            <li class="hidden-xs"><a href="#">7</a>
                            </li>
                            <li class="visible-xs"><a href="#">...</a>
                            </li>
                            <li><a href="#">8</a>
                            </li>
                            <li><a href="#" class="next"> Sig. <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div-->
                    <!-- blog_pagination_section end -->

                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>

@endsection

