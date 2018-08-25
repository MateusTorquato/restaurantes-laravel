<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;
use App\Http\Requests\MenuRequest;
use App\Restaurante;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function index()
    {
        $restaurantes = Auth::user()->restaurantes()->select('id')->get()->toArray();
        $menus = Menu::whereIn('restaurante_id', $restaurantes)->get();
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        $restaurantes = Auth::user()->restaurantes;
        return view('admin.menus.new', compact('restaurantes'));
    }

    public function store(MenuRequest $request)
    {
        $menuDados = $request->all();
        $request->validated();
        
        $restaurante = Restaurante::find($menuDados['restaurante_id']);
        $restaurante->menus()->create($menuDados);

        flash('Menu criado com sucesso')->success();
        return redirect()->route('menu.index');
    }

    public function edit(Menu $menu)
    {
        $restaurantes = Restaurante::all(['id', 'nome']);
        $restaurantes = Auth::user()->restaurantes;

        return view('admin.menus.edit', compact('menu', 'restaurantes'));        
    }

    public function update(MenuRequest $request, $id)
    {
        $menuDados = $request->all();
        
        $request->validated();
        
        $menu = Menu::findOrFail($id);
        $menu->restaurante()->associate($menuDados['restaurante_id']);
        $menu->update($menuDados);

        flash('Menu atualizado com sucesso')->success();
        return redirect()->route('menu.index');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        flash('Menu removido com sucesso')->success();
        return redirect()->route('menu.index');
    }
}
