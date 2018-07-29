@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Cadastra Funcionario</h1>
@stop

@section('content')

@include('alerts.all_alerts')

@if($departamentos->count() == 0)
    <h4>Para cadastrar um funcionario é necessario a existencia de pelo menos 1 departamento</h4>
    <form action="{{route('departamento.cadastra')}}" method="GET">
        <input class="btn btn-primary" type="submit" value="Cadastrar Departamento">
    </form>
@else
    <form method="POST" methos="{{route('funcionario.cadastra')}}">

        {{ csrf_field() }}

        <div class="form-group">
            <label for="inputNome">Nome</label>
            <input name="nome" type="text" class="form-control" id="inputNome" placeholder="Nome funcionario">
        </div>

        <div class="form-group">
            <label for="inputDepartamento">Departamento</label><br>
            <select name="departamentos[]" id="inputDepartamento" class="selectpicker" multiple>
            @foreach($departamentos as $departamento)
                <option value="{{$departamento->id}}">{{ $departamento->nome }}</optionp>
            @endforeach
            </select>
        </div>
        <input type="submit" class="btn btn-primary" value="Cadastrar">
    </form>
@endif

@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

@stop


@section('js')
    <script> console.log('Hi!'); </script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
@stop

