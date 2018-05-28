<?php
include_once 'vendor/autoload.php';
use wangshixiang\alioss_uploader\lib\Main;
$main = new Main([
    'accessKeyId' => '',
    'accessKeySecret' => '',
    'endpoint' => 'oss-cn-shenzhen.aliyuncs.com',
    'bucket' => '',
    'oss_basepath' => '',//'','app/'
    'ignore' => [
        '.git',
        '.idea',
        'bower_components',
        '.gitignore',
        'bower.json',
    ],
    'source' => 'C:\Users\Administrator\Desktop\wuliu',
    'uploadList' => [
        'test.txt'
    ]//empty for all file
]);
$main->run();
