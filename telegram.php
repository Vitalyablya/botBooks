<?php 
function sendCurl(string $url, $body = ""){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_USERAGENT, 'flibustabot');
    curl_setopt($curl, CURLOPT_HEADER, false);
    $url = isset($body) ? $url . "?" . $body : $url;
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
    print_r($url);
    $out = json_decode(curl_exec($curl), true); 
    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    print_r($code);
    curl_close($curl);
    return $out;
}

function setWebHook($url){
    return sendCurl("https://api.telegram.org/bot" . TOKENBOT . "/setWebhook", "url=" . urlencode("".$url));
}

function getWebHookInfo(){
    return sendCurl("https://api.telegram.org/bot" . TOKENBOT . "/getWebhookInfo");
}

function sendMsg($msg){
    $body = implode("&", ['chat_id=' . USERID, 'text=' . $msg]);
    return sendCurl("https://api.telegram.org/bot" . TOKENBOT . "/sendMessage", $body);
}// sendMessage

?>


