<?php
function split_urls($urls)
{
    $img_urls = array();
    $img_urls = explode(", ", $urls);
    return $img_urls; // Usar como $data = split_urls($cadena_con_urls); (Validar con length)
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
