<?php
include "credentials.php";
$data = generatePasskey('sql');
$connection = new mysqli("localhost", $data[0], $data[1], $data[2]);
if ($connection->connect_error) {
    die("
    Connection failed: " . $connection->connect_error);
} else {
    echo("Conexión establecida.");
}
