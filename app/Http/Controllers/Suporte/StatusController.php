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
                $stat = 'Novo';
                break;
            
            case 1:
                $stat = 'Visualizado';
                break;

            default:
                $stat = 'Error';
                break;
        }

        return $stat;
    }
}
