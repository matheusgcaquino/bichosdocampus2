<?php

namespace App\Http\Controllers\Suporte;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;

class DataController extends Controller
{
    public static function getData($data){
        // $data = date("2017-04-14");
        $born = new DateTime($data);
        $today = new DateTime(date("Y-m-d"));
        $idade = $today->diff($born);
        return [$idade->y, $idade->m];
    }

    public static function putData($data){
        // $data = [0, 1];
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

    public static function convertData($data){
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
}
