<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;

class MovimentacaoController extends Controller
{
    protected $departamento;

    public function __construct(Departamento $departamento) {
        $this->departamento = $departamento;
    }

    public function cadastra() {
        $departamentos = $this->departamento->all();
        return view('movimentacao.cadastra',compact('departamentos'));
    }


}
