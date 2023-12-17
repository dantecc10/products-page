<?php
// Imprimir tabla
include "sql-fetcher.php";
include "functions.php";
include "barcode-generator.php";

if (isset($_GET['table'])) {
    $tabla = $_GET['table'];
} else {
    $tabla = "juguetes";
}

$campos = array();
$campos = [
    "id_toy",
    "name_toy",
    "description_toy",
    "model_toy",
    "line_toy",
    "bars_toy",
    "brand_toy",
    "pieces_toy",
    "quantity_toy",
    "price_toy",
    "imgs_toy",
    "quant_imgs_toy",
];

$data = fetch_fields($tabla, $campos, "");
$n = sizeof($data);
// Inician filas
for ($i = 0; $i < $n; $i++) {
    $info = array();
    $info = $data[$i];

    if (is_array(split_urls($info[10]))) {
        $info[10] = (split_urls($info[10]))[0];
    } else {
        $info[10] = split_urls($info[10]);
    }

    $barras = bar_code_img($generator, $info[5]);

    echo ('<tr id="article-row-' . $info[0] . '" class="align-middle articles-row">
                                        <td class="article-icon">
                                            <a href="details.php?product=' . $info[0] . '">
                                                <img class="mini-image" src="' . $info[10] . '">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="details.php?product=' . $info[0] . '">
                                                <span>' . $info[1] . '</span><br>
                                            </a>
                                        </td>
                                        <td><a href="details.php?product=' . $info[0] . '"><span>' . $info[6] . '</span><br></a></td>
                                        <td><a href="details.php?product=' . $info[0] . '"><span>$' . $info[9] . '</span><br></a></td>
                                        <td>
                                            <div class="col"><span id="quant-1"><a href="details.php?product=' . $info[0] . '">' . $info[8] . '</a></span></div>
                                        </td>
                                        <td><a href="details.php?product=' . $info[0] . '"><span>' . $info[3] . '</span><br></a></td>
                                        <td>
                                            <div class="col d-flex align-middle justify-content-center">
                                                <div class="row" style="margin: 0px !important;">
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col"><a href="details.php?product=' . $info[0] . '"><span style="font-size: 100% !important;">' . $info[5] . '</span></a></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col" style="padding: 3px !important;"><a href="details.php?product=' . $info[0] . '">' . $barras . '</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><br>
                                        </td>
                                    </tr>');
}
// Terminan filas