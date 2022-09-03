
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '338767409919593');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=338767409919593&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->


<?php if ($_GET['close'] == 1) { ?>
	<script>
		parent.jQuery(".iframe").colorbox.close();		
	</script>
<?php } ?>

<?php

$Lineas = explode(';', $_GET['Productos']);
$TotalMP = $_GET['TotalMP'];

// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';

// Agrega credenciales

// NAUTICABAUM
MercadoPago\SDK::setAccessToken('APP_USR-3104686397349011-091022-54e86ae97f4e9d644692844b1fd62c0a-80074151');

//TEST 
//MercadoPago\SDK::setAccessToken('APP_USR-2561513186782456-091101-325742b3fa511509dc501fa118f6a684-643659729');

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();
$items = [];

?>
<img src="img/mercado-pago-logo-2.png">
<table class="table table-hover"> 
	<thead> 
		<tr> 
			<th>Producto</th> 
			<th>Cantidad</th> 
			<th>Importe</th> 
		</tr> 
	</thead> 
	<tbody> 


<?php
$i = 0;
$content_ids = '';
foreach ($Lineas as $Linea) {
	$i++;
	if (strpos($Linea, '|') !== false) {
		$Linea = explode('|', $Linea);
		$Producto = trim($Linea[0]);
		$Cantidad = trim($Linea[1]);
		$Importe = trim($Linea[2]);
		$ID = trim($Linea[3]);

		if ($content_ids == '') {
			$content_ids = $ID;
		}
		else {
			$content_ids .= ','.$ID;
		}

		if (strpos($Producto, 'onera') !== false) {
			$Producto = 'Riñonera';
		}
?>
	<tr> 
		<td><?php echo $Producto ?></td> 
		<td><?php echo $Cantidad ?></td> 
		<td>$ <?php echo number_format($Importe, 2, ',', '.') ?></td> 
	</tr>
<?php
		// Crea un ítem en la preferencia
		$item = new MercadoPago\Item();
		$item->title = $Producto;
		$item->quantity = $Cantidad;
		$item->unit_price = $Importe;
		array_push($items, $item);

	}

}

$content_ids = '['.$content_ids.']';
$preference->items = $items;

$preference->back_urls = $back_urls;
$preference->save();


// TETE3673581 test_user_40082864@testuser.com qatest7929  (vendedor)
// TESTQMJXIMUV test_user_87065378@testuser.com qatest2040 (comprador 1)
// TEST3HRYEESO test_user_90219194@testuser.com qatest9498 (comprador 2)
?>

	<tr> 
		<th scope="row">TOTAL</th> 
		<td></td> 
		<th>$ <?php echo number_format($TotalMP, 2, ',', '.'); ?></th> 
	</tr>
	</tbody> 
</table>

<form action="https://www.nauticabaum.com.ar" method="POST" target="_top" id="target">
  <script
   src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
   data-preference-id="<?php echo $preference->id; ?>">
  </script>
</form>

<script type="text/javascript">

$( "#target" ).submit(function( event ) {
  	
  	fbq('trackCustom', 'ClicEnBotonPagarMP');

	fbq('track', 'Purchase', {
	    content_ids: <?php echo $content_ids ?>,
	    currency: 'ARS', 
	    value: <?php echo $TotalMP ?>,
		content_type: 'product'
	});

});

</script>