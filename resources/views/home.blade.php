@extends('adminlte::page')


@section('content')
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Bem-vindo caro Franqueado') }}

                    @section('plugins.Datatables', true)

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- Estamos utilizando adimnlte laravel https://github.com/jeroennoten/Laravel-AdminLTE#1-requirements --}}
{{-- Modelo https://adminlte.io/themes/v3/pages/UI/general.html --}}