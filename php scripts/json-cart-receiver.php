<?php
session_start();
// Recibir el JSON enviado desde JavaScript
if (file_get_contents('php://input')) {
    $json = file_get_contents('php://input');
    echo ("Se recibe algo");
    // Decodificar el JSON a un array o objeto PHP
    $json_cart = json_decode($json, true); // true para obtener un array asociativo
    // Puedes realizar acciones con los datos recibidos, por ejemplo, imprimirlos
    //print_r($json_cart); // Debug line
    $_SESSION['cart'] = $json_cart;
    echo true;
    echo ($json_cart['Products'][0]['category']);
    echo($_SESSION['cart']['Products'][0]['category']);
} else {
    echo ("No se recibe nada");
    //$json_cart = json_encode();
}
