<?php
// Recibir el JSON enviado desde JavaScript
$json = file_get_contents('php://input');
if (file_get_contents('php://input')) {
    echo ("Se recibe algo");
} else {
    echo ("No se recibe nada");
}

// Decodificar el JSON a un array o objeto PHP
$json_cart = json_decode($json, true); // true para obtener un array asociativo

// Puedes realizar acciones con los datos recibidos, por ejemplo, imprimirlos
print_r($json_cart); // Debug line
//echo true;
