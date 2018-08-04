<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Restaurante;

class RestauranteController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('admin.restaurantes.create');
    }

    public function store(Request $request)
    {
        $restauranteDados = $request->all();
        $restaurante = new Restaurante();
        $restaurante->create($restauranteDados);

        print 'Restaurante criado com sucesso';
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
