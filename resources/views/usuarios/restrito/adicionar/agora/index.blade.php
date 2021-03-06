@extends('adminlte::page')

@section('title', 'Novo Usuário - Bichos do Campus')

@section('content_header')
@stop

@section('content')

  <div class="box">
    <form action = "{{ route('novo.usuarios.adicionar') }}" method="POST" autocomplete="off" id="formulario">
        {{ csrf_field() }}
        <div class="box-header">
            <h3>
              <center>
                Adicionar <strong>Usuário</strong>
            </center>
        </h3>
        </div>
        
        <!-- Mensagem de Alerta -->
        @include('site.includes.alerts')

        <div class="box-body">

            <div class="form-group col-md-6">
                <label for="nome"> Nome  </label>
                <input type="text" class="form-control" name="nome" autocomplete="off" 
                    autofocus required>
            </div>

            <div class="form-group col-md-6">
                <label for="email"> E-mail </label>
                <input type="text" class="form-control" name="email" autocomplete="off" required>
            </div>
            
            <div class="form-group col-md-7">
                <label for="senha"> Senha </label>
                <a data-toggle="tooltip">
                    <input type="password" class="form-control" name="senha" id="senha" 
                    maxlength="16" onKeyUp="testaSenha(this.value);" autocomplete="off" required>
                </a>
            </div>
            
            <div class="form-group col-md-5">
                <label>Nível de segurança da senha </label> 
                <div id='seguranca'>
                    <i class="fa fa-spinner"></i>
                </div>
            </div>
            
            <div class="form-group col-md-7">
                <label for="senha"> Confirmar Senha </label>
                <input type="password" class="form-control" name="senha2" id="senha2" 
                maxlength="16" onKeyUp="testaSenha2(this.value);" autocomplete="off" required>
            </div>

            <div class="col-md-5">
                <label> Confirmação </label> 
                <div id='confirmar'>
                    <i class="fa fa-spinner"></i>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label> Nivel de Acesso </label>
                <select class="form-control" name="nivel">
                    <option value="0">Administrador</option>
                    <option value="1">Gerência</option>
                    <option value="2">Parceiro</option>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label> Status </label>
                <select class="form-control" name="status">
                    <option value="1">Ativado</option>
                    <option value="0">Desativado</option>
                </select>
            </div>
        </div>
         
        <div class="box-footer with-border">
            <button type="submit" class="btn btn-primary">Enviar</button>
            <a href="{{route('site.usuarios')}}" class="btn btn-default">Cancelar</a> 
        </div>
    </form>
  </div>
@stop

@section('js')
    <script>
        //Não tá funcionando
        $('#formulario').find('.formulario').submit(function(){
            var senha = $.trim($(this).find('#senha').val());
            var senha2 = $.trim($(this).find('#senha2').val());
            if(senha.length < 8) {
                alert("Senha tem menos de 8 digitos");
                return false;
            }else if(verCaracterDaSenha(senha) == 1){
                alert("Senha com baixa segurança");
                return false;
            }else if(senha != senha2){
                alert("Senhas não conhecidem");
                return false;
            }
        });

        function verCaracterDaSenha(valor) {
            var erespeciais = /[@!#$%&*+=?|-]/;
            var ermaiuscula = /[A-Z]/;
            var erminuscula = /[a-z]/;
            var ernumeros   = /[0-9]/;
            var cont = 0;
        
            if (erespeciais.test(valor)) cont++;
            if (ermaiuscula.test(valor)) cont++;
            if (erminuscula.test(valor)) cont++;
            if (ernumeros.test(valor))   cont++;
            return cont;
        }
        
        function segurancaBaixa(d) {
            d.innerHTML = '<font color=\'red\'> BAIXO</font>';
        }
        function segurancaMedia(d) {
            d.innerHTML = '<font color=\'orange\'> MÉDIO</font>';
        }
        function segurancaAlta(d) {
            d.innerHTML = '<font color=\'green\'>  ALTO</font>';
        }
        
        function testaSenha(valor) {
            var d = document.getElementById('seguranca');
            var c = verCaracterDaSenha(valor);
            var t = valor.length;
        
            if(t == ''){
                d.innerHTML = '<i class="fa fa-spinner"></i>'
            } else {
                if(t > 7 && c >= 3){
                    segurancaAlta(d);
                } else { 
                    if(t > 7 && c >= 2 || t > 4 && c >= 3){
                        segurancaMedia(d);
                    } else {
                        segurancaBaixa(d);
                    } 
                }
            }  
        }

        function testaSenha2(senha2){
            var d = document.getElementById('confirmar');
            var senha = document.getElementById("senha").value;
            if(senha2 != senha){
                d.innerHTML = '<b><font color=\'red\'><i class="fa fa-fw fa-remove">'
                    +'</i> Senhas não coincidem</font></b>';
            }else{
                d.innerHTML = '<font color=\'green\'><i class="fa fa-check-square"></i></font>';
            }
        }
    </script>
@stop