<?php
require '../vendor/autoload.php';

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\Output\;

// URL que quieres codificar en el QR
$url = 'https://castelancarpinteyro.com';

$options = [
    'outputType' => QRCode::QROutputInterface::GDIMAGE_PNG,
    'eccLevel' => QRCode::ECC_H,
    'imageBase64' => false,
    'imageTransparent' => false,
    'cacheEnabled' => true,
    'cacheDir' => __DIR__ . '/qr_cache/', // Directorio para almacenar en caché
    'cacheFilename' => md5($qrContent) . '.png', // Nombre de archivo
];

// Crea una instancia del generador QR
$qr = new QRCode($options);

// Genera el código QR y guarda la imagen
$imagenQR = $qr->render($url);
$rutaImagen = 'qrcodes/qrcode_' . time() . '.png'; // Nombre del archivo con una marca de tiempo para evitar sobrescribir

// Guarda la imagen QR
file_put_contents($rutaImagen, $imagenQR);

// Devuelve la ruta de la imagen
//echo $rutaImagen;

//echo ('<img src="' . $rutaImagen . ">");
