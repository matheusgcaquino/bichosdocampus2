<?php

namespace App\Http\Controllers\Adoções\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Adocao;

class AdoçõesController extends Controller{
    
    public function index(){
        $adocao = Adocao::with(['animal' => function($query) {
            $query->addSelect('nome_animal');
        }])->paginate(15);
            return view('adoções.admin.home.index', ["results"   =>  $adocao]);
    }
}
