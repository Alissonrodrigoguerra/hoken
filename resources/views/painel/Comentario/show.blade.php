@extends('adminlte::page')

@section('Datatables')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Comentários') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{session('sucess')}}
                    
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Id</th>
                          <th>Comentário</th>
                          <th>Data do Comentário</th>
                          <th>Status</th>
                          <th >
                          </th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($comentarios as $comentario)
                            <tr role="row" class="odd">
                                <td class="sorting_1" tabindex="0">{{ $comentario->id}}</td>
                                <td>{{ $comentario->comment}}</td>
                                <td>{{ $comentario->updated_at}}</td>
                                <td>
                                @if ($comentario->status_log == 1)
                                 {{'Aprovado'}}    
                                @else
                                 {{'Rejeitado'}}    
                                @endif</td>
                                <td width="150px">
                                <form action="{{ route('comentarios.destroy', $comentario->id )}}" method="Post">  {{ csrf_field() }} {{ method_field('DELETE')}}
                                    <button class="btn btn-outline-primary float-left" type="submit" onclick="return confirm('Tem certeza que deseja deletar?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                                <a href="{{ route('comentarios.edit', $comentario->id)}}" class="btn btn-outline-primary"> <i class="fas fa-pen-alt"></i></a>
                                </td>
                              </tr>
                             @empty
                                 
                               
                             @endforelse

                        </tbody>
                        <tfoot>
                        <tr>
                        <th>Id</th>
                        <th>Comentário</th>
                        <th>Data do Comentário</th>
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
