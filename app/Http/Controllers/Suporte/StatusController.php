<?php

namespace App\Http\Controllers\Suporte;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatusController extends Controller
{
    public static function last_status($status)
    {
        switch($status->last()->status_adocao){
            case 0:
                $stat = '<span class="bg-green">Novo</span>';
                break;
            
            case 1:
                $stat = '<span class="bg-blue">Visualizado</span>';
                break;
            
            case 2:
                $stat = '<span class="bg-red">Avaliando</span>';

            default:
                $stat = 'Error';
                break;
        }

        return $stat;
    }
}
