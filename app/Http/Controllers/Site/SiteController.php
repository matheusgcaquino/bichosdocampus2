<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home_imagem;
use App\Models\Sobre;

class SiteController extends Controller
{
    public function index()
    {
      $imagem = Home_imagem::where('posicao', '>', 0)->get();
      $sobre = Sobre::first();
      return view('site.home.index',[
        'imagem'  =>  $imagem,
        'sobre'   =>  $sobre
      ]);
    }
}
