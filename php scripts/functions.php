<?php
function split_urls($urls)
{
    $img_urls = array();
    $img_urls = explode(", ", $urls);
    return $img_urls; // Usar como $data = split_urls($cadena_con_urls); (Validar con length)
}
function splitter($urls, $divisor)
{
    $strins_array = array();
    $strins_array = explode($divisor, $urls);
    return $strins_array; // Usar como $data = split_urls($cadena_con_urls); (Validar con length)
}
/* Validación de array
if (is_array(split_urls($urls))) {
    $img = (split_urls($urls))[0];
} else {
    $img = split_urls($urls);
}
*/
function build_table_dom($table, $data, $fields)
{
    switch ($table) {
        case 'juguetes':
            break;

        default:
            # code...
            break;
    }
}

function build_detail_carousel($imgs)
{
    $n = sizeof($imgs);

    $carousel_elements = "";
    $carousel_indexes = "";

    for ($i = 0; $i < $n; $i++) {
        $element = '<div class="carousel-item">';
        $index = '<li data-bs-target="#carousel-1" data-bs-slide-to="';
        
        if ($i == 0) {
            // Añadir clases active al primer elemento e índice
            $element = str_replace('">', 'active">', $element);
            $index = str_replace('<li ', '<li class="active" ', $index);
        } else {
        }

        $element .= ($i+1);
        $index .= $i;


        $element .= '"</div>';
        $index .= '"></li>';
    }
}
