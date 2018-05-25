<?php
namespace lib;
class Config{
    static $accessKeyId = 'your id';
    static $accessKeySecret = 'your secret';
    static $endpoint = 'your endpoint';
    static $bucket = 'your bucket name';
    static $oss_basepath = '';//'','app/'
    static $ignore = [
        '.git',
        '.idea',
        'bower_components',
        '.gitignore',
        'bower.json',
        'other file or path'
    ];
    static $source = 'C:\Users\Administrator\Desktop\your_path';
    static $uploadList = [
    ];//empty for all file
}