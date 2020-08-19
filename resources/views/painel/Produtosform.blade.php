@extends('adminlte::page')


@section('content')
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Produtos') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __(' Digite seus dados no fomulario de contato') }}

                    {!! Form::open(['url' => 'foo/bar']) !!}


                     <div class="form-group col-md-12">
                        {{Form::number('name', 'value',)}}
                    </div>

                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- Estamos utilizando adimnlte laravel https://github.com/jeroennoten/Laravel-AdminLTE#1-requirements --}}
{{-- Modelo https://adminlte.io/themes/v3/pages/UI/general.html --}}z