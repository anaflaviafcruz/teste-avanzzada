<?php

namespace App\Interfaces;

interface PasswordUser
{
    /**
     * gera senha de usuario para salvar no banco
     *
     * @param  string|array  $data
     * @return void
     */

    public function gerasenha($data);
}