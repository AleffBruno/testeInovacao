<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Models\Funcionario;

class DepartamentoController extends Controller
{
    protected $departamento;
    protected $funcionario;

    public function __construct(Departamento $departamento,Funcionario $funcionario){
        $this->departamento = $departamento;
        $this->funcionario = $funcionario;
    }

    public function cadastra()
    {
        return view('departamento.cadastra');
    }

    public function cadastraGuarda(Request $request)
    {
        $this->validate($request,Departamento::rules());

        $novoDepartamento = $this->departamento;
        $novoDepartamento->nome = $request->nome;
        $novoDepartamento->save();
        
        return redirect()->back()->with([
            'success'=>'Departamento '.$request->nome.' criado com sucesso'
        ]);
        //return view('departamento.cadastra');
    }

    public function todosFuncionarios($idDepartamento) {
        //$funcionarios = $this->departamento->with('funcionarios')->find($idDepartamento);
        $departamento = $this->departamento->find($idDepartamento);
        $funcionarios = $departamento->funcionarios;
        return $funcionarios;
    }
}
