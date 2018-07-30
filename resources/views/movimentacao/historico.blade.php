@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Historico Movimentações</h1>
@stop

@section('content')

    <table id="myTable" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Funcionario</th>
                <th>Descrição</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($todasMovimentacoesComFuncionarios as $values)
            <tr>
                <td>{{ $values->nome }}</td>
                <td>{{ $values->descricao }}</td>
                <td>{{ $values->valor }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>


@stop

@section('css')

@stop

@section('js')
    <script>
    $(document).ready( function () {
        $('#myTable').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false
        });
    });
    </script>
@stop