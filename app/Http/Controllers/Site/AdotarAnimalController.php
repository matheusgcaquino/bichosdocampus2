<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdotarAnimalController extends Controller{
    public function adotar(Request $request){ 
    // Teste
    dd($request -> all());    
  }
}
