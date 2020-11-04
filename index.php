<?php
//http://127.0.0.1/workplace/botBooks/
require_once "config.php";
require_once "telegram.php";
require_once "parseBok.php";

$listboks = getBooksUponReq("Гарри Поттер");
$textMsg = $listboks[0]."\n";
foreach($listboks[1] as $key => $val){ $textMsg .=$key + 1 .". ". trim($val[0]) . "\n"; 
}
sendMsg($textMsg);

