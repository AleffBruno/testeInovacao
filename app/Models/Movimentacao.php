<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FuncionarioDepartamento;

class Movimentacao extends Model
{
    public $timestamps = false;
    protected $table = 'movimentacao';

    public function funcionarioDepartamento() {
        return $this->belongsTo(FuncionarioDepartamento::class,'id');
    }
}
