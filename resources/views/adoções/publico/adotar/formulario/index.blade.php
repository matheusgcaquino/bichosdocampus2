@extends('adminlte::page')

@section('title', 'Requisitar Adoção - Bichos do Campus')

@section('content_header')
@stop

@section('content')  

  <div class="box">

    <div class="box-header">
      <h4><b>Requerimento de Adoção</b></h4>
    </div>

    <form action="{{route('adotar.animal')}}" method="POST">
      
      {{ csrf_field() }}

      <div class="box-body">
        
      <input type="hidden" name="id_animal" value="{{($id)}}"/>

      <div class="form-group col-md-6">
        <label for="name"> Nome Completo <font color="red"> * <font color="black"> </label>
        <input type="text" class="form-control" id="nome_adocao" name="nome_adocao" placeholder="Nome Completo" required>
      </div>

<<<<<<< HEAD
      <div class="form-group col-md-6">
        <label for="name"> Data de Nascimento <font color="red"> * <font color="black"> </label>
        <input type="text" class="form-control" id="nascimento_adocao" name="nascimento_adocao" placeholder="dd/mm/aaaa">
      </div>

      <div class="form-group col-md-6">
        <label> Telefone <font color="red"> * <font color="black"> </label>
        <input type="text" class="form-control" id="telefone_adocao" name="telefone_adocao" placeholder="(__) _____-____" required>
      </div>

      <div class="form-group col-md-6">
        <label> E-mail <font color="red"> * <font color="black"> </label>
        <input type="email" class="form-control" id="email_adocao" name="email_adocao" placeholder="E-mail" required>
      </div>

      <form method="get" action=".">

      <div class="form-group col-md-6">
        <label> CPF <font color="red"> * <font color="black"> </label>
        <input type="text" class="form-control" id="cpf_adocao" name="cpf_adocao" placeholder="___.___.___-__" required>
      </div>

      <div class="form-group col-md-6">
        <label for="race"> CEP <font color="red"> * <font color="black"> </label>
        <input type="text" class="form-control" id="cep_adocao" name="cep_adocao" placeholder="__.___-___" onblur="pesquisacep(this.value);" required>
      </div>
        
      <div class="form-group col-md-6">
        <label for="race"> Rua <font color="red"> * <font color="black"> </label>
        <input type="text" class="form-control" id="rua_adocao" name="rua_adocao" placeholder="Logradouro" required>
      </div>

      <div class="form-group col-md-3">
        <label for="race"> Nº <font color="red"> * <font color="black"> </label>
        <input type="text" class="form-control" id="numero_adocao" name="numero_adocao" placeholder="Nº" required>
      </div>

      <div class="form-group col-md-3">
        <label for="race"> Complemento </label>
        <input type="text" class="form-control" id="complemento_adocao" name="complemento_adocao" placeholder="AP, Bloco, Próximo de...">
      </div>
        
      <div class="form-group col-md-6">
        <label for="race"> Bairro <font color="red"> * <font color="black"> </label>
        <input type="text" class="form-control" id="bairro_adocao" name="bairro_adocao" placeholder="Bairro" required>
      </div>          

      <div class="form-group col-md-6">
        <label for="race"> Cidade <font color="red"> * <font color="black"> </label>
        <input type="text" class="form-control" id="cidade_adocao" name="cidade_adocao" placeholder="Cidade" required>
      </div>

      <div class="form-group col-md-6">
        <label for="race"> Estado <font color="red"> * <font color="black"> </label>
        <input type="text" class="form-control" id="estado_adocao" name="estado_adocao" placeholder="Estado" required>
      </div>
