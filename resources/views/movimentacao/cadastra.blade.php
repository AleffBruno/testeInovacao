@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Cadastra Movimentacao</h1>
@stop

@section('content')

@if($departamentos->count() == 0)
    <h4>Para cadastrar uma movimentacao é necessario a existencia de pelo menos 1 funcionario</h4>
    <form action="{{route('funcionario.cadastra')}}" method="GET">
        <input class="btn btn-primary" type="submit" value="Cadastrar Funcionario">
    </form>
@else
    <form class="form-inline">
        <label for="inputDepartamento">Departamento</label><br>
        <div class="form-group mx-sm-3 mb-2">
            <select name="departamentos" id="inputDepartamento" class="form-control" >
            @foreach($departamentos as $departamento)
                <option value="{{$departamento->id}}">{{ $departamento->nome }}</optionp>
            @endforeach
            </select>
        </div>
        <br>
        <br>
        <button type="submit" class="btn btn-primary mb-2">Criar movimentação</button>
    </form>
@endif

@stop

@section('css')
    <!-- Latest compiled and minified CSS -->
@stop


@section('js')
    <script> console.log('Hi!'); </script>
    <!-- Latest compiled and minified JavaScript -->
@stop