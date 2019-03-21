<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class _404Controller extends Controller
{
    public function index()
    { 
        return view('site.404.index');
    }
}
