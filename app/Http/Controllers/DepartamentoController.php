<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;

class DepartamentoController extends Controller
{
    protected $departamento;

    public function __construct(Departamento $departamento){
        $this->departamento = $departamento;
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
}
