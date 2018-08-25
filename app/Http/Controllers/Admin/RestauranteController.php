<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Restaurante;
use App\Http\Requests\RestauranteRequest;
use Illuminate\Support\Facades\Auth;

class RestauranteController extends Controller
{
    public function index()
    {
        // $restaurantes = Restaurante::where('owner_id', Auth::user()->id)->get();
        $restaurantes = Auth::user()->restaurantes;
        return view('admin.restaurantes.index', compact('restaurantes'));
    }

    public function create()
    {
        return view('admin.restaurantes.new');
    }

    public function store(RestauranteRequest $request)
    {
        $restauranteDados = $request->all();

        $request->validated();
        $user = Auth::user();
        $user->restaurantes()->create($restauranteDados);

        flash('Restaurante criado com sucesso')->success();
        return redirect()->route('restaurante.index');
    }

    public function edit(Restaurante $restaurante)
    {
        return view('admin.restaurantes.edit', compact('restaurante'));        
    }

    public function update(RestauranteRequest $request, $id)
    {
        $restauranteDados = $request->all();
        
        $request->validated();
        
        $restaurante = Restaurante::findOrFail($id);
        $restaurante->update($restauranteDados);

        flash('Restaurante atualizado com sucesso')->success();
        return redirect()->route('restaurante.index');
    }

    public function destroy($id)
    {
        $restaurante = Restaurante::findOrFail($id);
        $restaurante->delete();

        flash('Restaurante removido com sucesso')->success();
        return redirect()->route('restaurante.index');
    }
}
