@extends('adminlte::page')

@section('title', 'Divulgações - Bichos do Campus')

@section('content_header')
@stop

@section('content')

  <!-- Mensagem de Alerta -->
  @include('site.includes.alerts')

  <div class="box">

    <div class="box-header">
      <h3>
        <center>
          Divulgações <strong>para Parceiros</strong>
        </center>
      </h3>
      <div class="callout callout-warning">
        <h4>Caro(a) Parceiro(a),</h4>
        <p>Nesta página você poderá enviar seu conteúdo para divulgação*.</p>
        <p><b>*O conteúdo enviado estará sujeito à análise.</b></p>
      </div>
    </div>

    <div class="box-body">
      <form action="{{ route('divulgar.confirmar') }}" method="POST">
        {{ csrf_field() }}
        <div class="box-body">
          <div class="form-group">
          <textarea id="product-body" name="text" class="form-control"></textarea>                      
          </div>
        </div>

        <div class="box-footer">
          <button type="submit" class="btn btn-success">Confirmar</button>
        </div>
      </form>
    </div>
    
  </div>  
@stop

@section('js')
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    
    <script>
        CKEDITOR.replace('product-body', {
            extraPlugins: 'autogrow',
            autoGrow_maxHeight: 400,
            autoGrow_minHeight: 200,
            removePlugins: 'resize'
        });
    </script>
@append