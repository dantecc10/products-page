<?php

session_start();
if (isset($_SESSION['cart'])) {
    include_once "functions.php";
    include_once "sql-fetcher.php";

    $n = sizeof($_SESSION['cart']['Products']);
    $tabla = "juguetes";
    $campos = array();
    $campos = [
        "id_toy", "name_toy", "description_toy", "model_toy", "line_toy", "bars_toy", "brand_toy", "pieces_toy", "quantity_toy",
        "price_toy", "imgs_toy", "quant_imgs_toy"
    ];

    $outputHTML = "";
    $htmlCapsule1 = '<tr class="align-middle articles-row">';
    $htmlCapsule2 = "</tr>";

    for ($i = 0; $i < $n; $i++) {
        $product_info = fetch_fields($tabla, $campos, $i, null);
        $outputHTML .= $htmlCapsule1;

        $outputHTML .= ('<td class="article-icon">
                            <a href="details.php?product="' . $product_info[0] . '">
                                <img class="mini-image data-img" src="../' . split_urls($product_info[10]) . '">
                            </a>
                        </td>
                        <td>
                            <a href="details.php?product="' . $product_info[0] . '">
                                <span class="data-name" style="color: rgb(133, 135, 150);">' . $product_info[1] . '</span><br>
                            </a>
                            <div class="col d-flex align-middle justify-content-center">
                                <div class="row" style="margin: 0px !important;">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <a href="details.php?product="' . $product_info[0] . '">
                                                    <span class="data-barcode" style="font-size: 100% !important;">' . $product_info[5] . '</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col" style="padding: 3px !important;">
                                                <a href="details.php?product="' . $product_info[0] . '">
                                                    <img src="' . barcode_src_generator($generator, $product_info[5]) . '" class="barcode-img">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-3" style="padding: 3px !important;">
                                                <a href="details.php?product="' . $product_info[0] . '">
                                                    <span class="data-id" style="font-size: xx-small !important;">ID: ' . $product_info[0] . '</span>
                                                </a>
                                            </div>
                                            <div class="col col-9" style="padding: 3px !important;">
                                                <a href="details.php?product="' . $product_info[0] . '">
                                                    <span class="data-category" style="font-size: xx-small !important;line-height: .2;">Categoría: ' . ucfirst($tabla) . '</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="details.php?product="' . $product_info[0] . '" class="fs-5">
                                <span class="data-price" style="color: rgb(133, 135, 150);"></span>
                            </a>
                        </td>
                        <td></td>
                        <td></td>
                        ');

        $outputHTML .= $htmlCapsule2;
    }
} else {
    echo ('<tr>
                <div class="row col-12 d-flex align-middle">
                    <span class="col-12 d-flex justify-content-center">Aún no se han cargado artículos a la caja.</span>
                </div>
           </tr>');
}
