<?php
session_start();
// Recibir el JSON enviado desde JavaScript
if (file_get_contents('php://input')) {
    $json = file_get_contents('php://input');
    //echo ("Se recibe algo");
    // Decodificar el JSON a un array o objeto PHP
    $json_cart = json_decode($json, true); // true para obtener un array asociativo
    // Puedes realizar acciones con los datos recibidos, por ejemplo, imprimirlos
    $_SESSION['cart'] = $json_cart;
    echo ("true");
    /* Líneas para entender propiedades
    echo ($json_cart['Products'][0]['category']);
    echo($_SESSION['cart']['Products'][0]['category']);
    */
} else {
    echo ("No se recibe nada");
    //$json_cart = json_encode();
    $n = sizeof($_SESSION['cart']['Products']);
    echo (json_encode($_SESSION['cart']));
    //for ($i=0; $i < $n; $i++) { 
    //    echo();
    //}
}
