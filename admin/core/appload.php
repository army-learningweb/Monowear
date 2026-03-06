<?php
defined('APPPATH') or exit('Không được quyền truy cập');

// require Config folder file ( Cấu hình )
require CONFIGPATH . DIRECTORY_SEPARATOR . 'config.php';
require CONFIGPATH . DIRECTORY_SEPARATOR . 'autoload.php';
require CONFIGPATH . DIRECTORY_SEPARATOR . 'database.php';
require CONFIGPATH . DIRECTORY_SEPARATOR . 'email.php';

// require Core folder file ( Lõi )
require COREPATH.DIRECTORY_SEPARATOR."base.php";

if(is_array($autoload)){
    foreach($autoload as $folder => $file){
        if(!empty($file)){
            foreach($file as $name){
                load($folder,$name);
            }
        }
    }
}

// connect database
db_connect($db);
 
require COREPATH.DIRECTORY_SEPARATOR."router.php";