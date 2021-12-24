<?php

//AUTOLOADER
namespace App\Entities;

class Photo
{

    //LES PROPRIETES
    private ?int $id_photo;
    private string $title_photo;
    private string $name_file;
    private string $post_at;
    private string $id_user;
    private string $pseudo;

    //LE CONSTRUCTUER
    public function __construct(string $title = '', string $name = '', int $id_user = 0)
    {
        $this->id_photo = null;
        $this->title_photo = $title;
        $this->name_file = $name;
        $this->post_at = ""; //LA DAO VA L'IMPLEMENTER
        $this->id_user = $id_user;
        $this->pseudo = '';
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

    public function getPseudo()
    {
        return $this->pseudo;
    }
}
