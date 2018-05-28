<?php
namespace wangshixiang\alioss_uploader\lib;

class Main{
    function __construct($config)
    {
        Config::$accessKeyId = $config['accessKeyId'];
        Config::$accessKeySecret = $config['accessKeySecret'];
        Config::$endpoint = $config['endpoint'];
        Config::$bucket = $config['bucket'];
        Config::$oss_basepath = $config['oss_basepath'];//e.g.'','app/';
        Config::$ignore = $config['ignore'];//array
        Config::$source = $config['source'];//root path to source
        Config::$uploadList = $config['uploadList'];//white list,upload list item only
        define('SOURCE_PATH',Config::$source);
    }

    function run(){
        echo "\r\n------------start-------------\r\n";
        if(empty(Config::$uploadList)){
            $this->dir('');
        } else {
            foreach (Config::$uploadList as $item){
                $this->upload_one($item);
            }
        }
        echo "\r\n------------end----------------\r\n";
    }
    function upload_one($path){
        $client = new Oss();
        $client->uploadFile($path);
    }
    function dir($path){
        $list = scandir(SOURCE_PATH.$path);
        foreach($list as $item){
            if($item==='.'||$item==='..'){
                continue;
            }
            if(in_array($item,Config::$ignore)){
                continue;
            }
            if(is_dir(SOURCE_PATH.'/'.$path.'/'.$item)){
                $this->dir($path.'/'.$item);
                continue;
            }
            if(is_file(SOURCE_PATH.'/'.$path.'/'.$item)){
                $this->upload_one(substr($path.'/'.$item,1));
                continue;
            }
        }
    }
}