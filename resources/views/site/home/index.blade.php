@extends('adminlte::page')

@section('title', 'Home - Bichos do Campus')

@section('content_header')

<link rel="stylesheet" href="css/magnific-popup.css">
<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="css/bootstrap-datepicker.css">
<link rel="stylesheet" href="css/animate.css">
<link rel="stylesheet" href="css/style.css">

@stop

@section('content')
<div class="divizona">
    <div class="slide-one-item home-slider owl-carousel">

      <div class="site-blocks-cover" style="background-image: url(images/gato.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <h1 style="color:#f23a2e;">BICHOS DO <strong>CAMPUS</strong></h1>
            </div>
          </div>
        </div>
      </div>

      <div class="site-blocks-cover" style="background-image: url(images/gato1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <h1 style="color:#f23a2e;">APOIE ESSA CAUSA,<strong> ADOTE!</strong></h1>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="border-bottom">
      <div class="row no-gutters">
        <div class="col-md-6 col-lg-3">
          <div class="w-100 h-100 block-feature p-5 bg-light">
            <h2>ADOTE</h2>
            <p>Existem cerca de 250 gatos abandonados, vivendo na Universidade Federal de Sergipe.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="w-100 h-100 block-feature p-5">
            <h2>DOE</h2>
            <p>A alimentação dos animais é feita somente com doações.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="w-100 h-100 block-feature p-5 bg-light">

            <h2>NÃO ABANDONE</h2>
            <p>O número de animais abandonados cresce diariamente.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="w-100 h-100 block-feature p-5">
            <h2>CUIDE</h2>
            <p>Ter um animal de estimação é bom pra você e pra ele támbem.</p>
          </div>
        </div>
      </div>
    </div> <!-- .block-feature -->

    <div class="site-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-12 col-lg-5 mb-5 mb-lg-0">
            <h2 class="mb-3 text-uppercase">O QUE EU PRECISO PARA <strong class="text-black font-weight-bold">ADOTAR</strong>?</h2>
            <p class="lead">A Bichos do Campus tem um processo de adoção seguindo alguns critérios.</p>
            <p class="mb-4">Este processo é feito para garantir o conforto do animal e evitar possíveis problemas.</p>
            <ul class="site-block-check">
              <li>É preciso não ter histórico de abandono.</li>
              <li>Caso você more em apartamento, é necessário ter as janelas teladas.</li>
              <li>Outros.</li>
            </ul>
            <p><a href="#" class="btn btn-primary pill px-4">Quero Adotar</a></p>
          </div>
          <div class="col-md-12 col-lg-6 ml-auto">
            <img src="images/gato3.jpg" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>

    <div class="featured-classes bg-light py-5 block-13">
      <div class="container">

        <div class="heading-with-border">
          <h2 class="heading text-uppercase">Me adote!</h2>
        </div>

        <div class="nonloop-block-13 owl-carousel">

          <div class="block-media-1 heading-with-border bg-white">
            <img src="images/gato4.jpg" alt="Image" class="img-fluid">
            <div class="p-4">
              <h3 class="h5 heading">Jon Snow</h3>
              <p>Macho, 4 meses e precisa de um lar.</p>
            </div>
          </div>

          <div class="block-media-1 heading-with-border bg-white">
            <img src="images/gato5.jpg" alt="Image" class="img-fluid">
            <div class="p-4">
              <h3 class="h5 heading">Arya</h3>
              <p>Fêmea, 1 ano e precisa de um lar.</p>
            </div>
          </div>

          <div class="block-media-1 heading-with-border bg-white">
            <img src="images/gato6.jpg" alt="Image" class="img-fluid">
            <div class="p-4">
              <h3 class="h5 heading">Frajola 1</h3>
              <p>Macho, 8 meses e precisa de um lar.</p>
            </div>
          </div>

          <div class="block-media-1 heading-with-border bg-white">
            <img src="images/gato7.jpg" alt="Image" class="img-fluid">
            <div class="p-4">
              <h3 class="h5 heading">Frajola 2</h3>
              <p>Macho, 8 meses e precisa de um lar</p>
            </div>
          </div>

        </div>

      </div>
    </div>


    <div class="site-section block-14">

      <div class="container">

        <div class="heading-with-border text-center">
          <h2 class="heading text-uppercase">Histórias felizes</h2>
        </div>

        <div class="nonloop-block-14 owl-carousel">

          <div class="d-flex block-testimony">
            <div class="person mr-3">
              <img src="images/person_1.jpg" alt="Image" class="img-fluid rounded-circle">
            </div>
            <div>
              <h2 class="h5">Katie Johnson, CEO</h2>
              <blockquote>&ldquo;Eu adotei uma gatinha e isso mudou a minha vida, sou uma nova pessoa.&rdquo;</blockquote>
            </div>
          </div>
          <div class="d-flex block-testimony">
            <div class="person mr-3">
              <img src="images/person_2.jpg" alt="Image" class="img-fluid rounded-circle">
            </div>
            <div>
              <h2 class="h5">Jane Mars, Designer</h2>
              <blockquote>&ldquo;Gatos são demais, já adotei três e estou de olho no quarto!&rdquo;</blockquote>
            </div>
          </div>
          <div class="d-flex block-testimony">
            <div class="person mr-3">
              <img src="images/person_3.jpg" alt="Image" class="img-fluid rounded-circle">
            </div>
            <div>
              <h2 class="h5">Shane Holmes, CEO</h2>
              <blockquote>&ldquo;Serei uma velha com ciquenta tons de gato em casa!&rdquo;</blockquote>
            </div>
          </div>
          <div class="d-flex block-testimony">
            <div class="person mr-3">
              <img src="images/person_4.jpg" alt="Image" class="img-fluid rounded-circle">
            </div>
            <div>
              <h2 class="h5">Mark Johnson, CEO</h2>
              <blockquote>&ldquo;Meus filhos adoraram adotar dois gatinhos da UFS!&rdquo;</blockquote>
            </div>
          </div>

        </div>

      </div>

    </div>




    <footer class="site-footer">
      <div class="container">


        <div class="row">
          <div class="col-lg-7">
            <div class="row">
              <div class="col-6 col-md-4 col-lg-8 mb-5 mb-lg-0">
                <h3 class="footer-heading mb-4 text-primary">Sobre nós</h3>
                <p>A Bichos do Campus faz parte do NGA - Núcleo de Gestão Ambiental, da UFS - Universidade Federal de Sergipe</p>
                <p><a href="#" class="btn btn-primary pill text-white px-4">Leia mais</a></p>
              </div>
              <div class="col-6 col-md-4 col-lg-4 mb-5 mb-lg-0">
                <h3 class="footer-heading mb-4 text-primary">Menu</h3>
                <ul class="list-unstyled">
                  <li><a href="#">Sobre</a></li>
                  <li><a href="#">Adoção</a></li>
                  <li><a href="#">Contato</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="row">
              <div class="col-md-12"><h3 class="footer-heading mb-4 text-primary">Redes Sociais</h3></div>
              <div class="col-md-12">
                <p>
                  <a href="#" class="pb-2 pr-2 pl-0"><span class="icon-facebook"></span></a>
                  <a href="#" class="p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="p-2"><span class="icon-instagram"></span></a>
                  <a href="#" class="p-2"><span class="icon-vimeo"></span></a>

                </p>
              </div>
            </div>

          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy; <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All Rights Reserved | This template is made with <i class="icon-heart text-primary" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>

        </div>
      </div>
    </footer>
  </div>
</div>
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
