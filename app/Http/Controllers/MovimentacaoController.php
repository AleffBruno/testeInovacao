<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Models\Funcionario;
use App\Models\Movimentacao;
use App\Models\FuncionarioDepartamento;

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
        ->get()
        ;

        

        dd($FuncDepartAssoc);

        $novaMovimentacao = $this->movimentacao;
        
        return $request->all();
        //dd($request->all());
    }


}
