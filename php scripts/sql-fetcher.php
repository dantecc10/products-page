<?php
/*
$tabla = "juguetes";
$campos = array();
$campos = [
    "id_toy",
    "name_toy",
    "description_toy",
    "model_toy",
    "bars_toy",
    "line_toy",
    "brand_toy",
    "pieces_toy",
    "quantity_toy",
    "price_toy",
    "imgs_toy",
    "quant_imgs_toy",
];
*/

function fetch_fields($table, $fields)
{
    include "connection.php";
    $query = "SELECT * FROM `$table`";
    $result = mysqli_query($connection, $query) or die("Error en la consulta a la base de datos");
    $data = array();
    $n = sizeof($fields);
    // Comprobar si las filas son mayores que 0
    $result = $connection->query($query);
    // Verificar si se encontró un usuario válido
    if ($result->num_rows > 0) {
        // Hacer fetch a los datos
        $i = 0;
        while ($row = $result->fetch_array()) {
            // Procesar cada registro obtenido
            for ($j = 0; $j < $n; $j++) {
                // Procesar cada columna de cada registro 
                $data[$i][$j] = $row[$fields[$j]];
            }
            $i++;
        }
        return $data;
    } else {
        // No hay registros en la tabla, devolver null
        return null;
    }
}

#echo (fetch_fields($tabla, $campos))[0][4]; # Línea de prueba (comentar)