<?php

/*
$tabla = "juguetes";
$campos = array();
$campos = ["id_toy", "name_toy", "description_toy", "model_toy", "line_toy", "bars_toy", "brand_toy", "pieces_toy", "quantity_toy",
    "price_toy", "imgs_toy", "quant_imgs_toy"];
*/

function fetch_fields($table, $fields, $id, $custom_query)
{
    include_once "connection.php";
    session_start();
    if (($_SESSION['email'] == "demo_user@system.com") or ($_SESSION['user'] == "demo_user")) {
        $connection = new mysqli("localhost", "comercial_demo", $data[1], "comercial_demo");
    }
    if ($custom_query != "" && $custom_query != null) {
        $query = $custom_query;
    } else {
        if ($id == "" or $id == null) {
            $query = "SELECT * FROM `$table`";
        } else {
            $query_field = ($fields[0]);
            $query = "SELECT * FROM `$table` WHERE `$query_field` = '$id'";
        }
    }

    $result = mysqli_query($connection, $query) or die("Error en la consulta a la base de datos");
    $data = array();

    // Comprobar si las filas son mayores que 0
    $result = $connection->query($query);
    // Verificar si se encontró un usuario válido
    if ((stripos($query, "UPDATE") === false) && (stripos($query, "INSERT") === false)) {
        if ($result->num_rows > 0) {
            $i = 0;
            // Hacer fetch a los datos
            while ($row = $result->fetch_array()) {
                // Procesar cada registro obtenido
                $n = sizeof($fields);
                for ($j = 0; $j < $n; $j++) {
                    ($id == "" or $id == null) ? $data[$i][$j] = $row[$fields[$j]] : $data[$j] = $row[$fields[$j]];
                    //if ($id == "" or $id == null) {
                    //    // Procesar cada columna de cada registro 
                    //    $data[$i][$j] = $row[$fields[$j]];
                    //} else {
                    //    // Procesar cada columna de cada registro 
                    //    $data[$j] = $row[$fields[$j]];
                    //}
                }
                $i++;
            }
            return $data;
        }
    } else {
        // No hay registros en la tabla, o la consulta hizo una actualización: devolver null
        $connection->close();
        return null;
    }
}

//Debug zone
//$tabla = "juguetes";
//$campos = array();
//$campos = ["id_toy", "name_toy", "description_toy", "model_toy", "line_toy", "bars_toy", "brand_toy", "pieces_toy", "quantity_toy", "price_toy", "imgs_toy", "quant_imgs_toy"];
//echo (fetch_fields($tabla, $campos, null, null))[23][1]; # Línea de prueba (comentar)
