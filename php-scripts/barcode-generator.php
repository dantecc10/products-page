<?php
//error_reporting(0);
$cur_dir = explode(PATH_SEPARATOR, getcwd());
if ($cur_dir[count($cur_dir) - 1] == "php-scripts") {
    include_once('../vendor/autoload.php'); // Carga la biblioteca a través de Composer
} else {
    include_once('../vendor/autoload.php'); // Carga la biblioteca a través de Composer
}

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

function barcode_src_generator($generator, $bars)
{
    $barcode = $generator->getBarcode($bars, $generator::TYPE_CODE_128);
    $src = ("data:image/png;base64," . base64_encode($barcode));
    return $src;
}

if (isset($_GET['bars'])) {
    $dynamicBarCode = $_GET['bars'];
    $barcode = $generator->getBarcode($dynamicBarCode, $generator::TYPE_CODE_128);
    //echo ("data:image/png;base64," . base64_encode($barcode));
    echo ('<img class="px-md-4" alt="Código de barras: ' . $dynamicBarCode . '" style="width: 100% !important;/*height: 75% !important;*//*padding-top: 12.5%;*//*padding-bottom: 12.5%;*/" src="' . 'data:image/png;base64,' . base64_encode($barcode) . '">');
}
/* Ejemplo de invocación:
$number = "7501000278404";
echo bar_code_img($generator, $number); // Imprime HTML <img>
*/
