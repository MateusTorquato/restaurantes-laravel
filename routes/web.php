<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test/show', function () {
    // $sql = 'SELECT * FROM USERS WHERE ID = ?';
    // $users = DB::select($sql, [4]);

    // $users = DB::table('users')
    //              ->where('id', '=', 4)
    //              ->select('id', 'name')
    //              ->first();
    //              // ->toSql();
    //              // ->get();

    // $users = \App\User::all();
    $users = \App\User::where('id', 4)->get();

    dd($users);
});

Route::get('/test/save', function () {
  // $user = new \App\User();
  // $user = \App\User::find(10);
  //
  // $user->name = 'Mateus';
  // $user->email = 'teste@teste.com';
  // $user->password = bcrypt('teste');
  // $user->save();
  $userData = [
    'name' => 'Mateus',
    'email' => 'testee',
    'password' =>  bcrypt('teste')
  ];
   $user = new \App\User();
   $user->create($userData);
   // $user->update($userData);

});

Route::get('/test/delete', function () {
  // $user = \App\User::find(10);
  // $user->delete();
  $user = \App\User::whereIn('id', [2,3,4]);
  $user->delete();

});

Route::get('hello/{name}', function($name){
  // return view('hello',['name' => $name] );
  return view('hello', compact($name) );
});
