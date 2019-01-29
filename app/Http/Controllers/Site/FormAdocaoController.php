<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormAdocaoController extends Controller
{
    public function index(){
        return view('site.adocao.index');
      }
}
