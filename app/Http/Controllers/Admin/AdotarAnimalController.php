<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AnimalValidacaoFormRequest;

class AdotarAnimalController extends Controller
{
  // Adicionando no banco de dados -> [EikE]
  public function adotar(AnimalValidacaoFormRequest $request)
  { 
    // Teste
    dd($request -> all());    
  }
}
