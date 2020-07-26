<?php

    $production_mode = true;

    if($production_mode){
        define('SITE_NAME', 'http://'.$_SERVER['HTTP_HOST'].'/');
    }else{
        define('SITE_NAME', 'http://'.$_SERVER['HTTP_HOST'].'/criptografia/');
    }
