<?php
function split_urls($urls)
{
    $img_urls = array();
    $img_urls = explode(", ", $urls);
    return $img_urls; // Usar como $data = split_urls($cadena_con_urls); (Validar con length)
}
function build_table_dom($table, $data, $fields){
    switch ($table) {
        case 'juguetes':
            break;
        
        default:
            # code...
            break;
    }
}


$capsules = array();
$capsules['a'] = ['', ''];
$capsules['b'] = ['', ''];
#$capsules[]=[,];