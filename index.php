<?php
include_once 'vendor/autoload.php';
define('ROOT_PATH',__DIR__);
define('SOURCE_PATH',\lib\Config::$source);
$main = new \lib\Main();
$main->run();
