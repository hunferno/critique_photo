<?php

namespace App\Entities;

class Comment
{

    private ?int $id_comment;
    private string $comment;
    private string $create_at;
    private int $id_user;
    private string $pseudo;
    private int $id_photo;

    public function __construct(string $comment = "", int $id_user = 0,  int $id_photo = 0)
    {
        $this->id_comment = null;
        $this->id_user = $id_user;
        $this->id_photo = $id_photo;
        $this->comment = $comment;
        $this->create_at = ''; //LA DAO VA L'IMPLEMENTER
        $this->pseudo = '';
    }

    public function getId_comment()
    {
        return $this->id_comment;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function getCreate_at()
    {
        return $this->create_at;
    }

    public function getId_user()
    {
        return $this->id_user;
    }

    public function getId_photo()
    {
        return $this->id_photo;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }
}
