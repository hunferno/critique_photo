<?php

namespace App\Controllers;

use App\Models\PhotoModel;
use App\Models\CommentModel;


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

    public function show()
    {
        $idPhoto = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        $modelPhoto = new PhotoModel();
        $modelComment = new CommentModel();
        $photo = $modelPhoto->getPhotoById($idPhoto);
        $comments = $modelComment->getAllCommentById($idPhoto);
        $param = ['photo' => $photo, 'comments' => $comments];

        $this->render('photo/show', $param);
    }

    public function comment()
    {
    }
}
