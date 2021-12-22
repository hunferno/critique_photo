<?php

//AUTOLOADER
namespace App\Entities;

class User
{

    //LES PROPRIETES
    private int $id_user;
    private string $login;
    private string $psw;
    private string $pseudo;

    //LE CONSTRUCTUER
    public function __construct(string $login, string $psw, string $pseudo)
    {
        $this->login = $login;
        $this->psw = $psw;
        $this->pseudo = $pseudo;
    }

    //LES GETTERS
    public function getId_user()
    {
        return $this->id_user;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getPsw()
    {
        return $this->psw;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }
}
