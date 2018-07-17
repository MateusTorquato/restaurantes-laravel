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

// Testes

// Teste namespace
Route::namespace('Test')->group(function(){
  Route::get('/users/{id}', 'UserController@show'); // Test\UserController
});

// Teste view
 Route::view('/view', 'minhaView', ['name' => 'Mateus']); //vai chamar a view minhaView

//Teste prefix
Route::prefix('users')->name('users_')->group(function(){

  Route::get('/', function(){
    return 'users index';
  })->name('index'); //users_index

  Route::get('/1', function(){
    return 'users 1';
  })->name('single');//users_index

});

// Rota comum - sem namespace
Route::get('/users', 'Test\UserController@index');
Route::get('/users/{id}', 'Test\UserController@show');
// Cria as rotas padrões - php artisan make:controller <UserController> --resource
Route::resource('/users', 'Test\UserController');

// Testes com select
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

// Testes com insert/update
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

// Testes com delete
Route::get('/test/delete', function () {
  // $user = \App\User::find(10);
  // $user->delete();
  $user = \App\User::whereIn('id', [2,3,4]);
  $user->delete();

});

// Testes com rota dinamica
Route::get('hello/{name}', function($name){
  // return view('hello',['name' => $name] );
  return view('hello', compact($name) );
});

Route::get('show/{name?}', function($name = 'Mateus'){
  if (is_null($name))
    return 'teste';
  return $name;
});

// Middleware

// Route::get('/middleware', function () {
//     return 'teste';
// })->middleware('test');

Route::group(['middleware' => ['teste', 'auth']], function(){
  Route::get('middle', function(){ 
      return 'middle';
  });
  Route::get('middle/2', function(){ 
      return 'middle/2';
  });
});

Route::get('/middleware', function () {
  return 'teste';
})->middleware('auth', App\Http\Middleware\TestCheck::class); //Pode passar mais de um. Pode usar grupos também (ex, 'web')
