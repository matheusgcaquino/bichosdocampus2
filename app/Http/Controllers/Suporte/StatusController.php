<?php

namespace App\Http\Controllers\Suporte;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatusController extends Controller
{
    public static function last_status($status)
    {
        $last = $status->last();
        switch($last->status_adocao){
            case 0:
                $stat = '<span class="bg-green">Novo</span>';
                break;
            
            case 1:
                $stat = '
                <a data-toggle="tooltip" title="Por: '.$last->user->name_user.'">
                    <span class="bg-blue">Visualizado</span>
                </a>';
                break;
            
            case 2:
                $stat = '
                <a data-toggle="tooltip" title="'.$last->comentario.' - Por: '.
                    $last->user->name_user.'">
                    <span class="bg-red">Avaliando</span>
                </a>';
                break;

            case 3:
                $stat = '
                <a data-toggle="tooltip" title="'.$last->comentario.' - Por: '.
                    $last->user->name_user.'">
                    <span class="bg-blue">Aprovado</span>
                </a>';
                break;

            case 4:
                $stat = '
                <a data-toggle="tooltip" title="'.$last->comentario.' - Por: '.
                    $last->user->name_user.'">
                    <span class="bg-blue">Recusado</span>
                </a>';
                break;

            case 5:
                $stat = '
                <a data-toggle="tooltip" title="Animal já adotado">
                    <span class="bg-blue">Cancelado</span>
                </a>';
                break;

            default:
                $stat = 'Error';
                break;
        }

        return $stat;
    }

    public static function status_num($adocoes)
    {
        $status = [0, 0, 0];
        foreach ($adocoes as $adocao) {
            $last = $adocao->status->last();
            $status[$last->status_adocao]++;
        }
        return $status;
    }
}
