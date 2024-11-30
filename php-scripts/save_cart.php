<?php
session_start();

// Recibir los datos JSON
$data = json_decode(file_get_contents('php://input'), true);

// Guardar los datos en la sesión
$_SESSION['Articles'] = $data;

// Enviar una respuesta (opcional)
http_response_code(200);
echo "Datos de artículos guardados en la sesión.";
?>
