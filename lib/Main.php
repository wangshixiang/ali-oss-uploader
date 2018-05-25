<?php
namespace lib;
class Main{
    function run(){
        echo "\r\n------------start-------------\r\n";
        $this->dir('');
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
                $this->upload_one($path.'/'.$item);
                continue;
            }
        }
    }
}