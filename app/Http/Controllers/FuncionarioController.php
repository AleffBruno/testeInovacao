<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Models\Funcionario;

class FuncionarioController extends Controller
{
    protected $departamento;
    protected $funcionario;

    public function __construct(Departamento $departamento,Funcionario $funcionario){
        $this->departamento = $departamento;
        $this->funcionario = $funcionario;
    }

    public function cadastra()
    {
        $departamentos = $this->departamento->all();
        return view('funcionario.cadastra',compact('departamentos'));
    }

    public function cadastraGuarda(Request $request)
    {
        $this->validate($request,Funcionario::rules(),Funcionario::customMsgRules());
        
        $novoFuncionario = $this->funcionario;
        $novoFuncionario->nome = $request->nome;
        $novoFuncionario->save();
        
        foreach($request->departamentos as $departamento)
        {
            $novoFuncionario->departamentos()->attach($departamento);
        }
        
        return redirect()->back()->with([
            'success'=>'Funcionario '.$request->nome.' criado com sucesso'
        ]);

    }
}
