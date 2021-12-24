<?php

namespace App\Models;

use App\DataBase\Dao;
use App\Entities\Photo;

class PhotoModel
{
    public function newPhoto()
    {
        $title = filter_input(INPUT_POST, 'photoName', FILTER_SANITIZE_SPECIAL_CHARS);
        $idUser = $_SESSION['idUser'];
        $fileName = $_FILES['fileName']['name'];
        $fileTmp = $_FILES['fileName']['tmp_name'];

        $photo = new Photo($title, $fileName, $idUser);
        $dao = new Dao();
        $dao->insertPhoto($photo);

        move_uploaded_file($fileTmp, 'App/Images/' . $fileName);
    }

    public function listPhoto()
    {

        $dao = new Dao();
        $listPhoto = $dao->selectAllPhoto();
        return $listPhoto;
    }

    public function getPhotoById($id)
    {
        $dao = new Dao();
        $getPhoto = $dao->selectPhoto($id);
        return $getPhoto;
    }
}
