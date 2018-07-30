<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FuncionarioDepartamento;
use App\Models\Funcionario;

class Movimentacao extends Model
{
    public $timestamps = false;
    protected $table = 'movimentacao';

    public function funcionarioDepartamento() {
        return $this->belongsTo(FuncionarioDepartamento::class,'id');
    }

    //ESTA COM FALHA
    public function funcionarios()
    {
        return $this->hasManyThrough(Funcionario::class, FuncionarioDepartamento::class,'id_funcionario','id','id','id_funcionario_departamento');
    }
}
