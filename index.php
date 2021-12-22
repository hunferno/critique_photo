<?php
session_start();

use App\Controllers\AppController;
use App\Controllers\UserController;
use App\Controllers\PhotoController;

//FAIRE L'AUTOLOAD REGISTER
spl_autoload_register(function ($link) {
    require_once $link . '.php';
});

$_SESSION['connected'] = false;

$entity = filter_input(INPUT_GET, 'entity', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS) ?? 'home';

switch ($entity) {
    case 'user':
        $ctrl = new UserController();
        break;

    case 'photo':
        $ctrl = new PhotoController();
        break;

    default:
        $ctrl = new AppController();
        break;
}

$ctrl->$action();
