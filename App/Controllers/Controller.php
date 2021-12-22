<?php

namespace App\Controllers;

abstract class Controller
{

    //CREATION DES METHODES CORRESPONDANTENT AUX ACTIONS

    protected function render($view, $param = [])
    {
        extract($param);
        $connected = $_SESSION['connected'];
        include 'App/Views/template.php';
    }
}
