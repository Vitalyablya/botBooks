<?php
error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if(!defined("PROXY")) define("PROXY", 'localhost:9050'); else  die("Константа PROXY занята");

if(!defined("HOSTSCRAPING")) define("HOSTSCRAPING", 'http://flibustahezeous3.onion'); else  die("Константа HOSTSCRAPING занята");

require 'vendor/autoload.php';

echo "<pre>";
?>