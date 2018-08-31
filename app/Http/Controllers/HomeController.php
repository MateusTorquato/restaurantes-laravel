<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurante;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
        $restaurante = Restaurante::findOrFail($id);
        return view('single', compact('restaurante'));
    }

    public function index()
    {
        $restaurantes = Restaurante::paginate(10);
        return view('home', compact('restaurantes'));
    }
}
