<?php

namespace App\Controllers;

use App\Models\PhotoModel;
use App\Models\CommentModel;

class CommentController extends Controller
{
    public function create()
    {
        $model = new CommentModel();
        $model->newComment();

        $model = new PhotoModel();
        $photos = $model->listPhoto();

        $param = ['photos' => $photos];
        $this->render('photo/list', $param);
    }
}
