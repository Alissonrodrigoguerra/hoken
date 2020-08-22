@extends('adminlte::page')
@section('daterangepicker')
@endsection


@section('content')
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">{{ __('Artigos Atualizar') }} <a class="float-right"  href="{{ route('blog.index') }}">Voltar <i class="fas fa-hand-point-left"></i></a> </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                {{-- Formulário --}}
                <form role="form" action="{{ route('blog.update', $Blog->id) }}" method="POST" enctype="multipart/form-data"> 
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}
                  
                  @include('painel/Blog/form')  
                
                
            </form>       
             @include('painel/Categoria/create_modal')  
 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

<script>
    $(function () {
      
      // Summernote
      $('.textarea').summernote({
        placeholder: '',
        tabsize: 2,
        height: 500,
        toolbar: [
          ['style', ['style']],
          ['codeview', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen',  'help']] //'codeview',
        ]
      });

      //daterangepicker
        $('#reservation').daterangepicker({
          timePicker: true,
          timePicker24Hour:true,
          singleDatePicker: true,
          
          startDate: moment().startOf('hour'),
          minYear: 2020,
          locale: {
            format: 'YYYY-MM-DD HH:MM:SS'
          }
          
        });

      });

      $('#categorias').submit(function (e) { 
        e.preventDefault();

        var categoria = $('#categoria_title').val();
        var token = $('input[type=hidden][name=_token]').val();


        $.ajax({
          type: "POST",
          url: "{{route('categoria.store')}}",
          data: 'categoria_title='+ categoria +'&_token='+ token,
          success:function(data) {

            $('#categoria_title').val(''); 
            $(".modal-body").append("<div class='callout callout-success'><h5>Categoria adicionada com sucesso!</h5></div>");

          
          }
        });
              
        }); 
      $('#remover_categoria').click(function (e) { 
          e.preventDefault();

          var categoria_id = $('#categoria_id option:selected').val();
          var token = $('input[type=hidden][name=_token]').val();
          var del = "DELETE";

          $.ajax({
            type: "DELETE",
            url: 'http://192.168.0.15:888/hoken/public/painel/categoria/' + categoria_id,
            dataType: "json",
            data: {
              "id": categoria_id,
              "_token": token,
              "_Method": del,
            },

            success:function(data) {

              $(".mensagem_return").append("<div class='callout callout-success'><h5>"+data+"</h5></div>");

            }
            });  
        
         });

         

  </script>
    
@endsection

{{-- Estamos utilizando adimnlte laravel https://github.com/jeroennoten/Laravel-AdminLTE#1-requirements --}}
{{-- Modelo https://adminlte.io/themes/v3/pages/UI/general.html --}}