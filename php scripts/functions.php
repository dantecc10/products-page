<?php
function split_urls($urls)
{
    $img_urls = array();
    $img_urls = explode(", ", $urls);
    return $img_urls; // Usar como $data = split_urls($cadena_con_urls);
}

