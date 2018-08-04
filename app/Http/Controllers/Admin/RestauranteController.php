<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        dd($request);
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
