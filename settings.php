<?php

    $production_mode = false;

    if($production_mode){
        define('SITE_NAME', 'http://'.$_SERVER['HTTP_HOST'].'/');
    }else{
        define('SITE_NAME', 'http://'.$_SERVER['HTTP_HOST'].'/criptografia/');
    }