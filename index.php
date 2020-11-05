<?php
// http://127.0.0.1/workplace/botBooks/ - локальный хост
// https://github.com/Imangazaliev/DiDOM/blob/master/README-RU.md - библиотека для парсинга 
// https://dashboard.heroku.com/apps/flibustabotvitalya - хостинг heroku
// https://tlgrm.ru/docs/bots/api#authorizing-your-bot - документация telegram api
require_once "config.php";
require_once "telegram.php";
require_once "parseBok.php";

// Функция возвращает текст, который нужно передать в sendMSG
// $nameBook - имя книги которую нужно найти, $list - страница списка, $countBox - кол-во книг в списке(по умолчанию 3)
function searcheBook(string $nameBook, int $list, int $countBox = 3) : string{ 
    $list--;
    if($list < 0) $list = 0;
    $listboks = getBooksUponReq($nameBook);
    if(!$listboks) return "Ничего не найдено";
    if($countBox > count($listboks)) $countBox = count($listboks);

    $listboks_slice = array_slice($listboks, $list * $countBox, $countBox);
    $textMsg = "Выведено $countBox из " . count($listboks) . " (" . ($list * $countBox) . "-" . ($list * $countBox + $countBox) . ")\n";
    foreach($listboks_slice as $key => $val){ $textMsg .= $key + 1 .". ". trim($val[0]) /*. "\n" . HOSTSCRAPING . $val[1]*/ . "\n\n"; 
    }
    return $textMsg;
}
$list = 10;
sendMsg(searcheBook("Гарри Поттер", $list));

print_r(getWebHookInfo());