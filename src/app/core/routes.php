<?php

    use elevenstack\expressphp\Express as express;

    $app = new express();

    $app->type_aplication('web');
    $app->namespace('src/app/controller/');

    $app->get('/', 'homeController:index');
    $app->post('/recived_data', 'homeController:dados');

    $app->error($app->getRoute_request(), function($res){
        $res['send']('página não encontrada');
    });