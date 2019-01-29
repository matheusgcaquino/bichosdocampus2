<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditAnimalController extends Controller
{
    public function index(){
        return view('admin.animais.editar.index');
    }
}
