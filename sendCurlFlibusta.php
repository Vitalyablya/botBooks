<?php 
function sendCurlFlibusta(string $url, string $encoding = "gzip"){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_ENCODING, $encoding);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    $curl_scraped_page = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);
    if ($error)
        return false;
    elseif ($curl_scraped_page)
        return $curl_scraped_page;
}
?>