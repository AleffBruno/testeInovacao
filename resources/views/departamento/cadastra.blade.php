@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Cadastra Departamento</h1>
@stop

@section('content')

@include('alerts.all_alerts')

<form method="post" action="{{route('departamento.cadastraGuarda')}}">

    {{ csrf_field() }}

    <div class="form-group">
        <label for="inputNome">Nome</label>
        <input name="nome" type="text" class="form-control" id="inputNome" placeholder="Nome do departamento">
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar</button>

</form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop