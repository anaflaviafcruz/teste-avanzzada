<?php

namespace App\Services;

use App\Models\User;
use App\Interfaces\PasswordUser;
use App\Interfaces\PermissionUser;

class UserService implements PasswordUser, PermissionUser
{

    public function all()
    {
        return User::all();
    }

    public function store($request)
    {
        $data = $this->gerasenha($request->all());
        $data = $this->permissions($data);

        return User::create($data);
    }

    public function update($request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->all();
        $data = $this->permissions($data);
        $user->update($data);

        return $user->update($data);
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        return $user->delete();
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return json_encode($user);
    }

    public function gerasenha($data)
    {
        $data['password'] = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password

        return $data;
    }

    public function getproduto($data)
    {
        if(isset($data['produto']))   return 1;
        else return 0;
    }

    public function getcategoria($data)
    {
        if(isset($data['categoria']))   return 1;
        else return 0;
    }

    public function getmarca($data)
    {
        if(isset($data['marca']))   return 1;
        else return 0;
    }

    public function permissions($data){
        $data['permission'] = $this->getproduto($data);
        $data['permission'] .= $this->getcategoria($data);
        $data['permission'] .= $this->getmarca($data);

        return $data;
    }
}