<?php
namespace lib;
use OSS\OssClient;

class Oss{
    static $client = null;
    function getClient(){
        if(!self::$client){
            self::$client = new OssClient(Config::$accessKeyId,Config::$accessKeySecret,Config::$endpoint);
        }
        return self::$client;
    }
    function uploadFile($path)
    {
        $ossClient = $this->getClient();
        $object = Config::$oss_basepath.$path;
        echo "\r\n uploading ".$object;
        $filePath = SOURCE_PATH.'/'.$path;
        echo " from ".$filePath."\r\n";
        try{
            $ossClient->uploadFile(Config::$bucket, $object, $filePath);
        } catch(OssException $e) {
            printf(__FUNCTION__ . ": FAILED\n");
            printf($e->getMessage() . "\n");
            return;
        }
        print(__FUNCTION__ . ": OK" . "\n");
    }
    
}