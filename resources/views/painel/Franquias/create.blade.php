@extends('adminlte::page')

@section('summernote')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Nova Franquia') }} <a class="float-right" href="{{ route('franquias.index') }}">Voltar <i class=" fas fa-hand-point-left"></i></a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                {{-- Formulário --}}
                <form role="form" action="{{ route('franquias.store') }}" method="POST" enctype="multipart/form-data"> 
                  {{ csrf_field() }}
                 
                  @include('painel/franquias/form')  
                
                
            </form>        
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

       

</script>
    
@endsection

{{-- Estamos utilizando adimnlte laravel https://github.com/jeroennoten/Laravel-AdminLTE#1-requirements --}}
{{-- Modelo https://adminlte.io/themes/v3/pages/UI/general.html --}}