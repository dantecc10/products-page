<?php
require '../vendor/autoload.php'; // Carga la biblioteca a través de Composer

use Picqer\Barcode\BarcodeGeneratorPNG;

$generator = new BarcodeGeneratorPNG();
$barcode = $generator->getBarcode('4008789701428', $generator::TYPE_CODE_128);

echo '<img src="data:image/png;base64,' . base64_encode($barcode) . '">';
?>
