<?php

namespace App\Controllers;

class AppController extends Controller
{

    //CREATION DES METHODES CORRESPONDANTENT AUX ACTIONS

    public function home()
    {
        $this->render('home');
    }
}
