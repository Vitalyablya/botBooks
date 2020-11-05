<?php 
require_once "torCurl.php";
// в идеале возвращает список книг где [название книги - автор, ссылка на книгу]; если ничего не найдено возвращает false
// $namebook - имя книги; 
function getBooksUponReq($namebook){
    $page = 0;
    $res = [];

    do{
        $url = HOSTSCRAPING . "/booksearch?page=$page&ask=" . urlencode($namebook) . "&chb=on";
        $html = getCurl($url);
        if(!$html) break;
        
        $doc = new DiDom\Document($html);
        $doc = $doc -> find('#main.clear-block ul');

        if(isset($doc[1])) $doc = new DiDom\Document($doc[1] -> html());
        else if(isset($doc[0])) $doc = new DiDom\Document($doc[0] -> html());
        else break;

        $arr = $doc -> find("li"); 
        foreach($arr as $val){
            $res[] = [$val -> text(), $val -> children()[1] -> getAttribute('href')];
        }

        if(count($arr) < 50) break;
        $page++;

    }while(true);

    return !empty($res) ? $res : false;
}
