<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{

    protected $users;

    public function __construct(UserService $user)
    {
        $this->users = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->users->all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        try {
            $this->users->store($request);
            return redirect(route('admin.user.index'))->with('success', 'Usuário cadastrado com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Não foi possível cadastrar o usuário.'. $th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->users->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        try {
            $this->users->update($request, $id);
            return redirect(route('admin.user.index'))->with('success', 'Usuário editado com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Não foi possível editar o usuário.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->users->delete($id);
            return redirect(route('admin.user.index'))->with('success', 'Usuário deletado com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Não foi possível deletar o usuário.');
        }
    }
}
