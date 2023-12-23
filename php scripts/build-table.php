<?php
// Imprimir tabla
include "sql-fetcher.php";
include "functions.php";

if (isset($_GET['table'])) {
    $tabla = $_GET['table'];
} else {
    $tabla = "juguetes";
}

switch ($tabla) {
    case 'juguetes':
        $campos = array();
        $campos = [
            "id_toy", "name_toy", "description_toy", "model_toy", "line_toy", "bars_toy", "brand_toy", "pieces_toy", "quantity_toy",
            "price_toy", "imgs_toy", "quant_imgs_toy"];
        break;

    default:
        echo ("Algo sucedió en la recepción de la variable tabla (no es 'juguetes')");
        break;
}

if (isset($_GET['filter'])) {
    $query = ("SELECT * FROM `" . $tabla . "` WHERE ");
    for ($i = 0; $i < sizeof($campos); $i++) {
        if ($i == (sizeof($campos) - 1)) {
            $query .= ("`" . $campos[$i] . "` LIKE '%" . $_GET['filter'] . "%'");
        } else {
            $query .= ("`" . $campos[$i] . "` LIKE '%" . $_GET['filter'] . "%' OR ");
        }
    }
} else {
    $query = "";
}

$data = fetch_fields($tabla, $campos, "", $query);
function main_build($data)
{
    include "barcode-generator.php";
    if (is_array($data)) {
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

            if (isset($_GET['client'])) {
                $barras = barcode_src_generator($generator, $info[5]);
                $client = $_GET['client'];
                if ($client == "sale") {
                    if (isset($_GET['articlen'])) {
                        $article_n = $_GET['articlen'];
                    } else {
                        $article_n = "Error en el GET";
                    }
                    // Generar DOM para sale.html/.php
                    echo ('<tr class="align-middle articles-row">
                            <td class="article-icon">
                                <a href="details.php?product=' . $info[0] . '">
                                    <img class="mini-image data-img" src="' . $info[10] . '">
                                </a>
                            </td>
                            <td>
                                <a href="detalle.html">
                                    <span class="data-name" style="color: rgb(133, 135, 150);">' . $info[1] . '</span><br />
                                </a>
                                <div class="col d-flex align-middle justify-content-center">
                                    <div class="row" style="margin: 0px !important;">
                                        <div class="col">
                                            <div class="row">
                                                <div class="col">
                                                    <a href="details.php?product=' . $info[0] . '">
                                                        <span class="data-barcode" style="font-size: 100% !important;">' . $info[5] . '</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col" style="padding: 3px !important;">
                                                    <a href="details.php?product=' . $info[0] . '">
                                                        <img class="barcode-img" src="' . $barras . '">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col col-3" style="padding: 3px !important;">
                                                    <a href="details.php?product=' . $info[0] . '">
                                                        <span class="data-id" style="font-size: xx-small !important;">ID: ' . $info[0] . '</span>
                                                    </a>
                                                </div>
                                                <div class="col" style="padding: 3px !important;">
                                                    <a href="details.php?product=' . $info[0] . '">
                                                        <span class="data-category" style="font-size: xx-small !important;line-height: .2;">Categoría: Juguetes</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a class="fs-5" href="details.php?product=' . $info[0] . '">
                                    <span class="data-price" style="color: rgb(133, 135, 150);">$' . $info[9] . '</span><br />
                                </a>
                            </td>
                            <td>
                                <div class="col" style="height: 100% !important;width: 90% !important;">
                                    <div class="row">
                                        <div class="col col-6 pe-0 d-flex align-items-center justify-content-end">
                                            <input type="number" class="quantity-input d-flex justify-content-center data-quantity" style="width: 100% !important;text-align: center !important;" value="1" max="' . $info[8] . '">
                                            <input type="number" class="d-flex justify-content-center data-stock visually-hidden" style="width: 100% !important;text-align: center !important;" value="' . $info[8] . '" max="3" min="3" disabled="">
                                        </div>
                                        <div class="col col-6 p-0">
                                            <span class="delete-button p-2 fw-bold m-0" onclick="javascript:remove_product(' . $article_n . ');">
                                                <i class="fas fa-trash-alt"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="fw-bold fs-5 subtotal-container">$' . $info[9] . '</span></td>
                            </tr>');
                    $i = $n;
                }
            } else {
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
        }
    }
    // Terminan filas
}

main_build($data);
