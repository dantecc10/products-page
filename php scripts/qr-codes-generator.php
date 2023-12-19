<?php
require '../vendor/autoload.php';

use chillerlan\QRCode\QRCode;

// URL que quieres codificar en el QR
$url = 'https://tusitio.com';

// Crea una instancia del generador QR
$qr = new QRCode();

// Genera el código QR y guarda los datos en base64
$imagenQR = $qr->render($url);
$imagenBase64 = 'data:image/png;base64,' . base64_encode($imagenQR);

// Devuelve la imagen en formato base64 para usarla en el src
//echo $imagenBase64;

echo ('<img src="' . $imagenBase64 . '">');
