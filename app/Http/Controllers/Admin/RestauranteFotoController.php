<?php

namespace App\Http\Controllers\Admin;

use App\RestauranteFoto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Restaurante;

class RestauranteFotoController extends Controller
{
    public function save(Request $request, $id)
    {
		foreach($request->file('fotos') as $foto) {
			$newName =  sha1($foto->getClientOriginalName()) . uniqid() . '.' . $foto->getClientOriginalExtension();
			$foto->move(public_path('images'), $newName);
 			$restaurante = Restaurante::find($id);
			$restaurante->fotos()->create([
				'foto' => $newName
			]);
 			flash()->success('Upload de Fotos Realizado com Sucesso!');
			return redirect()->route('restaurante.foto', ['id' => $id]);
		}
    }

    public function index($id)
    {
         return view('admin.restaurantes.fotos.index', compact('id'));
    }
}
