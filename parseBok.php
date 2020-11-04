<?php 
require_once "torCurl.php";

function getBooksUponReq($namebook){
    $page = 0;
    $res = [];
    do{
        $url = HOSTSCRAPING . "/booksearch?page=$page&ask=" . urlencode($namebook) . "&chb=on";
        $html = getCurl($url);
        $doc = new DiDom\Document($html);
        $doc = new DiDom\Document($doc -> find('#main.clear-block ul')[1] -> html());
        $arr = $doc -> find("li"); 
        foreach($arr as $val){
            $res[] = [$val -> text(), $val -> children()[1] -> getAttribute('href')];
        }
        if(count($arr) < 50) break;
        $page++;
    }while(true);
    return $res;
}