=======
      <form action="{{route('adotar.animal')}}" method="POST">
        {{ csrf_field() }}
        <div class="box-body">
          
        <input type="hidden" name="id_animal" value="{{($id)}}"/>

          <div class="form-group col-md-6">
            <label for="name"> Nome Completo <font color="red"> * <font color="black"> </label>
            <input type="text" class="form-control" id="nome_adocao" name="nome_adocao" placeholder="Nome Completo" required>
          </div>

          <div class="form-group col-md-6">
            <label for="name"> Data de Nascimento <font color="red"> * <font color="black"> </label>
            <input type="text" class="form-control" id="nascimento_adocao" name="nascimento_adocao" placeholder="dd/mm/aaaa">
          </div>

          <div class="form-group col-md-6">
            <label> Telefone <font color="red"> * <font color="black"> </label>
            <input type="text" class="form-control" id="telefone_adocao" name="telefone_adocao" placeholder="(__) _____-____" required>
          </div>

          <div class="form-group col-md-6">
            <label> E-mail <font color="red"> * <font color="black"> </label>
            <input type="email" class="form-control" id="email_adocao" name="email_adocao" placeholder="E-mail" required>
          </div>

          <div class="form-group col-md-6">
            <label> CPF <font color="red"> * <font color="black"> </label>
            <input type="text" class="form-control" id="cpf_adocao" name="cpf_adocao" placeholder="___.___.___-__" required>
          </div>

          <div class="form-group col-md-6">
            <label for="race"> CEP <font color="red"> * <font color="black"> </label>
            <input type="text" class="form-control" id="cep_adocao" name="cep_adocao" placeholder="__.___-___" onblur="pesquisaCEP(this.value);" required>
          </div>
          
          <div class="form-group col-md-6">
            <label for="race"> Rua <font color="red"> * <font color="black"> </label>
            <input type="text" class="form-control" id="rua_adocao" name="rua_adocao" placeholder="rua" required>
          </div>

          <div class="form-group col-md-3">
            <label for="race"> Nº <font color="red"> * <font color="black"> </label>
            <input type="text" class="form-control" id="numero_adocao" name="numero_adocao" placeholder="Nº" required>
          </div>

          <div class="form-group col-md-3">
            <label for="race"> Complemento </label>
            <input type="text" class="form-control" id="complemento_adocao" name="complemento_adocao" placeholder="AP, Bloco, Próximo de...">
          </div>
          
          <div class="form-group col-md-6">
            <label for="race"> Bairro <font color="red"> * <font color="black"> </label>
            <input type="text" class="form-control" id="bairro_adocao" name="bairro_adocao" placeholder="Bairro" required>
          </div>          

          <div class="form-group col-md-6">
            <label for="race"> Cidade <font color="red"> * <font color="black"> </label>
            <input type="text" class="form-control" id="cidade_adocao" name="cidade_adocao" placeholder="Cidade" required>
          </div>

          <div class="form-group col-md-6">
            <label for="race"> Estado <font color="red"> * <font color="black"> </label>
            <input type="text" class="form-control" id="estado_adocao" name="estado_adocao" placeholder="Estado" required>
          </div>

          <div class="form-group col-md-6">
            <label>Moro em </label>
            <div class="radio">
              <label>
                <input type="radio" name="moro_adocao" id="moro1" value="casa" checked="">
                Casa
              </label>
            </div>
            
            <div class="radio">
              <label>
                <input type="radio" name="moro_adocao" id="moro2" value="apartamento">
                Apartamento
              </label>
            </div>
          </div>
        </div>
>>>>>>> dev

      </form>

      <div class="form-group col-md-6">
        <label>Moro em </label>
        <div class="radio">
          <label>
            <input type="radio" name="moro_adocao" id="moro1" value="casa" checked=""> Casa
          </label>
        </div>
        
        <div class="radio">
          <label>
            <input type="radio" name="moro_adocao" id="moro2" value="apartamento"> Apartamento
          </label>
        </div>
      </div>    

      <div class="box-footer">
        <button type="submit" id="btnConfirmar" class="btn btn-success">Confirmar</button>
        <a href="{{route('site.animais')}}" class="btn btn-default">Cancelar</a>
      </div>

    </form>
  </div>

<script src="{{asset('js/jquery-3.3.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/jquery.mask.js')}}" type="text/javascript"></script>
<script src="{{asset('js/modulos/adocao/formulario/formulario.js')}}"></script>

<script>
  $(document).ready(function($) {
    $('input[name="nascimento_adocao"]').mask('00/00/0000');
    $('input[name="telefone_adocao"]').mask('(00) #0000-0000');
    $('input[name="cpf_adocao"]').mask('000.000.000-00');
    $('input[name="cep_adocao"]').mask('00.000-000');
  });
</script> 

<script type="text/javascript" >
    
  function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('rua_adocao').value=("");
    document.getElementById('bairro_adocao').value=("");
    document.getElementById('cidade_adocao').value=("");
    document.getElementById('estado_adocao').value=("");
  }

  function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
      //Atualiza os campos com os valores.
      document.getElementById('rua_adocao').value=(conteudo.logradouro);
      document.getElementById('bairro_adocao').value=(conteudo.bairro);
      document.getElementById('cidade_adocao').value=(conteudo.localidade);
      document.getElementById('estado_adocao').value=(conteudo.uf);
    } //end if.
    else {
      //CEP não Encontrado.
      limpa_formulário_cep();
      alert("CEP não encontrado.");
    }
  }
      
  function pesquisacep(valor) {
    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {
      //Expressão regular para validar o CEP.
      var validacep = /^[0-9]{8}$/;
      //Valida o formato do CEP.
      if(validacep.test(cep)) {
        //Preenche os campos com "..." enquanto consulta webservice.

        //Cria um elemento javascript.
        var script = document.createElement('script');

        //Sincroniza com o callback.
        script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

        //Insere script no documento e carrega o conteúdo.
        document.body.appendChild(script);
      } //end if.
      else {
        //cep é inválido.
        limpa_formulário_cep();
        alert("Formato de CEP inválido.");
      }
    } //end if.
    else {
      //cep sem valor, limpa formulário.
      limpa_formulário_cep();
    }
  };

  </script>

@stop