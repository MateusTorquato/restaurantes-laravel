<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Restaurante;

class RestauranteController extends Controller
{
    public function index()
    {
        $restaurantes = Restaurante::all();
        return view('admin.restaurantes.index', compact('restaurantes'));
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

    public function edit(Restaurante $restaurante)
    {
        return view('admin.restaurantes.edit', compact('restaurante'));        
    }

    public function update(Request $request, $id)
    {
        $restauranteDados = $request->all();
        $restaurante = Restaurante::findOrFail($id);
        $restaurante->update($restauranteDados);

        print 'Restaurante atualizado com sucesso';
    }

    public function destroy($id)
    {
        $restaurante = Restaurante::findOrFail($id);
        $restaurante->delete();

        print 'Restaurante removido com sucesso';
    }
}
