<?php
    namespace Projet\controllers;

    class BaseController{
        protected function view($view, $data = []){
            extract($data);
            require_once "../App/views/$view.php";
        }
    }

?>