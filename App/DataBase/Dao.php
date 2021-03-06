<?php

namespace App\DataBase;

use PDO;
use Exception;
use App\Entities\User;
use App\Entities\Photo;
use App\Entities\Comment;

class Dao
{
    private PDO $dbConnect;

    public function __construct()
    {
        $this->dbConnect = new PDO('mysql:host=localhost;dbname=critique_photo;charset=utf8', 'root', '');
    }

    public function insertUser(User $user)
    {

        $sql = 'INSERT INTO user VALUE (null, :login, :psw, :pseudo)';
        $userStat = $this->dbConnect->prepare($sql);

        $param = [
            ':login' => $user->getLogin(),
            ':psw' => $user->getPsw(),
            ':pseudo' => $user->getPseudo()
        ];

        $userStat->execute($param);
    }

    public function selectUserByLogin($login): User
    {
        $sql = 'SELECT * FROM user WHERE login = :login';
        $userStat = $this->dbConnect->prepare($sql);

        $userStat->setFetchMode(PDO::FETCH_PROPS_LATE | PDO::FETCH_CLASS, 'App\Entities\User');
        $userStat->bindParam(':login', $login);
        $userStat->execute();
        $user = $userStat->fetch();

        if ($user) {
            return $user;
        } else {
            throw new Exception('Login incorrect');
        }
    }

    public function insertPhoto(Photo $photo)
    {

        $sql = 'INSERT INTO photo VALUE (null, :title, :name, CURDATE(),:id_user)';
        $photoStat = $this->dbConnect->prepare($sql);

        $param = [
            ':title' => $photo->getTitle_photo(),
            ':name' => $photo->getName_file(),
            ':id_user' => $photo->getId_user()
        ];

        $photoStat->execute($param);
    }

    public function selectAllPhoto()
    {
        $sql = 'SELECT * FROM photo NATURAL JOIN user';
        $photoStat = $this->dbConnect->prepare($sql);
        $photoStat->setFetchMode(PDO::FETCH_PROPS_LATE | PDO::FETCH_CLASS, 'App\Entities\Photo');
        $photoStat->execute();

        $photos = $photoStat->fetchAll();
        return $photos;
    }

    public function selectPhoto($id)
    {
        $sql = "SELECT * FROM photo NATURAL JOIN user WHERE id_photo = :id";
        $photoStat = $this->dbConnect->prepare($sql);
        $photoStat->bindParam(':id', $id);
        $photoStat->setFetchMode(PDO::FETCH_PROPS_LATE | PDO::FETCH_CLASS, 'App\Entities\Photo');
        $photoStat->execute();

        $photo = $photoStat->fetch();
        return $photo;
    }

    public function insertComment(Comment $comment)
    {

        $sql = 'INSERT INTO comment VALUE (null, :comment, CURDATE(), :id_user, :id_photo)';
        $commentStat = $this->dbConnect->prepare($sql);

        $param = [
            ':comment' => $comment->getComment(),
            ':id_photo' => $comment->getId_photo(),
            ':id_user' => $comment->getId_user()
        ];

        $commentStat->execute($param);
    }

    public function selectAllCommentById($id)
    {
        // $sql = 'SELECT * FROM comment NATURAL JOIN user NATURAL JOIN photo WHERE id_photo = :id';
        $sql = 'SELECT * FROM comment NATURAL JOIN user WHERE id_photo = :id';
        $commentsStat = $this->dbConnect->prepare($sql);
        $commentsStat->bindParam(':id', $id);
        $commentsStat->setFetchMode(PDO::FETCH_PROPS_LATE | PDO::FETCH_CLASS, 'App\Entities\Comment');
        $commentsStat->execute();

        $comments = $commentsStat->fetchAll();
        return $comments;
    }
}
