<?php
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

    // Datos de ejemplo
    $txt = "Hola, mi nombre es FLAG, y vivo en FLAG. Tengo FLAG años y estudio en FLAG.";
    $datos = ["Dante", "Puebla", 18, "BUAP"];
    $indexes = [0, 1, 2, 3];
    $flag = "FLAG";
    
    echo (flag_replacer($txt, $flag, $datos, $indexes));

    //Salida: "Hola, mi nombre es Dante, y vivo en Puebla. Tengo 18 años y estudio en BUAP."
?>