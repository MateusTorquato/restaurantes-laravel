<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;
use App\Http\Requests\MenuRequest;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        return view('admin.menus.new');
    }

    public function store(MenuRequest $request)
    {
        $menuDados = $request->all();
        $request->validated();
        
        $menu = new Menu();
        $menu->create($menuDados);
        flash('Menu criado com sucesso')->success();
        return redirect()->route('menu.index');
    }

    public function edit(Menu $menu)
    {
        return view('admin.menus.edit', compact('menu'));        
    }

    public function update(MenuRequest $request, $id)
    {
        $menuDados = $request->all();
        
        $request->validated();
        
        $menu = Menu::findOrFail($id);
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
