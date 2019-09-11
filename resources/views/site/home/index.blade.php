@extends('adminlte::page')

@section('title', 'BEM-VINDO - BICHOS DO CAMPUS')

@section('content_header')
 <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
@stop

@php
  foreach ($imagem as $im) {
    $pic[$im->posicao] = $im->home_imagem;
  }
@endphp

@section('content')
  <div class="col-md-12" style="background: linear-gradient(to right, #ed213a, #93291e); padding: 0; text-align: center; color: white;">
    <div class="col-md-6" style="background-color: #034ea2; padding: 2%;">
      <img src= "imagens/logoUfs.png">
    </div>
    <div class="col-md-6" style="padding: 3%;">
        <i class="fa fa-paw" style="font-size: 40px;"></i>
        <h1>BICHOS DO <b>CAMPUS</b></h1>
    </div>
  </div>

  <div class="col-sm-12" style="background-image: url(uploads/{{$pic[1]}}); height: 400px; 
    background-position: center; background-size: cover;">
  </div>

  <div class="col-md-12" style="background: linear-gradient(to right, #ed213a, #93291e); 
    padding: 5%; text-align: center; color: white;">
      <div class="col-sm-12">
        <div class="col-sm-4">
          <h3><b>ADOTE</b></h3>
          <i class="fa fa-heart" style="font-size: 25px;"></i>
          <h4>Existem cerca de <b>400 gatos</b> vivendo na UFS.</h4>
            <a href="#adotar" class="btn btn-block btn bg-purple btn-lg" style="color: white;">
              Como adotar?</a>
        </div>

        <div class="col-sm-4">
          <h3><b>DOE</b></h3>
          <i class="fa fa-heart-o" style="font-size: 25px;"></i>
          <h4>São gastos cerca de <b>20KGs</b> de ração diariamente.</h4>
            <a href="#doacao" class="btn btn-block btn bg-olive btn-lg" style="color: white;">
              Como doar?</a>
        </div>
        <div class="col-sm-4">
          <h3><b>QUEM SOMOS?</b></h3>
          <i class="fa fa-bank" style="font-size: 25px;"></i>
          <h4>Saiba um pouco mais da nossa <b>história</b>.</h4>
          <a href="#sobre" class="btn btn-block btn-warning btn-lg" style="color: white;">Sobre nós</a>
        </div>
      </div>
  </div>

  <div class="col-sm-12" style="background-image: url(uploads/{{$pic[2]}}); height: 400px; 
    background-position: center; background-size: cover;">
  </div>

  <div id="adotar" class="col-md-12" style="background: linear-gradient(to right, #ed213a, #93291e); 
    padding: 5%; text-align: center; color: white;">
    <h2>Como <b>adotar?</b></h2>

    <div class="col-sm-12">
      <h3><b>1º PASSO</b></h3>
      <i class="fa fa-paw" style="font-size: 25px;"></i>
      <h4>Escolha o <b>PET</b> ideal para você.</h4>
      <a href="{{ route('site.animais') }}" class="btn bg-orange btn-lg" style="color: white;">Quero adotar</a>
    </div>
    
    <div class="col-sm-12" >
      <h3><b>2º PASSO</b></h3>
      <i class="fa fa-check-square-o" style="font-size: 25px;"></i>
      <h4>Após escolher o seu <b>PET</b>, preencha o formulário com seus dados.</h4>
    </div>

    <div class="col-sm-12">
      <h3><b>3º PASSO</b></h3>
      <i class="fa fa-check-square" style="font-size: 25px;"></i>
      <h4>Aguarde enquanto análisamos seu <b>pedido</b>.</h4>
    </div>
    <div class="col-sm-12">
      <h3><b>4º PASSO</b></h3>
      <i class="fa fa-heart" style="font-size: 25px;"></i>
      <h4>Caso o pedido seja <b>aceito</b>, entraremos em contato para finalizar a <b>adoção.</b></h4>
    </div>
  </div>

  <div class="col-sm-12" style="background-image: url(uploads/{{$pic[3]}}); height: 400px; 
    background-position: center; background-size: cover;">
  </div>
  
  <div id="doacao" class="col-md-12" style="background: linear-gradient(to right, #ed213a, #93291e); 
    padding: 5%; text-align: center; color: white;">
    <h2><b>Doações</b></h2>
    
    <h3>O que posso <b>doar?</b></h3>
    <i class="fa fa-paw" style="font-size: 25px;"></i>
    
    <h4>Ração</h4>
    <i class="fa fa-eyedropper" style="font-size: 25px;"></i>
    
    <h4>Vacinas</h4>
    <i class="fa fa-medkit" style="font-size: 25px;"></i>
    
    <h4>Remédios</h4>
    
    <h3>Como <b>doar?</b></h3>
    
    <h4>Entrando em contato conosco, através das <b>rede sociais</b>.</h4>
    
    <a href="https://pt-br.facebook.com/pages/category/Community/Bichos-do-Campus-1525354857687682/" class="btn btn-social-icon btn-facebook">
      <i class="fa fa-facebook"></i>
    </a>
    
    <a href="https://instagram.com/bichosdocampus"class="btn btn-social-icon btn-instagram">
      <i class="fa fa-instagram"></i>
    </a>
    
    <h4>Deixando no <b>NGA - Núcleo de Gestão Ambiental</b>, que fica na <b>UFS - Universidade Federal de Sergipe</b> no prédio da <b>prefeitura</b>.</h4>
  </div>

  <div class="col-sm-12" style="background-image: url(uploads/{{$pic[4]}}); height: 400px; 
    background-position: center; background-size: cover;">
  </div>

  <div id="sobre" class="box-footer" style="background: linear-gradient(to right, #ed213a, #93291e); 
    margin-top: 5%;">
    <div class="col-md-6" style="text-align: left;">
      <h3 style="color: white;"><b>QUEM SOMOS?</b></h3>
      <h4 style="color: white;">{!!$sobre->sobre!!}</h4>
    </div>

    <div class="col-md-6" style="text-align: right;">
      <h3 style="color: white;"><b>SIGA-NOS</b></h3>
      <a href="https://pt-br.facebook.com/pages/category/Community/Bichos-do-Campus-1525354857687682/" 
        class="btn btn-social-icon btn-facebook">
        <i class="fa fa-facebook"></i>
      </a>
      <a href="https://instagram.com/bichosdocampus"class="btn btn-social-icon btn-instagram">
        <i class="fa fa-instagram"></i>
      </a>
    </div>
  </div>
  <center> <b>Desenvolvido por:</b>
  <a href="https://www.linkedin.com/in/eike-natan-sousa-brito-8a23875b/">Eike Sousa,</a>
  <a href="https://www.linkedin.com/in/joaomsal/">João Manoel,</a>
  <a href="https://www.linkedin.com/in/lucas-brabec-0a3933105/">Lucas Brabec,</a>
  <a href="https://www.linkedin.com/in/matheus-aquino-0993b2168/">Matheus Aquino</a>
  <a href="https://www.linkedin.com/in/edson-marques-159235129/"> e Edson Marques</a>
  </center>
@stop
