<?php

//AUTOLOADER
namespace App\Entities;

class Photo
{

    //LES PROPRIETES
    private int $id_photo;
    private string $title_photo;
    private string $name_file;
    private string $post_at;
    private string $id_user;

    //LE CONSTRUCTUER
    public function __construct(string $login, string $psw, string $pseudo)
    {
        $this->login = $login;
        $this->psw = $psw;
        $this->pseudo = $pseudo;
    }

    //LES GETTERS
    public function getId_photo()
    {
        return $this->id_photo;
    }

    public function getTitle_photo()
    {
        return $this->title_photo;
    }

    public function getName_file()
    {
        return $this->name_file;
    }

    public function getPost_at()
    {
        return $this->post_at;
    }

    public function getId_user()
    {
        return $this->id_user;
    }
}
