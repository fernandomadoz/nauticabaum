


@extends('layouts.frontend')

@section('title')
  <?php echo $Noticia->titulo ?> | Tranquera Abierta
@endsection

@section('pub-top')
  <a href="<?php echo $pub_top->url_enlace ?>" target="_blank"><img class="img-responsive" src="<?php echo ENV('PATH_PUBLIC') ?>storage/<?php echo $pub_top->file_imagen_pc ?>" alt=""></a>  
@endsection

@section('contenido')

    <!--========== BEGIN .MODULE ==========-->
    <section class="module"> 
      <!--========== BEGIN .CONTAINER ==========-->
      <div class="container"> 
        <!--========== BEGIN .BREAKING-NEWS ==========--> 
        <!-- Begin .outer -->
        <div class="outer">
          <div class="breaking-ribbon">
            <h4>Noticias Destacadas</h4>
          </div>
          <!-- Begin .newsticker -->
          <div class="newsticker">
            <ul>
            	<?php foreach ($Destacadas as $Destacada) { ?>
	            	<li>
	                	<h4><span class="category"><?php echo $Destacada['seccion'] ?></span><a href="<?php echo ENV('PATH_PUBLIC') ?>noticia/<?php echo $Destacada['id'] ?>"> <?php echo $Destacada['titulo'] ?></a></h4>
              		</li>
          		<?php } ?>
            </ul>
            <div class="navi">
              <button class="up"><i class="fa fa-caret-left"></i></button>
              <button class="down"><i class="fa fa-caret-right"></i></button>
            </div>
          </div>
          <!-- End .newsticker --> 
        </div>
        <!-- End .outer --> 
        <!--========== END .BREAKING-NEWS ==========--> 
      </div>
    </section>
    <!--========== END .MODULE ==========--> 	

    <!--========== BEGIN .ROW ==========-->
    <div class="row no-gutter"> 
      <!--========== BEGIN .COL-MD-8 ==========-->
      <div class="col-md-8"> 
        <!--========== BEGIN .POST ==========-->
        <div class="post post-full clearfix">
          <div class="entry-media"> <a href="#"><img src="<?php echo ENV('PATH_PUBLIC') ?>storage/<?php echo $Noticia->file_imagen ?>" alt="Foto" class="img-responsive"></a> </div>
          <div class="entry-main">
            <div class="entry-title">
              <h4 class="entry-title"><?php echo $Noticia->titulo ?></h4>
            </div>
           
            <div class="post-meta-elements">
              <div class="post-meta-author"> <i class="fa fa-user"></i><a href="#"><?php echo $Noticia->autor ?></a> </div>
             <div class="post-meta-date"> <i class="fa fa-calendar"></i><?php echo $Noticia->created_at ?> </div>
              <!--div class="post-meta-comments"> <i class="fa fa-comment-o"></i><a href="#">0 Comentarios</a> </div-->
            </div>
            <div class="entry-content">
              <p><?php echo $Noticia->copete ?></p>


              <?php if ($Noticia->videoyt_codigo_v_youtube <> '') { ?>

              <br><br>
                
              <div class="entry-media"> <iframe width="100%" height="525" src="https://www.youtube.com/embed/<?php echo $Noticia->videoyt_codigo_v_youtube ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> </div>
                

              <?php } 
              else { ?>
              <hr>
              <?php } ?>

              <p><?php echo $Noticia->rtf_texto ?></p>
              
                
            </div>
            
          </div>
          <!--  End .post --> 
          <!-- Begin .author-post -->
          
          <!--  End .author-post --> 
          <!--  Begin .comment-section -->
          
          <!--  End .comment-section --> 
          <!--  Begin .form-reply-section -->
          
          <!--div class="form-reply-section">
            <div class="comment-title title-style01">
              <h4>Deja un comentario</h4>
            </div>
            <form action="#" method="post" class="form-reply ui-form">
              <div class="row no-gutter">
                <div class="col-md-6">
                  <div class="form-group">
                    <input placeholder="Nombre" class="form-control" type="text" title="Comenta"/>
                  </div>
                </div>
                <div class="col-md-6">
                  <input placeholder="Email" class="form-control" type="email" title="Email"/>
                </div>
              </div>
              <div class="row no-gutter">
                <div class="col-md-12">
                  <textarea rows="5" placeholder="Comentario" class="form-control" title="Comentario"></textarea>
                </div>
              </div>
              <div class="row no-gutter">
                <div class="col-md-12">
                  <button class="btn btn-primary btn-black">enviar</button>
                </div>
              </div>
            </form>
          </div-->
          
          <!--  End .form-reply-section --> 
        </div>
      </div>
      <!--========== END .COL-MD-8 ==========--> 
          <!--========== BEGIN .COL-MD-4 ==========-->
          <div class="col-md-4"> 
            <!-- Begin .sidebar-add-place -->
            <div class="sidebar-add-place"><a href="<?php echo $pub_home_top_mercados->url_enlace ?>" target="_blank"><img class="img-responsive" src="<?php echo ENV('PATH_PUBLIC') ?>storage/<?php echo $pub_home_top_mercados->file_imagen_pc ?>" alt=""></a> </div>
            <!-- End .sidebar-add-place --> 
            <!-- Begin .block-title-1 -->
            <div class="block-title-1">
              <h3><a href="#"><strong>Mercados</strong></a><div style="float: right;"><?php echo $Mercados[0]->valor_1 ?></div></h3>
            </div>
            <!-- End .block-title-1 --> 
            <!--========== BEGIN .SIDEBAR-NEWSFEED ==========-->
            <div class="sidebar-newsfeed"> 
              <!-- Begin .newsfeed -->
                <table class="tabla_mercados">
                  <tr>
                    <th style="text-align: left">GRANOS</th>
                    <th>CBOT</th>
                    <th colspan="2" style="text-align: center;">ROSARIO</th>
                  </tr>
                  <tr class="sub_columnas">
                    <th></th>
                    <th></th>
                    <th>DISPONIBLE</th>
                    <th>FUTURO</th>
                  </tr>
                  <tr>
                    <td><?php echo $Mercados[1]->mercado ?></td>
                    <td class="valor"><?php echo $Mercados[1]->valor_1 ?></td>
                    <td class="valor"><?php echo $Mercados[1]->valor_2 ?></td>
                    <td class="valor"><?php echo $Mercados[1]->valor_3 ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Mercados[2]->mercado ?></td>
                    <td class="valor"><?php echo $Mercados[2]->valor_1 ?></td>
                    <td class="valor"><?php echo $Mercados[2]->valor_2 ?></td>
                    <td class="valor"><?php echo $Mercados[2]->valor_3 ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Mercados[3]->mercado ?></td>
                    <td class="valor"><?php echo $Mercados[3]->valor_1 ?></td>
                    <td class="valor"><?php echo $Mercados[3]->valor_2 ?></td>
                    <td class="valor"><?php echo $Mercados[3]->valor_3 ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Mercados[4]->mercado ?></td>
                    <td class="valor"><?php echo $Mercados[4]->valor_1 ?></td>
                    <td class="valor"><?php echo $Mercados[4]->valor_2 ?></td>
                    <td class="valor"><?php echo $Mercados[4]->valor_3 ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Mercados[5]->mercado ?></td>
                    <td class="valor"><?php echo $Mercados[5]->valor_1 ?></td>
                    <td class="valor"><?php echo $Mercados[5]->valor_2 ?></td>
                    <td class="valor"><?php echo $Mercados[5]->valor_3 ?></td>
                  </tr>
                  <tr>
                    <th colspan="2" style="text-align: left">Hacienda - Liniers</th>
                    <th>M&iacute;nimo</th>
                    <th>M&aacute;ximo</th>
                  </tr>
                  <tr>
                    <td colspan="2"><?php echo $Mercados[6]->mercado ?></td>
                    <td class="valor"><?php echo $Mercados[6]->valor_1 ?></td>
                    <td class="valor"><?php echo $Mercados[6]->valor_2 ?></td>
                  </tr>
                  <tr>
                    <td colspan="2"><?php echo $Mercados[7]->mercado ?></td>
                    <td class="valor"><?php echo $Mercados[7]->valor_1 ?></td>
                    <td class="valor"><?php echo $Mercados[7]->valor_2 ?></td>
                  </tr>
                  <tr>
                    <td colspan="2"><?php echo $Mercados[8]->mercado ?></td>
                    <td class="valor"><?php echo $Mercados[8]->valor_1 ?></td>
                    <td class="valor"><?php echo $Mercados[8]->valor_2 ?></td>
                  </tr>
                  <tr>
                    <td colspan="2"><?php echo $Mercados[9]->mercado ?></td>
                    <td class="valor"><?php echo $Mercados[9]->valor_1 ?></td>
                    <td class="valor"><?php echo $Mercados[9]->valor_2 ?></td>
                  </tr>
                  <tr>
                    <td colspan="2"><?php echo $Mercados[10]->mercado ?></td>
                    <td class="valor"><?php echo $Mercados[10]->valor_1 ?></td>
                    <td class="valor"><?php echo $Mercados[10]->valor_2 ?></td>
                  </tr>
                  <tr>
                    <td colspan="2"><?php echo $Mercados[11]->mercado ?></td>
                    <td class="valor"><?php echo $Mercados[11]->valor_1 ?></td>
                    <td class="valor"><?php echo $Mercados[11]->valor_2 ?></td>
                  </tr>
                  <tr>
                    <td colspan="2"><?php echo $Mercados[12]->mercado ?></td>
                    <td class="valor"><?php echo $Mercados[12]->valor_1 ?></td>
                    <td class="valor"><?php echo $Mercados[12]->valor_2 ?></td>
                  </tr>
                  <tr>
                    <td colspan="2"><?php echo $Mercados[13]->mercado ?></td>
                    <td class="valor"><?php echo $Mercados[13]->valor_1 ?></td>
                    <td class="valor"><?php echo $Mercados[13]->valor_2 ?></td>
                  </tr>
                  <tr>
                    <th colspan="2" style="text-align: left">Porcinos</th>
                    <th>$ Promedio</th>
                    <th>Plazo Pago</th>
                  </tr>
                  <tr>
                    <td colspan="2"><?php echo $Mercados[14]->mercado ?></td>
                    <td class="valor"><?php echo $Mercados[14]->valor_1 ?></td>
                    <td class="valor"><?php echo $Mercados[14]->valor_2 ?></td>
                  </tr>
                  <tr>
                    <td colspan="2"><?php echo $Mercados[15]->mercado ?></td>
                    <td class="valor"><?php echo $Mercados[15]->valor_1 ?></td>
                    <td class="valor"><?php echo $Mercados[15]->valor_2 ?></td>
                  </tr>
                  <tr>
                    <td colspan="2"><?php echo $Mercados[16]->mercado ?></td>
                    <td class="valor"><?php echo $Mercados[16]->valor_1 ?></td>
                    <td class="valor"><?php echo $Mercados[16]->valor_2 ?></td>
                  </tr>
                  <tr>
                    <td colspan="2"><?php echo $Mercados[17]->mercado ?></td>
                    <td class="valor"><?php echo $Mercados[17]->valor_1 ?></td>
                    <td class="valor"><?php echo $Mercados[17]->valor_2 ?></td>
                  </tr>
                </table>
              <!-- End .newsfeed --> 
            </div>
            <!--========== END .SIDEBAR-NEWSFEED ==========--> 
          </div>
          <!--========== END .COL-MD-4 ==========--> 
    </div>
    <!--========== END .ROW ==========-->

@endsection


@section('pub-footer')
  <a href="<?php echo $pub_footer->url_enlace ?>" target="_blank"><img class="img-responsive" src="<?php echo ENV('PATH_PUBLIC') ?>storage/<?php echo $pub_footer->file_imagen_pc ?>" alt=""></a>
@endsection
