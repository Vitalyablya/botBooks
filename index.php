<?php
//http://127.0.0.1/workplace/botBooks/
require_once "config.php";
require_once "telegram.php";
require_once "parseBok.php";

$list = 3;
$countBox = 5;
$listboks = getBooksUponReq("Гарри Поттер");
$listboks_slice = array_slice($listboks, $list * $countBox, $countBox);
$textMsg = "Выведено $countBox из " . count($listboks) . " (" . ($list * $countBox) . "-" . ($list * $countBox + $countBox) . ")\n";
foreach($listboks_slice as $key => $val){ $textMsg .=$key + 1 .". ". trim($val[0]) . "\n\n"; 
}
sendMsg($textMsg);

