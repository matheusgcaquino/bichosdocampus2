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
 

    <div class="box-body">
      <div class="alert alert-warning">
        <h3>
            <center>
              <i class="fa fa-wrench"></i>
              Em construção!
            </center>
        </h3>
        <form action="" method="POST">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                <textarea id="product-body" name="text" class="form-control">
                Exemplo
                </textarea>                      
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-success">Confirmar</button>
            </div>
        </form>
      </div>
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