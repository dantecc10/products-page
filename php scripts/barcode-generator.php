<?php
require 'vendor/autoload.php'; // Carga la biblioteca a través de Composer

use Picqer\Barcode\BarcodeGeneratorPNG;
$generator = new BarcodeGeneratorPNG();

// Variables dinámicas
# $barcode = $generator->getBarcode('4008789701428', $generator::TYPE_CODE_128); # Constante de debug

function bar_code_img($generator, $dynamicBarCode)
{
    $barcode = $generator->getBarcode($dynamicBarCode, $generator::TYPE_CODE_128);
    #echo '<img class="barcode-img" width="100" height="80" src="data:image/png;base64,' . base64_encode($barcode) . '">';
    $img = ('<img src="data:image/png;base64,' . base64_encode($barcode) . '" alt="Código de barras: ' . $dynamicBarCode . '" class="barcode-img">');
    return $img; # Devuelve imagen con clase para adaptar con CSS
}
/* Ejemplo de invocación:
$number = "7501000278404";
echo bar_code_img($generator, $number); // Imprime HTML <img>
*/