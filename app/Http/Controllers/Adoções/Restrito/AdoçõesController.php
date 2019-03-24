<?php

namespace App\Http\Controllers\Adoções\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Animal;
use App\Models\Adocao;

class AdoçõesController extends Controller
{
    
    public function index()
    {
        $adocao = Animal::has('adocao')->with('adocao.status')
        ->paginate(16);
        return view('adoções.restrito.home.index')->with("results", $adocao);
    }
}
