@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Cadastra Funcionario</h1>
@stop

@section('content')


<form>

    <div class="form-group">
        <label for="inputNome">Nome</label>
        <input name="nome" type="text" class="form-control" id="inputNome" placeholder="Nome funcionario">
    </div>

    <select class="selectpicker" multiple>
        <option>Mustard</option>
        <option>Ketchup</option>
        <option>Relish</option>
    </select>

    <button type="submit" class="btn btn-primary">Cadastrar</button>

</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop