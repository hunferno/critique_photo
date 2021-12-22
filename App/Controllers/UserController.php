<?php

namespace App\Controllers;

class UserController extends Controller
{

    //CREATION DES METHODES CORRESPONDANTENT AUX ACTIONS

    public function connect()
    {
        $param = ['error' => '', 'email' => ''];
        $this->render('user/form_connect', $param);
    }

    public function check()
    {
    }

    public function disconnect()
    {
    }

    public function create()
    {
        $param = ['error' => ''];
        $this->render('user/form_create', $param);
    }

    public function new()
    {
    }
}
