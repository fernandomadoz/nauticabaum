<?php 
use App\Http\Controllers\GenericController;

$GenCon = new GenericController();
?>


@extends('layouts.frontend')


@section('title')
  Blog | Nautica Baum
@endsection

@section('contenido')
  
    <link href="<?php echo ENV('PATH_PUBLIC') ?>fonts/wine/font/flaticon.css" rel="stylesheet" type="text/css">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <!-- Web Fonts -->
    <link href="<?php echo ENV('PATH_PUBLIC') ?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo ENV('PATH_PUBLIC') ?>css/fonts.css" rel="stylesheet">
  <!-- Animation Css -->
    <link href="<?php echo ENV('PATH_PUBLIC') ?>css/animate.css" rel="stylesheet">
    <!-- Magnific Popup Css -->
    <link href="<?php echo ENV('PATH_PUBLIC') ?>css/magnific-popup.css" rel="stylesheet">
    <!-- Style Css -->
    <link href="<?php echo ENV('PATH_PUBLIC') ?>css/blog_single_3.css" rel="stylesheet">

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
    <div class="blog_section">
        <div class="container">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                <article class="blog-post-wrapper clearfix">
                  <div class="post-thumbnail">
                    <img src="<?php echo ENV('PATH_PUBLIC') ?>storage/<?php echo $Noticia->file_imagen ?>" class="img-responsive " alt="Image">
                  </div>
                  <!-- /.post-thumbnail -->

                  <div class="blog-content">
                    <header class="entry-header">
                      <h4 class="entry-title"><a href="#"><?php echo $Noticia->titulo ?> </a></h4>
                      <div class="entry-meta">
                        <ul>
                          <li><span class="author">By <a href="#"><?php echo $Noticia->autor ?></a> | <?php echo $GenCon->FormatoFecha($Noticia->fecha) ?></span>
                          </li>
                        </ul>
                      </div>
                      <!-- /.entry-meta -->
                    </header>
                    <!-- /.entry-header -->

                    <div class="entry-content">
                      <p><strong><i><?php echo $Noticia->copete ?></i></strong></p>
                      <p><?php echo $Noticia->rtf_texto ?></p>
                    </div>
                    <!-- /.entry-content -->

                  </div>

                  <div class="row">
                    <?php if ($Noticia->file_imagen_lateral_1 <> '') { ?>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                      <div class="post-thumbnail">
                        <img src="<?php echo ENV('PATH_PUBLIC') ?>storage/<?php echo $Noticia->file_imagen_lateral_1 ?>">
                      </div>
                      <!-- /.post-thumbnail -->
                    </div>
                    <?php } ?>
                    <?php if ($Noticia->rtf_texto_lateral_1 <> '') { ?>
                    <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                      <div class="blog-content">
                        <div class="entry-content">
                          <p><?php echo $Noticia->rtf_texto_lateral_1 ?></p>
                          </div>
                          <!-- /.entry-content -->
                      </div>
                    </div>
                    <?php } ?>
                  </div>

                  <div class="row">
                    <?php if ($Noticia->rtf_texto_lateral_2 <> '') { ?>
                    <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                      <div class="blog-content">
                        <div class="entry-content">
                          <p><?php echo $Noticia->rtf_texto_lateral_2 ?></p>
                          </div>
                          <!-- /.entry-content -->
                      </div>
                    </div>
                    <?php } ?>
                    <?php if ($Noticia->file_imagen_lateral_2 <> '') { ?>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                      <div class="post-thumbnail">
                        <img src="<?php echo ENV('PATH_PUBLIC') ?>storage/<?php echo $Noticia->file_imagen_lateral_2 ?>">
                      </div>
                      <!-- /.post-thumbnail -->
                    </div>
                    <?php } ?>
                  </div>



                  <div class="row">
                    <?php if ($Noticia->file_imagen_lateral_3 <> '') { ?>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                      <div class="post-thumbnail">
                        <img src="<?php echo ENV('PATH_PUBLIC') ?>storage/<?php echo $Noticia->file_imagen_lateral_3 ?>">
                      </div>
                      <!-- /.post-thumbnail -->
                    </div>
                    <?php } ?>
                    <?php if ($Noticia->rtf_texto_lateral_3 <> '') { ?>
                    <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                      <div class="blog-content">
                        <div class="entry-content">
                          <p><?php echo $Noticia->rtf_texto_lateral_3 ?></p>
                          </div>
                          <!-- /.entry-content -->
                      </div>
                    </div>
                    <?php } ?>
                  </div>

                </article>
              </div>
          
              <!--div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                <div class="blog_post_bottom_wrapper">
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                        <div class="tags">
                          <i class="fa fa-tags" aria-hidden="true"></i> 
                          Tags:
                          <a href="#">Business ,</a>
                          <a href="#">Corporate ,</a>
                          <a href="#">Services</a>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                        <div class="share_icons">
                          Share:
                          <a href="#"><i class="fa fa-facebook"></i></a>
                          <a href="#"><i class="fa fa-twitter"></i></a>
                          <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                          <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i> </a> 
                        </div>
                      </div>
                    </div>
                </div>
              </div>
        
              <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                  <div class="blog_pagination_section">
                    <ul>
                      <li>
                        <a href="#" class="prev"> <i class="fa fa-angle-left" aria-hidden="true"></i> Prev </a>
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
                      <li class="hidden-xs hidden-sm"><a href="#">7</a>
                      </li>
                      <li class="visible-xs"><a href="#">...</a>
                      </li>
                      <li class="hidden-sm"><a href="#">8</a>
                      </li>
                      <li><a href="#" class="next"> Next <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                      </li>
                    </ul>
                  </div>
              </div>
        
              <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                <div class="comments_wrapper">
                  <h4>Comments (04)</h4>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                      <div class="comments_Box">
                        <div class="img_wrapper">
                          <img src="<?php echo env('PATH_PUBLIC')?>images/blog/blog-single-3/author1.jpg" class="" alt="author_img" />
                        </div>
                        <div class="text_wrapper">
                          <div class="author_detail"> 
                            <span class="author_name"> Jhon Doe <i class="fa fa-circle"></i> </span>
                            <span class="publish_date"> July 1, 2018 - <a href="#">Reply</a> </span>
                          </div>
                          <div class="author_content">
                            <p>Integer porttitor fringilla vestibulum. Phasellus curs our tinnt nulla, ut mattis augue finibus ac. Vivamus elementum enim ac enim ultrices rhoncus. </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                      <div class="comments_Box">
                        <div class="row">
                          <div class="col-lg-11 col-md-12 col-xs-12 col-sm-12 col-lg-offset-1">
                            <div class="img_wrapper">
                              <img src="<?php echo env('PATH_PUBLIC')?>images/blog/blog-single-3/author2.jpg" class="" alt="author_img" />
                            </div>
                            <div class="text_wrapper">
                              <div class="author_detail">
                                <span class="author_name"> Eva Marilla <i class="fa fa-circle"></i> </span>
                                <span class="publish_date"> July 1, 2018 - <a href="#">Reply</a> </span>
                              </div>
                              <div class="author_content">
                                <p>Integer porttitor fringilla vestibulum. Phasellus curs our tinnt nulla, ut mattis augue finibus ac. Vivamus elementum enim ac enim ultrices rhoncus. </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                      <div class="comments_Box">
                        <div class="img_wrapper">
                          <img src="<?php echo env('PATH_PUBLIC')?>images/blog/blog-single-3/author3.jpg" class="" alt="author_img" />
                        </div>
                        <div class="text_wrapper">
                          <div class="author_detail">
                            <span class="author_name"> Steffa Ferello <i class="fa fa-circle"></i> </span>
                            <span class="publish_date"> July 1, 2018 - <a href="#">Reply</a> </span>
                          </div>
                          <div class="author_content">
                            <p>Integer porttitor fringilla vestibulum. Phasellus curs our tinnt nulla, ut mattis augue finibus ac. Vivamus elementum enim ac enim ultrices rhoncus. </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                      <div class="comments_Box last_comment_box">
                        <div class="img_wrapper">
                          <img src="<?php echo env('PATH_PUBLIC')?>images/blog/blog-single-3/author4.jpg" class="" alt="author_img" />
                        </div>
                        <div class="text_wrapper">
                          <div class="author_detail">
                            <span class="author_name"> Matin Lauran <i class="fa fa-circle"></i></span>
                              
                            <span class="publish_date"> July 1, 2018 - <a href="#">Reply</a> </span>
                          </div>
                          <div class="author_content">
                            <p>Integer porttitor fringilla vestibulum. Phasellus curs our tinnt nulla, ut mattis augue finibus ac. Vivamus elementum enim ac enim ultrices rhoncus. </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        
              <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                <div class="comments_form">
                  <h4>Leave A Comment</h4>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="formsix-pos">
                        <div class="form-group i-name">
                          <label class="sr-only">Name</label>
                          <input type="text" class="form-control" required="" id="namTen-first" placeholder="Full Name *">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="formsix-e">
                        <div class="form-group i-email">
                          <label class="sr-only">Email</label>
                          <input type="email" class="form-control" required="" id="email" placeholder="Email Address *">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="formsix-m">
                        <div class="form-group i-message">
                          <label class="sr-only">Message</label>
                          <textarea class="form-control" required="" rows="7" id="messageTen" placeholder="Message"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">Send Now</button>
                </div>
              </div-->
          
            </div>
      
      </div>
    </div>
  <!-- blog_section start -->

@endsection

