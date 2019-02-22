@extends('adminlte::page')

@section('title', 'BEM-VINDO - BICHOS DO CAMPUS')

@section('content_header')
@stop

@section('content')
<div class="container-fluid bg-1 text-center">
  <div class="jumbotron" style=" background-image: url(images/home2.jpg);background-size: cover; box-shadow: 5px 5px 5px rgba(0,0,0,0.5);">
    <img src="images/logo.png" style="padding: 5%" class="img-responsive">
  </div>
</div>
  <div class="col-md-12">
    <div class="box">
      <div class="box-header with-border" style="background-color: #f53a0c;">
        <h3 class="box-title" style="color: white;">PRECISO DE UM LAR!</h3></div>
          <div class="box-body">
        <div class="col-sm-4">
          <img src="images/05.jpg" class="img-responsive margin">
        </div>
        <div class="col-sm-4">
          <img src="images/06.jpg" class="img-responsive margin">
        </div>
        <div class="col-sm-4">
          <img src="images/07.jpg" class="img-responsive margin">
        </div>
         <div class="col-sm-4">
          <img src="images/08.jpg" class="img-responsive margin">
        </div>
        <div class="col-sm-4">
          <img src="images/09.jpg" class="img-responsive margin">
        </div>
        <div class="col-sm-4">
          <img src="images/10.jpg" class="img-responsive margin">
        </div>
    </div>
    </div>
  </div>
    </div>
  


    <div class="box-body" style="text-align: center;">
      <h2>COMO <strong>ADOTAR?</strong></h2>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-paw"></i></span>

          <div class="info-box-content"> 
            <span class="info-box-number" style="text-align: center;">ESCOLHA PET IDEAL PARA VOCÊ!</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-file-text"></i></span>
          <div class="info-box-content">
            <span class="info-box-number" style="text-align: center;">PREENCHA O FORMULÁRIO DE ADOÇÃO!</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-check"></i></span>

          <div class="info-box-content">
            <span class="info-box-number" style="text-align: center;">AGUARDE A APROVAÇÃO DA ADOÇÃO!</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-heart"></i></span>

          <div class="info-box-content">
            <span class="info-box-number" style="text-align: center;">SEJA FELIZ COM SEU PET!</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->    
    </div>

<div class="box-footer" style="background-color: #f53a0c;">
  <div class="col-md-6" style="text-align: left;">
    <h3 style="color: white;">QUEM SOMOS?</h3>
    <h4 style="color: white;"> texto texto texto texto texto</h4>
  </div>
  <div class="col-md-6" style="text-align: right;">
    <h3 style="color: white;">SIGA-NOS</h3>
    <a href="https://pt-br.facebook.com/pages/category/Community/Bichos-do-Campus-1525354857687682/" class="btn btn-social-icon btn-facebook">
      <i class="fa fa-facebook"></i></a>
    <a href="https://instagram.com/bichosdocampus"class="btn btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a>
  </div>
</div>
@stop
