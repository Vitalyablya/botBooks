<?php 
require_once "torCurl.php";

function getBooksUponReq($namebook, $page = 0){
    $url = HOSTSCRAPING . '/booksearch?ask=' . urlencode($namebook) . "&chb=on";
    if($page > 0) $url .= "&page=" . $page;
    $html = getCurl($url);
    $doc = new DiDom\Document($html);
    $result = [];
    $result[] = $doc -> find('#main.clear-block h3')[0] -> text();
    $doc = new DiDom\Document($doc -> find('#main.clear-block ul')[1] -> html());

    $res = [];
    foreach($doc -> find("li") as $val){
        $res[] = [$val -> text(), $val -> children()[1] -> getAttribute('href')];
    }
    $result[] = $res;

    return $result;
}