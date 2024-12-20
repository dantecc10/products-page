<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ../index.php");
}

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
    //echo ($total_transaction); // Debug line #
    $data = array();
    $data = [$channel, $articles_transaction, $categories, $total_transaction, $type, $user];

    $transaction_id = sql_transaction_insert($data, "transacciones");
    if ($transaction_id == false) {
        echo ("Error fatal en inserción y obtención de id de transacción.");
        unset($transaction_id);
    }

    $ticket_capsule_1 = '<table>
                            <tr>
                                <th style="font-size: 2.8mm;" class="width-1 fs-mm super-center">ID</th>
                                <th style="font-size: 2.8mm;" class="width-2 fs-mm super-center">Descripción / Precio</th>
                                <th style="font-size: 2.8mm;" class="width-3 fs-mm super-center">Cant.</th>
                                <th style="font-size: 2.5mm;" class="width-4 fs-mm super-center">Subtotal</th>
                            </tr>';
    $ticket_capsule_2 = '</table>';
    $ticket_articles = "";
    //echo ($n); //Commit móvil 
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
            $keys = generatePasskey('sql');
            $connection = new mysqli("localhost", $keys[0], $keys[1], "comercial");
            if (($_SESSION['email'] == "demo_user@system.com") OR ($_SESSION['user'] == "demo_user")) {
                $connection = new mysqli("localhost", "comercial_demo", $keys[1], "comercial_demo");
            }
            if ($connection->connect_error) {
                die("La conexión a la base de datos falló: " . $connection->connect_error);
            } else {
                #echo ("Conexión establecida"); # Confirmación de conexión
            }
            if ($connection->query($query) === TRUE) {
                //echo ("Insertando consulta"); // Inserción exitosa
            }
            $connection->close();
            // Consulta exitosa 
            // Crear HTML para ticket PDF
            $ticket_articles .= ('<tr>
            <td style="font-size: 3mm; vertical-align: middle" class="width-1 fs-mm super-center">' . $id .
                '</td>
                <td style="font-size: 3mm; vertical-align: middle" class="width-2 fs-mm super-center">' . $name .
                " / ($" . $price . " MXN)" .
                '</td>
                <td style="font-size: 3mm; vertical-align: middle" class="width-3 fs-mm super-center">' . $quantity .
                '</td>
                <td style="font-size: 3mm; vertical-align: middle" class="width-4 fs-mm super-center">$' . ((intval($quantity)) * (floatval($price))) . "</td>
                </tr>");
        }
    }
    $ticket_html = ($ticket_capsule_1 . $ticket_articles . $ticket_capsule_2);

    // Cargo como datos en sesión información para HTML de carrito
    $_SESSION['ticket']['html'] = $ticket_html;
    $_SESSION['ticket']['transaction_id'] = $transaction_id;
    $_SESSION['ticket']['totals'][0] = $total_transaction;
    $_SESSION['ticket']['totals'][1] = $articles_transaction;
    $_SESSION['ticket']['employe_name'] = ($_SESSION['name'] . " " . $_SESSION['lastNames']);
    header("Location: ticket-generator.php");
}
