<?php

    namespace src\app\controller;
    use src\app\core\coreController;
    use src\Cripto as cript;

    class homeController extends coreController
    {

        public function index($req, $res)
        {
            $this->view('home', 'home - cripto');
        }

        public function dados($req, $res)
        {
            $code = new cript('k10');

            echo $code->encript($_POST['campo_um']);
        }

    }