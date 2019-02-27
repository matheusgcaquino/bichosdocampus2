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
        <input type="hidden" name="id_animal_adocao" value="{{$id}}"/>

          <div class="form-group col-md-6">
            <label for="name"> Nome Completo <font color="red"> * <font color="black"> </label>
            <input type="text" class="form-control" name="nome_adocao" placeholder="Nome Completo">
          </div>

          <div class="form-group col-md-6">
            <label for="name"> Data de Nascimento <font color="red"> * <font color="black"> </label>
            <input type="text" class="form-control" name="nascimento_adocao" placeholder="dd/mm/aaaa">
          </div>

          <div class="form-group col-md-6">
          <label> Telefone <font color="red"> * <font color="black"> </label>
          <div class="input-group">
              <input type="text" class="form-control" name="telefone_adocao" placeholder="Telefone"
              data-inputmask='"mask": "(99) 9999-9999"' data-mask="">
          </div>
          </div>

          <div class="form-group col-md-6">
          <label> E-mail <font color="red"> * <font color="black"> </label>
          <input type="text" class="form-control" name="email_adocao" placeholder="E-mail">
          </div>

          <div class="form-group col-md-6">
          <label> CPF <font color="red"> * <font color="black"> </label>
          <div class="input-group">
              <input type="text" class="form-control" name="cpf_adocao" placeholder="CPF"
              data-inputmask='"mask": "999.999.999-99' data-mask="">
          </div>
          </div>
          
          <div class="form-group col-md-6">
          <label for="race"> Logradouro <font color="red"> * <font color="black"> </label>
          <input type="text" class="form-control" name="logradouro_adocao" placeholder="Logradouro">
          </div>
          
          <div class="form-group col-md-6">
          <label for="race"> Bairro <font color="red"> * <font color="black"> </label>
          <input type="text" class="form-control" name="bairro_adocao" placeholder="Bairro">
          </div>

          <div class="form-group col-md-6">
          <label for="race"> CEP <font color="red"> * <font color="black"> </label>
          <input type="text" class="form-control" name="cep_adocao" placeholder="CEP"
              data-inputmask='"mask": "99.999-999' data-mask="">
          </div>

          <div class="form-group col-md-6">
          <label for="race"> Cidade <font color="red"> * <font color="black"> </label>
          <input type="text" class="form-control" name="cidade_adocao" placeholder="Cidade">
          </div>

          <div class="form-group col-md-6">
          <label for="race"> Estado <font color="red"> * <font color="black"> </label>
          <input type="text" class="form-control" name="estado_adocao" placeholder="Estado">
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

        <div class="box-footer">
          <button type="submit" class="btn btn-success">Confirmar</button>
          <a href="{{route('site.animais')}}" class="btn btn-default">Cancelar</a>
        </div>
      </form>
    </div>
@stop