<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Departamento;

class Funcionario extends Model
{
    public $timestamps = false;
    protected $table = 'funcionario';

    public static function rules() {
        $rules = array(
            'departamentos' => "required",
            'nome' => "max:200"
        );

        return $rules;
    }

    public static function customMsgRules () {
        $customMessages = [
            'required' => 'O campo " :attribute " é requerido.'
        ];

        return $customMessages;
    }

    public function departamentos() {
        return $this->belongsToMany(
            Departamento::class,
            'funcionario_departamento',
            'id_funcionario',
            'id_departamento'
        );
    }
}
