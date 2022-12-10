<?php
$rol_de_usuario_id = Auth::user()->rol_de_usuario_id;
?>


@extends('layouts.backend')



@section('contenido')

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo env('PATH_PUBLIC')?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo env('PATH_PUBLIC')?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo env('PATH_PUBLIC')?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo env('PATH_PUBLIC')?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo env('PATH_PUBLIC')?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo env('PATH_PUBLIC')?>dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pedido # {{ $Pedido->id }}
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><?php echo __('Inicio') ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-5 ">

          <div class="box">


            <div class="box-header">
              <h3 class="box-title">{{ $Pedido->estado_del_pago }}</h3>

          <p>
            <button type="button" style="margin: 10px" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#modal-solicitud-abm" onclick="crearABM_user(<?php echo $Pedido->id ?>)"><?php echo __('Modificar') ?></button>
          </p>
          <br>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tbody>

                  <tr><td>sino_solicitado</td><th>{{ $Pedido->sino_solicitado}} </th></tr>
                  <tr><td>created_at</td><th>{{ $Pedido->created_at}} </th></tr>
                  <tr><td>updated_at</td><th>{{ $Pedido->updated_at}} </th></tr>
                  <tr><td>mensaje</td><th>{{ $Pedido->mensaje}} </th></tr>
                  <tr><td>moneda_importe_total</td><th> $ {{ number_format($Pedido->moneda_importe_total, 2, ',', '.') }} </th></tr>
                  <tr><td>nombre</td><th>{{ $Pedido->nombre}} </th></tr>
                  <tr><td>apellido</td><th>{{ $Pedido->apellido}} </th></tr>
                  <tr><td>email</td><th>{{ $Pedido->email}} </th></tr>
                  <tr><td>telefono</td><th>{{ $Pedido->telefono}} </th></tr>
                  <tr><td>domicilio</td><th>{{ $Pedido->domicilio}} </th></tr>
                  <tr><td>localidad</td><th>{{ $Pedido->localidad}} </th></tr>
                  <tr><td>provincia</td><th>{{ $Pedido->provincia}} </th></tr>
                  <tr><td>comentarios</td><th>{{ $Pedido->comentarios}} </th></tr>
                  <tr><td>metodo_del_pago</td><th>{{ $Pedido->metodo_del_pago}} </th></tr>
                  <tr><td>estado_del_pago</td><th>{{ $Pedido->estado_del_pago}} </th></tr>
                  <tr><td>collection_id</td><th>{{ $Pedido->collection_id}} </th></tr>
                  <tr><td>collection_status</td><th>{{ $Pedido->collection_status}} </th></tr>
                  <tr><td>payment_id</td><th>{{ $Pedido->payment_id}} </th></tr>
                  <tr><td>status</td><th>{{ $Pedido->status}} </th></tr>
                  <tr><td>external_reference</td><th>{{ $Pedido->external_reference}} </th></tr>
                  <tr><td>payment_type</td><th>{{ $Pedido->payment_type}} </th></tr>
                  <tr><td>merchant_order_id</td><th>{{ $Pedido->merchant_order_id}} </th></tr>
                  <tr><td>preference_id</td><th>{{ $Pedido->preference_id}} </th></tr>
                  <tr><td>site_id</td><th>{{ $Pedido->site_id}} </th></tr>
                  <tr><td>processing_mode</td><th>{{ $Pedido->processing_mode}} </th></tr>
                  <tr><td>merchant_account_id</td><th>{{ $Pedido->merchant_account_id}} </th></tr>
                  <tr><td>sino_pedido_procesado</td><th>{{ $Pedido->sino_pedido_procesado}} </th></tr>

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          </div>


          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Productos</h3>

              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tbody><tr>
                    <th>Producto</th>
                    <th>Importe</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                  </tr>
                  <?php foreach ($Lineas_de_pedido as $Linea) {?>
                  <tr>
                    <td> {{ $Linea->producto_id }} </td>
                    <td> $ {{ number_format($Linea->moneda_importe, 2, ',', '.') }} </td>
                    <td> {{ $Linea->cantidad }} </td>
                    <td> $ {{ number_format($Linea->moneda_importe_total, 2, ',', '.') }} </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>

        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

<!-- DataTables -->
<script src="<?php echo env('PATH_PUBLIC')?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo env('PATH_PUBLIC')?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>


<!-- MODAL ABM -->
  <div class="modal modal fade" id="modal-solicitud-abm">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><div id="modal-titulo">Info Modal</div></h4>
        </div>
        <div class="modal-body" id="modal-bodi-abm">

        </div>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<!-- MODAL ABM -->


<!-- FUNCIONES MODIFICAR DATOS -->
  <?php 
  $gen_seteo = array(
      'gen_url_siguiente' => 'back', 
      'no_mostrar_campos_abm' => 'password|rol_de_usuario_id|remember_token'
    );
  ?>   

  <script type="text/javascript">

    function crearABM_user(gen_id = null) {

      $.ajax({
        url: '<?php echo env('PATH_PUBLIC') ?>crearabm',
        type: 'POST',
        dataType: 'html',
        async: true,
        data:{
          _token: "{{ csrf_token() }}",
          gen_modelo: 'Pedido',
          gen_seteo: '<?php echo serialize($gen_seteo) ?>',
          gen_opcion: '',
          gen_accion: 'm',
          gen_id: gen_id
        },
        success: function success(data, status) {        
          $("#modal-bodi-abm").html(data);
          if (gen_accion == 'm') {
            $("#modal-titulo").html('Modificar Datos');
          }

        },
        error: function error(xhr, textStatus, errorThrown) {
            alert(errorThrown);
        }
      });
    }

  </script>
<!-- FUNCIONES MODIFICAR DATOS -->     

@endsection
