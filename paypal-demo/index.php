<?php 
include('header.php');
include('config.php');
$productName = "Producto Demostración";
$currency = "USD";
$productPrice = 25;
$productId = 123456;
$orderNumber = 546;
?>
<title>Paypal PHP integración con ejemplo completo : BaulPHP</title>
<?php include('contenedor.php');?>
<div class="container">
	<h2>Paypal PHP integración con ejemplo completo</h2>	
	<br>
	<table class="table">
	    <tr>
          <td style="width:150px"><img src="producto_demo.jpg" style="width:50px" /></td>
          <td style="width:150px">$<?php echo $productPrice; ?></td>
          <td style="width:150px">
          <?php include 'paypalCheckout.php'; ?>
          </td>
        </tr>
    </table>	
	<div style="margin:50px 0px 0px 0px;">
		<a class="btn btn-default read-more" style="background:#3399ff;color:white" href="https://www.baulphp.com/paypal-php-integracion-con-ejemplo-completo/">Retornar al  Tutorial</a>		
	</div>
</div>
<?php include('footer.php');?>
