<?php
session_start();

// Recibir el JSON enviado desde JavaScript
$json = file_get_contents('php://input');

if ($json !== false) {
    // Si se recibe algo, decodificar el JSON a un array asociativo
    $json_cart = json_decode($json, true);

    // Asignar el JSON decodificado a la sesión
    $_SESSION['cart'] = $json_cart;

    // Enviar confirmación al cliente
    echo "true";
} else {
    // Si no se recibe nada, mostrar mensaje de error
    echo "No se recibe nada";

    // Mostrar el contenido actual de la sesión (para depuración)
    echo json_encode($_SESSION['cart']);
}
