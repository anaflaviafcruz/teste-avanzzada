<?php

namespace App\Interfaces;

interface PermissionUser
{
    /**
     * Add permissaos ao usuario para salvar no banco
     *
     * @param  string|array  $data
     * @return void
     */

    public function getproduto($data);

    public function getcategoria($data);

    public function getmarca($data);
}