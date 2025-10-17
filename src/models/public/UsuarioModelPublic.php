<?php

namespace App\Atlas\models\public;

use App\Atlas\models\private\UsuarioModelPrivate;

class UsuarioModelPublic 
{
    private $UsuarioModelPrivate;

    public function __construct()
    {
        $this->UsuarioModelPrivate = new UsuarioModelPrivate();
    }

    public function getExisteUsuario($user)
    {
        return $this->UsuarioModelPrivate->existeUsuario($user);
    }
}