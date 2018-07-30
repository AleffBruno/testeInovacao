<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Funcionario;

class Departamento extends Model
{
    public $timestamps = false;
    protected $table = 'departamento';

    public static function rules() {
        $rules = array(
            'nome' => "max:100|required"
        );

        return $rules;
    }

    public function funcionarios() {
        return $this->belongsToMany(
            Funcionario::class,
            'funcionario_departamento',
            'id_departamento', 
            'id_funcionario'
        );
    }
}
