<?php ob_start();?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- jQuery -->

<title>Baulphp.com </title>
</head>
<body class="">
<div role="navigation" class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="https://www.baulphp.com" class="navbar-brand">BAULPHP</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="https://www.baulphp.com">PORTADA</a></li>
           
          </ul>
         
        </div><!--/.nav-collapse -->
      </div>
    </div>
	
	<div class="container" style="min-height:500px;">
	<div class=''>
	</div>
<div class="container">
	<h2>Paypal Express Checkout Demo with PHP</h2>	
	<?php 
	$orderNumber = 999;
	if(!empty($_GET['paymentID']) && !empty($_GET['payerID']) && !empty($_GET['token']) && !empty($_GET['pid']) ){
		$paymentID = $_GET['paymentID'];
		$payerID = $_GET['payerID'];
		$token = $_GET['token'];
		$pid = $_GET['pid'];   
		?>
		<div class="alert alert-success">
		  <strong>Éxito!</strong> Su pedido se procesó correctamente.
		</div>
		<table>       
			<tr>
			  <td><strong>Payment Id:</strong>  <?php echo $paymentID; ?></td>
            </tr>
            <tr>
			  <td><strong>Payer Id:</strong> <?php echo $payerID; ?></td>
              </tr>
            <tr>
			  <td><strong>Product Id:</strong> <?php echo $pid; ?></td>
			  <!--<td><php echo ; ?></td>-->
			</tr>       
		</table>
	<?php	
	} else {
		header('Location:index.php');
	}
	?>
	<div style="margin:50px 0px 0px 0px;">
		<a class="btn btn-default read-more" style="background:#3399ff;color:white" href="https://www.baulphp.com/paypal-php-integracion-con-ejemplo-completo/">Regresar al tutorial</a>		
	</div>
</div>
<div class="insert-post-ads1" style="margin-top:20px;">

</div>
</div>
</body></html>
<?php ob_end_flush(); ?>