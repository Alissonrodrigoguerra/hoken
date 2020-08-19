@extends('adminlte::page')

@section('Datatables')

@section('content')
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Artigos') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Id</th>
                          <th>Título</th>
                          <th>Data Postagem</th>
                          <th>Status</th>
                          <th></th>
                        </tr>
                        </thead>
                        <tbody>
                         {{-- Insira os dados pelo plugin js --}}
                        </tbody>
                        <tfoot>
                        <tr>
                        <th>Id</th>
                          <th>Título</th>
                          <th>Data Postagem</th>
                          <th>Status</th>
                          <th></th>
                        </tr>
                        </tfoot>
                      </table>
              
                    </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')
<script>
    $(function () {
    
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
        "language": {
                        "lengthMenu": "Listando _MENU_ registros por página",
                        "zeroRecords": "Nenhum pregistro encontrado.",
                        "info": " Página _PAGE_ de _PAGES_",
                        "search": "Pesquisar",
                        "infoEmpty": "No records available",
                        "infoFiltered": "(Filtrando de _MAX_ registros)"
                    },
        });
  });
  </script>
  
@endsection


{{-- Estamos utilizando adimnlte laravel https://github.com/jeroennoten/Laravel-AdminLTE#1-requirements --}}
{{-- Modelo https://adminlte.io/themes/v3/pages/UI/general.html --}}
