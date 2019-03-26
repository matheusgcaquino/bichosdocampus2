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
                $stat = '<span class="label" style="background-color: #26FF00;">Novo</span>';
                break;
            
            case 1:
                $stat = '<span data-toggle="tooltip" title="Por: '.$last->user->name_user.'" 
                    class="label" style="background-color: #0400FF;">Visualizado</span>';
                break;
            
            case 2:
                $stat = '<span data-toggle="tooltip" title="'.$last->comentario.' - Por: '.
                    $last->user->name_user.'" class="label" style="background-color: #9f0bba;">
                    Avaliando</span>';
                break;

            case 3:
                $stat = '<span data-toggle="tooltip" title="'.$last->comentario.' - Por: '.
                    $last->user->name_user.'" class="label"style="background-color: #099b0b;">
                    Aprovado</span>';
                break;

            case 4:
                $stat = '<span data-toggle="tooltip" title="'.$last->comentario.' - Por: '.
                    $last->user->name_user.'" class="label" style="background-color: #FF0000;">
                    Recusado</span>';
                break;

            case 5:
                $stat = '<span data-toggle="tooltip" title="Animal já adotado" 
                    class="label" style="background-color: #FF00EB;">Cancelado</span>';
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
            if ($last->status_adocao < 3) {
                $status[$last->status_adocao]++;
            }
        }
        return $status;
    }

    public static function acao($status)
    {
        $last = $status->last();
        switch($last->status_adocao){
            case 0:
                $acao = '<span class="label" style="background-color: #26FF00;"">
                    Nenhuma ação possivel</span>';
                break;
            
            case 1:
                $acao = '<button type="button" class="btn btn-primary" data-toggle="modal" 
                    data-target="#modal" data-solict-acao="2" data-solict-nome="Avaliando">
                    Avaliando</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" 
                    data-target="#modal" data-solict-acao="4" data-solict-nome="Recusar">
                    Recusar</button>';
                break;
            
            case 2:
                $acao = '<button type="button" class="btn btn-success" data-toggle="modal" 
                    data-target="#modal" data-solict-acao="3" data-solict-nome="Aprovar">
                    Aprovar</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" 
                    data-target="#modal" data-solict-acao="4" data-solict-nome="Recusar">
                    Recusar</button>';
                break;

            case 3:
                $acao = '<span class="label" style="background-color: #26FF00;"">
                    Nenhuma ação possivel</span>';
                break;

            case 4:
                $acao = '<span class="label" style="background-color: #26FF00;"">
                    Nenhuma ação possivel</span>';
                break;

            case 5:
                $acao = '<span class="label" style="background-color: #26FF00;"">
                    Nenhuma ação possivel</span>';
                break;

            default:
                $acao = 'Error';
                break;
        }
        return $acao;
    }
}
