<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Movimentacao;

class FuncionarioDepartamento extends Model
{
    public $timestamps = false;
    protected $table = 'funcionario_departamento';

    public function movimentacoes() {
        return $this->hasMany(Movimentacao::class,'id_funcionario_departamento','id');
    }
}
