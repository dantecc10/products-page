<?php
require '../vendor/autoload.php';

use chillerlan\QRCode\QRCode;

// URL que quieres codificar en el QR
$url = 'https://castelancarpinteyro.com';

// Crea una instancia del generador QR
$qr = new QRCode();

// Genera el código QR y guarda la imagen
$imagenQR = $qr->render($url);
$rutaImagen = 'qrcodes/qrcode_' . time() . '.png'; // Nombre del archivo con una marca de tiempo para evitar sobrescribir

// Guarda la imagen QR
file_put_contents($rutaImagen, $imagenQR);

// Devuelve la ruta de la imagen
//echo $rutaImagen;

echo ('<img src="' . $rutaImagen . ">");
