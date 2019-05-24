<?php

$file = $_GET['file'];
$auth_key = $_GET['auth'];

if(!empty($file)){
    $filename = basename($file);
    $filepath = 'img/'. $filename;
    
    if(!empty($filename) && file_exists($filepath)){
        if ($auth_key === sha1('encrypt') ){
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
        
        readfile($filepath);
        exit;
        }else{
            echo 'You are not authroized to download this file';
            print_r($_SESSION);
          
        }
    }else{
        echo 'This file is not found';
    }
}