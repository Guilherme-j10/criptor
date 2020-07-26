<?php

    namespace src\app\core; 

    class coreController 
    {
        protected $view_spacename = 'src/app/view/';

        public function view(String $view, String $title, Array $data = []): void
        {
            require_once $this->view_spacename.$view.'.php';
        } 
    }