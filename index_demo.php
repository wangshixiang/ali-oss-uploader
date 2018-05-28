<?php
include_once 'vendor/autoload.php';
use wangshixiang\alioss_uploader\lib\Main;
$main = new Main([
    'accessKeyId' => '',
    'accessKeySecret' => '',
    'endpoint' => '',
    'bucket' => '',
    'oss_basepath' => '',//'','app/' the base dir you want to upload to,empty for root path
    'ignore' => [
        '.git',
        '.idea',
        'bower_components',
        '.gitignore',
        'bower.json',
    ],// ignore path or file
    'source' => 'C:\Users\Administrator\Desktop\wuliu',
    'uploadList' => [
        'test.txt'
    ]//white list,upload list item only,empty for all file
]);
$main->run();
