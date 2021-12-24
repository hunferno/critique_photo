<?php

namespace App\Controllers;

use App\Models\CommentModel;

class CommentController extends Controller
{
    public function create()
    {
        $model = new CommentModel();
        $model->newComment();
        header('Location:index.php');
        exit();
    }
}
