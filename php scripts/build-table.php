<?php

// Imprimir tabla
include "sql-fetcher.php";
include "functions.php";
include "barcode-generator.php";

$tabla = "juguetes";
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
$n = sizeof($campos);

$data = fetch_fields($tabla, $campos);
echo (' <div class="table-responsive table mt-2 text-center" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                        <table class="table my-0 cell-text" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th class="align-middle">Detalle</th>
                                                    <th>Nombre</th>
                                                    <th>Marca</th>
                                                    <th>Precio</th>
                                                    <th>Piezas</th>
                                                    <th>Modelo</th>
                                                    <th>Barras</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table-toys" class="articles-table">');
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
                                            <a href="detalle.php?product=' . $info[0] . '">
                                                <img class="mini-image" src="' . $info[10] . '">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="detalle.php?product=' . $info[0] . '">
                                                <span>' . $info[1] . '</span><br>
                                            </a>
                                        </td>
                                        <td><a href="detalle.php?product=' . $info[0] . '"><span>' . $info[6] . '</span><br></a></td>
                                        <td><a href="detalle.php?product=' . $info[0] . '"><span>$' . $info[9] . '</span><br></a></td>
                                        <td>
                                            <div class="col"><span id="quant-1"><a href="detalle.php?product=' . $info[0] . '">' . $info[8] . '</a></span></div>
                                        </td>
                                        <td><a href="detalle.php?product=' . $info[0] . '"><span>' . $info[3] . '</span><br></a></td>
                                        <td>
                                            <div class="col d-flex align-middle">
                                                <div class="row" style="margin: 0px !important;">
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col"><a href="detalle.php?product=' . $info[0] . '"><span style="font-size: 100% !important;">' . $info[5] . '</span></a></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col" style="padding: 3px !important;"><a href="detalle.php?product=' . $info[0] . '">' . $barras . '</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><br>
                                        </td>
                                    </tr>');
}
// Terminan filas
echo ('          </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td class="align-middle"><strong>Detalle</strong></td>
                                                    <td><strong>Nombre</strong></td>
                                                    <td><strong>Marca</strong></td>
                                                    <td><strong>Precio</strong></td>
                                                    <td><strong>Piezas</strong></td>
                                                    <td><strong>Modelo</strong></td>
                                                    <td><strong>Barras</strong></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>');
// Fin de impresión de tabla
