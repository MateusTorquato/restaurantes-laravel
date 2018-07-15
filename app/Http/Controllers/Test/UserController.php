<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\User;

class UserController extends Controller
{
  public function index(){
    $users = User::all();
    return $users;
  }
  public function show($id){
    $user = User::findOrFail($id);
    return $user;
  }
}
