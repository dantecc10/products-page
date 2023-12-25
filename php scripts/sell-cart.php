<?php
session_start();
if (isset($_SESSION['cart'])) {
    include "functions.php";
    include "sql-fetcher.php";
    $campos = array();
    $campos = [
        "id_toy", "name_toy", "description_toy", "model_toy", "line_toy", "bars_toy", "brand_toy", "pieces_toy", "quantity_toy",
        "price_toy", "imgs_toy", "quant_imgs_toy"
    ];

    $n = sizeof($_SESSION['cart']['Products']);
    for ($i = 0; $i < $n; $i++) {
        $query = "UPDATE `juguetes` SET `quantity_toy` = " . $_SESSION['cart']['Products'][$i]['quantity'] . " WHERE `id_toy` = " . $_SESSION['cart']['Products'][$i]['id'] . ";";
        if (fetch_fields("juguetes", $campos, "", $query) == null) {
        } else {
        }
    }
}
