<?php
//http://127.0.0.1/workplace/botBooks/
require_once "config.php";
require_once "telegram.php";
require_once "parseBok.php";

print_r(getBooksUponReq("Гарри Поттер"));

