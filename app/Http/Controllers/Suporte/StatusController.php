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

    public static function timeline($status){
        switch ($status->status_adocao) {
            case 0:
                $icon = '<i class="fa fa-plus-square bg-aqua"></i>';
                $titulo = 'Recebido';
                $messagem = 'Recebemos sua requisição.';
                break;
            
            case 1:
            $icon = '<i class="fa fa-eye bg-blue"></i>';
            $titulo = 'Visualizado';
            $messagem = 'Seu requerimento foi visualizado.';
                break;
            
            case 2:
            $icon = '<i class="fa fa-search bg-yellow"></i>';
            $titulo = 'Avaliando';
            $messagem = 'Seu requerimento está em avaliação.';
                break;

            case 3:
            $icon = '<i class="fa fa-check bg-green"></i>';
            $titulo = 'Aprovado';
            $messagem = 'Seu requerimento foi aprovado.';
                break;

            case 4:
            $icon = '<i class="fa fa-thumbs-down bg-maroon"></i>';
            $titulo = 'Recusado';
            $messagem = 'Seu requerimento foi recusado.</br>';
                break;

            case 5:
            $icon = '<i class="fa fa-close bg-red"></i>';
            $titulo = 'Cancelado';
            $messagem = 'Seu requerimento foi cancelado, porque o animal foi adotado.';
                break;
        }

        return '
        <ul class="timeline">

            <!-- timeline time label -->
            <li class="time-label">
                <span class="bg-red">
                    '.$status->created_at.'
                </span>
            </li>
            <!-- /.timeline-label -->
        
            <!-- timeline item -->
            <li>
                <!-- timeline icon -->
                '.$icon.'
                <div class="timeline-item">
        
                    <h3 class="timeline-header"><a href="#">'.$titulo.'</a></h3>
        
                    <div class="timeline-body">
                        '.$messagem.'
                    </div>
        
                </div>
            </li>
            <!-- END timeline item -->
        </ul>';
    }
}
