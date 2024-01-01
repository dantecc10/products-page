<?php

session_start();
if (isset($_SESSION['cart'])) {
    include_once "functions.php";
    include_once "sql-fetcher.php";

    $n = sizeof($_SESSION['cart']['Products']);
    $campos = array();
    $campos = [
        "id_toy", "name_toy", "description_toy", "model_toy", "line_toy", "bars_toy", "brand_toy", "pieces_toy", "quantity_toy",
        "price_toy", "imgs_toy", "quant_imgs_toy"
    ];

    $outputHTML = "";
    $htmlCapsule1 = "";
    $htmlCapsule2 = "";

    for ($i = 0; $i < $n; $i++) {
        $product_info = fetch_fields("juguetes", $campos, $i, null);
        $outputHTML .= $htmlCapsule1;


        $outputHTML .= $htmlCapsule2;
    }
} else {
    echo ('<tr>
                <div class="row col-12 d-flex align-middle">
                    <span class="col-12 d-flex justify-content-center">Aún no se han cargado artículos a la caja.</span>
                </div>
           </tr>');
}
