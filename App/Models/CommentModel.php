<?php

namespace App\Models;

use App\DataBase\Dao;
use App\Entities\Comment;

class CommentModel
{
    public function newComment()
    {
        $idUser = filter_input(INPUT_POST, 'idUser', FILTER_SANITIZE_NUMBER_INT);
        $idPhoto = filter_input(INPUT_POST, 'idPhoto', FILTER_SANITIZE_NUMBER_INT);
        $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS);

        $commentaire = new Comment($comment, $idUser, $idPhoto);
        $dao = new Dao();
        $dao->insertComment($commentaire);
    }

    public function getAllCommentById($id)
    {
        $dao = new Dao();
        $comments = $dao->selectAllCommentById($id);
        return $comments;
    }
}
