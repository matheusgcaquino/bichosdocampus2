<?php

namespace App\Http\Controllers\Adoções\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Animal;

class AdoçõesController extends Controller{
    
    public function index(){
        $adocao = Animal::has('adocao')->with('adocao')->paginate(15);
            return view('adoções.admin.home.index')->with("results", $adocao);
    }
}
