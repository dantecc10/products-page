<?php
$txt = "Hola, mi nombre es FLAG, y vivo en FLAG. Tengo FLAG años y estudio en FLAG.";
$datos = ["Dante", "Puebla", 18, "BUAP"];
$indexes = [3, 2, 1, 0];
$flag = "FLAG";
function flag_replacer($text, $flag, $data_array, $indexes_array)
{
    $chars = strlen($flag);
    $n = substr_count($text, $flag);
    if ($n == sizeof($indexes_array)) {
        // Las apariciones de la flag en la cadena son las mismas que la longitud del arreglo de índices
        for ($i = 0; $i < $n; $i++) {
            $position = strpos($text, $flag);
            $text = substr_replace($text, $data_array[$indexes_array[$i]], $position, $chars);
        }
        return $text;
    } else {
        return null;
    }
}

echo (flag_replacer($txt, $flag, $datos, $indexes));
