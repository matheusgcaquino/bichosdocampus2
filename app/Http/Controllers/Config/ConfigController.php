<?php

namespace App\Http\Controllers\Config;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    public function index()
    {
        return view('config.home.index');
    }

    public function excluir(Request $request)
    {
        //
    }

    public function editar(Request $request)
    {
        //
    }
}
