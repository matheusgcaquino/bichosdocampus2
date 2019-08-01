<?php

namespace App\Http\Controllers\Divulgações\Parceiro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DivulgarController extends Controller
{
    public function index()
    {
        return view('divulgações.parceiro.index');
    }
}
