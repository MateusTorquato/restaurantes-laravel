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
  public function show($id, Request $request){
    $user = User::findOrFail($id);
    
    // $headers = $request->headers->all();
    // $nome = $request->query('nome');
    // return response('Hello world', 200)
    //        ->header('Content-Type', 'application/json');
    // return response('Hello world', 200)
    //        ->withHeaders(['Content-Type' => 'text/plain']);
    
    return $user;
  }
}
