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
    $ticket_capsule_1 = "";
    $ticket_capsule_2 = "";
    $ticket_articles = "";
    for ($i = 0; $i < $n; $i++) {
        $query = "UPDATE `juguetes` SET `quantity_toy` = " . $_SESSION['cart']['Products'][$i]['quantity'] . " WHERE `id_toy` = " . $_SESSION['cart']['Products'][$i]['id'] . ";";
        if (fetch_fields("juguetes", $campos, "", $query) == null) {
            $ticket_articles .= ("" . $_SESSION['cart']['Products'][$i]['id']
                . "" . $_SESSION['cart']['Products'][$i]['name']
                . " / ($" . $_SESSION['cart']['Products'][$i]['price'] . " MXN)"
                . "" . $_SESSION['cart']['Products'][$i]['quantity']
                . "" . ((intval($_SESSION['cart']['Products'][$i]['quantity'])) * (floatval($_SESSION['cart']['Products'][$i]['price'])))
                . "");
        } else {
        }
    }
    $ticket_html = ($ticket_capsule_1 . $ticket_articles . $ticket_capsule_2);
}
