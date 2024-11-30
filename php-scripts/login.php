<?php
session_start();
session_destroy();
session_start();
include "connection.php";

if ($_POST['email'] == "demo_user@system.com") {
    $connection = new mysqli("localhost", "comercial_demo", $data[1], "comercial_demo");
}

$username = mysqli_real_escape_string($connection, $_POST['email']);
$password = mysqli_real_escape_string($connection, $_POST['password']); //Recepción de variables que pasan por filtro anti explits SQL

$sql = "SELECT * FROM `usuarios` WHERE ((`password_user` = '$password') AND (`status_user` = 1));"; //Consulta SQL para verificar si el usuario existe y está activo

echo $sql; # Mensaje de debug

$resultado = $connection->query($sql); //Ejecución de la consulta SQL

// Verificar si se encontró un usuario válido
if ($resultado->num_rows > 0) {
    // Acceso concedido, redireccionar a la página de inicio del sitio web
    if ($info = $resultado->fetch_object()) { //Asignación y configuración de variables de sesión en arreglo de PHP
        $_SESSION['loged_in'] = true;
        $_SESSION['id'] = $info->id_user;
        $_SESSION['name'] = $info->name_user;
        $_SESSION['lastNames'] = $info->last_names_user;
        $_SESSION['user'] = $info->username_user;
        $_SESSION['img'] = ($info->img_user);
        $_SESSION['email'] = $info->email_user;
    }
    $connection->close();

    if (isset($_POST['redirect'])) {
        header("Location: ../" . $_POST['redirect']);
    } else {
        header("Location: ../articles.php");
    }
} else {
    // Acceso denegado, mostrar un mensaje de error y redireccionar a la página de inicio de sesión
    //echo "Nombre de usuario o contraseña incorrectos"; # Mensaje de debug
    $connection->close();
    header("Location: ../login.php?error=true");
}
$connection->close();
