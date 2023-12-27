<?php
require '../vendor/autoload.php';

use chillerlan\QRCode\QRCode;

$data = 'comercial.castelancarpinteyro.com/details.php?product=15';

// quick and simple:
echo '<img src="' . (new QRCode)->render($data) . '" alt="QR Code" />';
?>