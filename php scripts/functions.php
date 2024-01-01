<?php
function contains_string($main_string, $substring)
{
    // strpos devuelve la posición donde se encuentra la subcadena
    // Si no se encuentra, devuelve false
    return strpos($main_string, $substring) !== false;
}
function split_urls($urls)
{
    if (contains_string($urls, ", ")) {
        $img_urls = array();
        $img_urls = explode(", ", $urls);
    } else {
        $img_urls = $urls;
    }
    return $img_urls; // Usar como $data = split_urls($cadena_con_urls); (Validar con length)
}
function splitter($urls, $divisor)
{
    $strins_array = array();
    $strins_array = explode($divisor, $urls);
    return $strins_array; // Usar como $data = split_urls($cadena_con_urls); (Validar con length)
}
/* Validación de array
if (is_array(split_urls($urls))) {
    $img = (split_urls($urls))[0];
} else {
    $img = split_urls($urls);
}
*/
function build_table_dom($table, $data, $fields)
{
    switch ($table) {
        case 'juguetes':
            break;

        default:
            # code...
            break;
    }
}

function build_detail_carousel($imgs)
{
    $carousel = '';
    $n = sizeof($imgs);

    $carousel_capusule1 = '<div id="carousel-1" class="carousel slide" data-bs-ride="carousel">';
    $carousel_capusule2 = '</div>';

    $carousel_elements = '<div class="carousel-inner">';
    $carousel_indexes = '<ol class="carousel-indicators">';

    $carousel_buttons = '<div>
    <a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
      <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
      <span class="visually-hidden">Next</span>
    </a>
  </div>';

    for ($i = 0; $i < $n; $i++) {
        $element = '<div class="carousel-item">';
        $index = '<li data-bs-target="#carousel-1" data-bs-slide-to="';

        if ($i == 0) {
            // Añadir clases active al primer elemento e índice
            $element = str_replace('">', ' active">', $element);
            $index = str_replace('<li ', '<li class="active" ', $index);
        }

        $element .= ('<img class="w-100 d-block" src="' . ($imgs[$i]) . '" alt="Imagen ' . ($i + 1) . '" />');
        $index .= $i;

        $element .= '</div>';
        $index .= '"></li>';

        $carousel_elements .= $element;
        $carousel_indexes .= $index;
    }

    $carousel_elements .= '</div>';
    $carousel_indexes .= '</ol>';
    $carousel .= ($carousel_capusule1 . $carousel_elements . $carousel_buttons . $carousel_indexes . $carousel_capusule2);
    return $carousel;
    /*
        Invocación:
        build_detail_carousel($split_urls($data[$10])) // $data[10] es imgs de SQL
    */
}
function avatar_img($src)
{
    if ($src == "" || $src == null) {
        if (isset($_SESSION['id'])) {
            $final_src = $_SESSION['img'];
        } else {
            $final_src = "assets/img/avatars/avatar5.jpeg";
        }
    } else {
        $final_src = $src;
    }

    $avatar_img = ('<img class="border rounded-circle img-profile" src="' . $final_src . '">');
    return $avatar_img;
}

function fecha()
{
    $day = date('l');
    $month = date('m');
    $year = date('Y');
    switch ($day) {
        case "Monday":
            $str_day = "Lunes";
            break;
        case "Tuesday":
            $str_day = "Martes";
            break;
        case "Wednesday":
            $str_day = "Miercoles";
            break;
        case "Thursday":
            $str_day = " Jueves";
            break;
        case "Friday":
            $str_day = "Viernes";
            break;
        case "Saturday":
            $str_day = "Sábado";
            break;
        case "Sunday":
            $str_day = "Domingo";
            break;
    }

    $day = date('j');

    switch ($month) {
        case '01':
            $month = 'Enero';
            break;
        case '02':
            $month = 'Febrero';
            break;
        case '03':
            $month = 'Marzo';
            break;
        case '04':
            $month = 'Abril';
            break;
        case '05':
            $month = 'Mayo';
            break;
        case '06':
            $month = 'Junio';
            break;
        case '07':
            $month = 'Julio';
            break;
        case '08':
            $month = 'Agosto';
            break;
        case '09':
            $month = 'Septiembre';
            break;
        case '10':
            $month = 'Octubre';
            break;
        case '11':
            $month = 'Noviembre';
            break;
        case '12':
            $month = 'Diciembre';
            break;
    }

    $fecha = ($str_day . " " . $day . " de " . lcfirst($month) . " del " . $year);
    $hora = date('H:i:s');
    return ($fecha . " " . $hora);
}

