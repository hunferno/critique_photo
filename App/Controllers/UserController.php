<?php

namespace App\Controllers;

use App\Models\UserModel;
use Exception;

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
        try {

            $model = new UserModel();
            $model->verifyUser();
            $_SESSION['connected'] = true;
            header('Location:index.php');
            exit();
        } catch (Exception $err) {

            $param = ['error' => $err->getMessage(), 'email' => ''];
            $this->render('user/form_connect', $param);
        }
    }

    public function disconnect()
    {
        $_SESSION = [];
        session_destroy();
        $_SESSION['connected'] = false;
        header('Location:index.php');
        exit();
    }

    public function create()
    {
        $param = ['error' => ''];
        $this->render('user/form_create', $param);
    }

    public function new()
    {
        $model = new UserModel();
        $model->newUser();
        $this->render('home');
    }
}
