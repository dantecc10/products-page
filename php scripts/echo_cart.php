<?php
session_start();

// Obtener los artículos de la sesión
$Articles = $_SESSION['Articles'];

// Verificar si existen artículos en la sesión
if (!empty($Articles)) {
    // Recorrer el arreglo de artículos y mostrar los datos
    foreach ($Articles as $article) {
        echo "ID: " . $article['id'] . "<br>";
        echo "Nombre: " . $article['name'] . "<br>";
        echo "Descripción: " . $article['description'] . "<br>";
        echo "Categoría: " . $article['category'] . "<br>";
        echo "Precio: " . $article['price'] . "<br>";
        echo "Imagen: " . $article['img'] . "<br>";
        echo "Cantidad: " . $article['quantity'] . "<br>";
        echo "Stock: " . $article['stock'] . "<br><br>";
    }
} else {
    echo "No hay artículos en el carrito.";
}
?>
