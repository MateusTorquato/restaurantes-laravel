<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('id', Auth::user()->id)->get();;
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.new');
    }

    public function store(UserRequest $request)
    {
        $userDados = $request->all();

        $request->validated();
        $userDados['password'] = bcrypt($userDados['password']);
        
        $user = new User();
        $user->create($userDados);

        flash('Usuário criado com sucesso')->success();
        return redirect()->route('restaurante.index');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));        
    }

    public function update(UserRequest $request, $id)
    {
        $userDados = $request->all();
        $request->validated();
        if($userDados['password']){
            $userDados['password'] = bcrypt($userDados['password']);
        };
        $user = User::findOrFail($id);
        $user->update($userDados);

        flash('Usuário atualizado com sucesso')->success();
        return redirect()->route('restaurante.index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        flash('Usuário removido com sucesso')->success();
        return redirect()->route('restaurante.index');
    }
}
