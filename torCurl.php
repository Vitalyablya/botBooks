<?php
// Возвращает гет запрос через тор сеть
// $url - url запроса $encoding -  кодирование $proxy - прокси
function torCurl(string $url, string $encoding = "gzip", string $proxy = PROXY){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_PROXY, $proxy);
    curl_setopt($ch, CURLOPT_PROXYTYPE, 7);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_ENCODING , $encoding);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_URL, $url);
    $curl_scraped_page = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);
    if ($error)
        return false;
    elseif ($curl_scraped_page)
        return $curl_scraped_page;
}

?>