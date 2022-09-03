


@extends('layouts.frontend')


@section('title')
  <?php echo $titulo ?> | Nautica Baum
@endsection

@section('contenido')

<script type="text/javascript">
	fbq('track', 'Purchase', {value: <?php echo $Pedido->moneda_importe_total ?>, currency: 'ARS'});
	window.location.replace("<?php echo $url ?>");
</script>
  
@endsection

