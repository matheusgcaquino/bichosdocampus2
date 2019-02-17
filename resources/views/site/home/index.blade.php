@extends('adminlte::page')

@section('title', 'BEM-VINDO - BICHOS DO CAMPUS')

@section('content_header')
@stop

@section('content')

  <div class="col-md-12">
    <div class="slide-one-item home-slider owl-carousel">
      <div class="site-blocks-cover" style="background-image: url(images/home2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <h1 style="color:  #c0392b; font-size: 80px;">SEJA BEM-<strong>VINDO</strong></h1>
            </div>
          </div>
        </div>
      </div>
      <div class="site-blocks-cover" style="background-image: url(images/home.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <h1 style="color:   #d35400; font-size: 80px;">BICHOS DO <strong>CAMPUS</strong></h1>
            </div>
          </div>
        </div>
      </div>
      <div class="site-blocks-cover" style="background-image: url(images/home1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <h1 style="color:  #f39c12; font-size: 80px;">APOIE ESSA <strong>CAUSA</strong></h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  <div class="col-md-12">
    <div class="box" style="padding: 5%; font-size: 16px;">
      <div class="row no-gutters">
        <div class="col-md-6 col-lg-3">
          <div class="w-100 h-100 block-feature p-5 bg-light">
            <h2 style="font-size: 18px;">ADOTE</h2>
            <p style="text-orientation: inherit;">Existem cerca de 250 gatos abandonados, vivendo na Universidade Federal de Sergipe.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="w-100 h-100 block-feature p-5">
            <h2 style="font-size: 18px;">DOE</h2>
            <p style="text-orientation: inherit;">A alimentação dos animais é feita somente com doações.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="w-100 h-100 block-feature p-5 bg-light">

            <h2 style="font-size: 18px;">NÃO ABANDONE</h2>
            <p style="text-orientation: inherit;">O número de animais abandonados cresce diariamente.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="w-100 h-100 block-feature p-5">
            <h2 style="font-size: 18px; font-style: bold;">CUIDE</h2>
            <p style="text-orientation: inherit;">Ter um animal de estimação é bom pra você e pra ele támbem.</p>
          </div>
        </div>
      </div>
    </div> <!-- .block-feature -->
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


  <footer style="text-align: center;"><p>BICHOS DO CAMPUS - 2019</p></footer>



@stop

@section('css')
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/bootstrap/bootstrap-grid.css">
  <link rel="stylesheet" href="css/animate.css">
@stop

@section('js')
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>
@stop