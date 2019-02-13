<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DeleteAnimalController extends Controller
{
    public function deletar(Request $request)
    {
        DB::table('bichosdocampus.animals')
            ->where('id_animal', '=', $request -> idAnimal)->delete();

        return redirect()-> route('site.animais');
    }
}
