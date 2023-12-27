<?php
session_start();
if (isset($_SESSION['cart'])) {
    include "sql-fetcher.php";
    include "functions.php";
    $campos = array();
    $campos = [
        "id_toy", "name_toy", "description_toy", "model_toy", "line_toy", "bars_toy", "brand_toy", "pieces_toy", "quantity_toy",
        "price_toy", "imgs_toy", "quant_imgs_toy"
    ];

    $n = sizeof($_SESSION['cart']['Products']);

    $total_transaction = 0;
    $articles_transaction = 0;
    for ($i = 0; $i < $n; $i++) {
        $total_transaction += ((floatval($_SESSION['cart']['Products'][$i]['price'])) * (intval($_SESSION['cart']['Products'][$i]['quantity'])));
        $articles_transaction += (intval($_SESSION['cart']['Products'][$i]['quantity']));
    }
    if (!isset($_SESSION['sale_details'])) {
        // Default values for a transaction
        $channel = "Physical";
        $categories = "juguetes";
        $type = "sale";
        $user = 1;
    }
    $channel = "Physical";
    $categories = "juguetes";
    $type = "sale";
    $user = 1;

    $total_transaction = doubleval($total_transaction);
    //echo ($total_transaction);
    $data = array();
    $data = [$channel, $articles_transaction, $categories, $total_transaction, $type, $user];

    $transaction_id = sql_transaction_insert($data, "transacciones");
    if ($transaction_id == false) {
        echo ("Error fatal en inserción y obtención de id de transacción.");
        unset($transaction_id);
    }

    // Consulta para insertar una transacción a la base de datos.
    // INSERT INTO `transacciones` VALUES('', 'Physical', 1, 'juguetes', 671.00, 'sale', 1, CURRENT_TIMESTAMP);
    // INSERT INTO `transacciones` VALUES('', ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP);
    //$query = ("INSERT INTO `transacciones` VALUES('', '" . $channel . "', " . $articles_transaction . ", '" . $categories . "', " . $total_transaction . ", '" . $type . "', " . $user . ", CURRENT_TIMESTAMP)");
    //fetch_fields("juguetes", $campos, "", $query);

    $ticket_capsule_1 = "";
    $ticket_capsule_2 = "";
    $ticket_articles = "";
    echo ($n); //Commit móvil 
    for ($i = 0; $i < $n; $i++) {
        $query = "UPDATE `juguetes` SET `quantity_toy` = " . ($_SESSION['cart']['Products'][$i]['stock'] - $_SESSION['cart']['Products'][$i]['quantity']) . " WHERE `id_toy` = " . $_SESSION['cart']['Products'][$i]['id'] . ";";
        if (fetch_fields("juguetes", $campos, "", $query) == null) {
            // Registrar venta por artículo
            $id = $_SESSION['cart']['Products'][$i]['id'];
            $name = $_SESSION['cart']['Products'][$i]['name'];
            $category = $_SESSION['cart']['Products'][$i]['category'];
            $quantity = $_SESSION['cart']['Products'][$i]['quantity'];
            $price = $_SESSION['cart']['Products'][$i]['price'];
            $subtotal = (floatval($price) * intval($quantity));

            // Consulta para insertar una venta a la base de datos.
            // INSERT INTO `ventas` VALUES('', 1, 13, 'juguetes', 671.00, 1, 671.00);
            // INSERT INTO `ventas` VALUES('', ?, ?, ?, ?, ?, ?);
            $query = ("INSERT INTO `ventas` VALUES('', " . $transaction_id . ", " . $id . ", '" . $category . "', " . $price . ", " . $quantity . ", " . $subtotal . ")");
            include_once "connection.php";
            if ($connection->query($query) === TRUE) {
                echo ("Insertando consulta");
            }

            // Consulta exitosa
            // Crear HTML para ticket PDF
            $ticket_articles .= ("" . $id .
                "" . $name .
                " / ($" . $price . " MXN)" .
                "" . $quantity .
                "" . ((intval($quantity)) * (floatval($price))) . "");
        }
    }
    $ticket_html = ($ticket_capsule_1 . $ticket_articles . $ticket_capsule_2);

    // Cargo como datos en sesión información para HTML de carrito
    $_SESSION['ticket']['html'] = $ticket_html;
    $_SESSION['ticket']['transaction_id'] = $transaction_id;
    $_SESSION['ticket']['totals'][0] = $total_transaction;
    $_SESSION['ticket']['totals'][1] = $articles_transaction;
    $_SESSION['ticket']['employe_name'] = ($_SESSION['name'] . $_SESSION['lastNames']);
}
