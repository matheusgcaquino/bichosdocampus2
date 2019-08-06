<?php

namespace App\Http\Controllers\Suporte;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;

class DataController extends Controller
{
    public static function getData($data)
    {
        $born = new DateTime($data);
        $today = new DateTime(date("Y-m-d"));
        $idade = $today->diff($born);
        return [$idade->y, $idade->m];
    }

    public static function putData($data)
    {
        $idade = new DateTime(date("Y-m-d"));
        if($data[0] > 0){
            ($mes = $data[0] > 1 ? $data[0]." months" : $data[0]." month");
            $idade->modify("-".$mes);
        }
        if($data[1] > 0){
            ($ano = $data[1] > 1 ? $data[1]." years" : $data[1]." year");
            $idade->modify("-".$ano);
        }
        return $idade->format('Y-m-d');
    }

    public static function convertData($data)
    {
        $born = new DateTime($data);
        $today = new DateTime(date("Y-m-d"));
        $idade = $today->diff($born);
        if($idade->y > 0){
            ($ano = $idade->y > 1 ? $idade->y." anos" : $idade->y." ano");
        }
        if($idade->m > 0){
            ($mes = $idade->m > 1 ? $idade->m." meses" : $idade->m." mês");
        }

        if(isset($ano) && isset($mes)){
            return $ano." e ".$mes;
        }elseif (isset($ano)) {
            return $ano;
        }elseif (isset($mes)) {
            return $mes;
        }else{
            return "Recém Nascido";
        }
    }

    public static function buscarData($buscar)
    {
        switch ($buscar) {
            case 1:
                $idade = new DateTime(date("Y-m-d"));
                $idade->modify('- 2 months');
                break;

            case 2:
                $idade[0] = new DateTime(date("Y-m-d"));
                $idade[0]->modify('- 2 months');
                $idade[1] = new DateTime(date("Y-m-d"));
                $idade[1]->modify('- 5 months');
                break;

            case 3:
                $idade[0] = new DateTime(date("Y-m-d"));
                $idade[0]->modify('- 5 months');
                $idade[1] = new DateTime(date("Y-m-d"));
                $idade[1]->modify('- 12 months');
                break;

            case 4:
                $idade[0] = new DateTime(date("Y-m-d"));
                $idade[0]->modify('- 1 year');
                $idade[1] = new DateTime(date("Y-m-d"));
                $idade[1]->modify('- 2 years');
                break;

            case 5:
                $idade = new DateTime(date("Y-m-d"));
                $idade->modify('- 2 years');
                break;
        }
        return $idade;
    }

    public static function diaFormat($data)
    {
        $day = new DateTime($data);
        return $day->format('d/m/Y');
    }
}