function sql_insertion_get_id($data, $table)
{
    include "connection.php";
    // Realizar la inserción en la base de datos
    // INSERT INTO `transacciones` VALUES('', ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP);
    $sql = ("INSERT INTO `" . $table . "` VALUES ('', ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)");
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sisdsi", $data[0], $data[1], $data[2], $data[3], $data[4], $data[5]);
    $stmt->execute();

    // Obtener el ID de la última inserción con conexión de tipo PDO mysqli
    $id_transaction = $connection->insert_id;
    return $id_transaction;
}

function sql_transaction_insert($params, $table)
{
    include_once "credentials.php";
    $data = generatePasskey('sql'); // No es un bug, es una feature, je, je
    $connection = new mysqli("localhost", $data[0], $data[1], $data[2]);
    if ($connection->connect_error) {
        die("La conexión a la base de datos falló: " . $connection->connect_error);
    } else {
        #echo ("Conexión establecida"); # Confirmación de conexión
    }
    // Consulta para la inserción
    // INSERT INTO `transacciones` VALUES('', 'Physical', 1, 'juguetes', 671.00, 'sale', 1, CURRENT_TIMESTAMP);
    $channel = strval($params[0]);
    $quantity = intval($params[1]);
    $categories = strval($params[2]);
    $amount = floatval($params[3]);
    $type = strval($params[4]);
    $user = intval($params[5]);
    $sql = ("INSERT INTO `" . $table . "` VALUES ('', '" . $channel . "', " . $quantity . ", '" . $categories . "', " . $amount . ", '" . $type . "', " . $user . ", CURRENT_TIMESTAMP)");

    // Ejecutar la consulta
    if ($connection->query($sql) === TRUE) {
        $last_id = $connection->insert_id;
    } else {
        //echo "Error en la inserción: " . $conexion->error;
    }

    // Cerrar la conexión
    $connection->close();
    return $last_id;
}

function get_last_insert_id($connection)
{
    return $connection->insert_id;
}

function on_load_cart_builder(){
    if(isset($_SESSION['cart'])){
        $html = '<tr class="align-middle articles-row">
                    <td class="article-icon"><a href="detalle.html"><img class="mini-image data-img" src="assets/img/test/pm1.jpg"></a></td>
                    <td><a href="detalle.html"><span class="data-name" style="color: rgb(133, 135, 150);">Producto 2 de prueba para tablita</span><br></a>
                        <div class="col d-flex align-middle justify-content-center">
                            <div class="row" style="margin: 0px !important;">
                                <div class="col">
                                    <div class="row">
                                        <div class="col"><a href="detalle.html"><span class="data-barcode" style="font-size: 100% !important;">4008789701428</span></a></div>
                                    </div>
                                    <div class="row">
                                        <div class="col" style="padding: 3px !important;"><a href="detalle.html"><img class="barcode-img" src="assets/img/test-barcode.png"></a></div>
                                    </div>
                                    <div class="row">
                                        <div class="col col-3" style="padding: 3px !important;"><a href="detalle.html"><span class="data-id" style="font-size: xx-small !important;">ID: 5</span></a></div>
                                        <div class="col" style="padding: 3px !important;"><a href="detalle.html"><span class="data-category" style="font-size: xx-small !important;line-height: .2;">Categoría: Juguetes</span></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td><a class="fs-5" href="detalle.html"><span class="data-price" style="color: rgb(133, 135, 150);">$300</span><br></a></td>
                    <td>
                        <div class="col" style="height: 100% !important;width: 90% !important;">
                            <div class="row">
                                <div class="col col-6 pe-0 d-flex align-items-center justify-content-end"><input type="number" class="quantity-input d-flex justify-content-center data-quantity" style="width: 100% !important;text-align: center !important;" value="1" max="3" onchange="javascript:calculate_totals();"><input type="number" class="d-flex justify-content-center data-stock visually-hidden" style="width: 100% !important;text-align: center !important;" value="3" max="3" min="3" disabled=""></div>
                                <div class="col col-6 p-0"><span class="delete-button p-2 fw-bold m-0" onclick="javascript:remove_product(0);"><i class="fas fa-trash-alt"></i></span></div>
                            </div>
                        </div>
                    </td>
                    <td><span class="fw-bold fs-5 subtotal-container">$300</span></td>
                </tr>';
    }
}