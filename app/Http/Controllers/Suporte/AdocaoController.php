<?php

namespace App\Http\Controllers\Suporte;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdocaoController extends Controller
{
    public static function validarData($data)
    {
        $data = explode("/","$dat"); // fatia a string $dat em pedados, usando / como referência
        $d = $data[0];
        $m = $data[1];
        $y = $data[2];
    
        // verifica se a data é válida!
        // 1 = true (válida)
        // 0 = false (inválida)
        $res = checkdate($m,$d,$y);
        if ($res == 1){
            return true;
        } else {
            return false;
        }
    }

    public static function validarCPF($cpf)
    {
        $cpf = preg_replace('/\D/', '', $cpf);
        $num = array();
 
        // Cria um array
        for($i=0; $i<(strlen($cpf)); $i++) {
 
            $num[]=$cpf[$i];
        }
 
        if(count($num)!=11){
          return false;
        }else{        
          // Filtra os cpfs 0000 1111 2222 .....    
            for($i=0; $i<10; $i++){
                if ($num[0]==$i && $num[1]==$i && $num[2]==$i
                    && $num[3]==$i && $num[4]==$i && $num[5]==$i
                    && $num[6]==$i && $num[7]==$i && $num[8]==$i){
                        return false;
                }
            }
        }
        
        // Calcula e Compara o primeiro digito
        $j=10;
        for($i=0; $i<9; $i++){
            $multiplica[$i] = $num[$i]*$j;
            $j--;
        }

        $soma = array_sum($multiplica);
        $resto = $soma%11;

        if($resto<2){
            $dg=0;
        }else{
            $dg=11-$resto;
        }

        if($dg!=$num[9]){
            return false;
        }
          
        //Calcula e Compara o segundo digito
        $j=11;
        for($i=0; $i<10; $i++){
            $multiplica[$i]=$num[$i]*$j;
            $j--;
        }

        $soma = array_sum($multiplica);
        $resto = $soma%11;

        if($resto<2){
            $dg=0;
        }else{
            $dg=11-$resto;
        }

        if($dg!=$num[10]){
            return false;
        }

        return true;
    }
}
