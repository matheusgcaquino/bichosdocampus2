<?php

namespace App\Http\Controllers\Divulgações\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DivulgaçõesController extends Controller
{
    public function index()
    {
        return view('divulgações.admin.index');
    }
}
