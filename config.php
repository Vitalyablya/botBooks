<?php
error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if(!defined("PROXY")) define("PROXY", 'localhost:9050'); else  die("Константа PROXY занята");
if(!defined("HOSTSCRAPING")) define("HOSTSCRAPING", 'https://flibusta.appspot.com'); else  die("Константа HOSTSCRAPING занята");
if(!defined("TOKENBOT")) define("TOKENBOT", ''); else  die("Константа TOKENBOT занята");
if(!defined("USERID")) define("USERID", ); else  die("Константа USERID занята");

require 'vendor/autoload.php';

echo "<pre>";
?>

