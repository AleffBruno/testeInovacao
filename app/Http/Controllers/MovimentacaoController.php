<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Models\Funcionario;
use App\Models\Movimentacao;
use App\Models\FuncionarioDepartamento;
use Illuminate\Support\Facades\DB;

class MovimentacaoController extends Controller
{
    protected $departamento;
    protected $movimentacao;
    protected $funcionarioDepartamentoAssoc;

    public function __construct(Departamento $departamento,Movimentacao $movimentacao,FuncionarioDepartamento $funcionarioDepartamento) {
        $this->departamento = $departamento;
        $this->movimentacao = $movimentacao;
        $this->funcionarioDepartamentoAssoc = $funcionarioDepartamento;
    }

    public function cadastra() {
        $departamentos = $this->departamento->all();
        return view('movimentacao.cadastra',compact('departamentos'));
    }

    public function cadastraGuarda(Request $request) {
        $FuncDepartAssoc = $this->funcionarioDepartamentoAssoc
        ->where('id_funcionario', $request->idFuncionario)
        ->where('id_departamento', $request->idDepartamento)
        ->first()
        ;

        $novaMovimentacao = $this->movimentacao;
        $novaMovimentacao->descricao = $request->descricao;
        $novaMovimentacao->valor = $request->valor;
        $novaMovimentacao->id_funcionario_departamento = $FuncDepartAssoc->id;
        $novaMovimentacao->save();

        return redirect()->back()->with([
            'success'=>'Movimentação criada com sucesso'
        ]);
        //dd($request->all());
    }

    public function historico() {

        $todasMovimentacoesComFuncionarios = DB::select('
        SELECT movimentacao.valor,movimentacao.descricao,funcionario.nome
        FROM movimentacao
        INNER JOIN funcionario_departamento
            on movimentacao.id_funcionario_departamento = funcionario_departamento.id
        INNER JOIN funcionario
            on funcionario_departamento.id_funcionario = funcionario.id
        ');
        
        return view('movimentacao.historico',compact('todasMovimentacoesComFuncionarios'));
        
    }


}
