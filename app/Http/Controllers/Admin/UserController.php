<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
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

        print 'User criado com sucesso';
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

        print 'User atualizado com sucesso';
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        print 'User removido com sucesso';
    }
}
