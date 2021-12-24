<?php

namespace App\Controllers;

use App\Models\PhotoModel;


class PhotoController extends Controller
{

    //CREATION DES METHODES CORRESPONDANTENT AUX ACTIONS

    public function create()
    {
        $this->render('photo/form_create');
    }

    public function new()
    {
        $model = new PhotoModel();
        $model->newPhoto();
        $this->render('photo/form_create');
    }

    public function list()
    {
        $model = new PhotoModel();
        $photos = $model->listPhoto();

        $param = ['photos' => $photos];
        $this->render('photo/list', $param);
    }

    public function comment()
    {
    }
}
