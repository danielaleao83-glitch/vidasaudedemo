<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cpf' => [
                'nullable',
                'digits:11',
                'unique:pacientes,cpf',
            ],

            'cns' => [
                'nullable',
                'digits:15',
                'unique:pacientes,cns',
            ],

            'nome' => [
                'required',
                'string',
                'max:255',
            ],

            'nome_social' => [
                'nullable',
                'string',
                'max:255',
            ],

            'nome_mae' => [
                'nullable',
                'string',
                'max:255',
            ],

            'nome_pai' => [
                'nullable',
                'string',
                'max:255',
            ],

            'telefone' => [
                'nullable',
                'string',
                'max:20',
            ],

            'email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'data_nascimento' => [
                'nullable',
                'date',
            ],

            'sexo' => [
                'nullable',
                'integer',
                'min:0',
                'max:999',
            ],

            'raca_cor' => [
                'nullable',
                'integer',
                'min:0',
                'max:999',
            ],

            'estado_civil' => [
                'nullable',
                'integer',
                'min:0',
                'max:999',
            ],

            'codigo_ibge_municipio_nascimento' => [
                'nullable',
                'digits:7',
            ],

            'microarea' => [
                'nullable',
                'string',
                'max:10',
            ],

            'cpf_responsavel_familiar' => [
                'nullable',
                'digits:11',
            ],

            'cns_responsavel_familiar' => [
                'nullable',
                'digits:15',
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'cpf' => 'CPF',
            'cns' => 'CNS',
            'nome' => 'nome',
            'nome_social' => 'nome social',
            'nome_mae' => 'nome da mãe',
            'nome_pai' => 'nome do pai',
            'telefone' => 'telefone',
            'email' => 'e-mail',
            'data_nascimento' => 'data de nascimento',
            'sexo' => 'sexo',
            'raca_cor' => 'raça/cor',
            'estado_civil' => 'estado civil',
            'codigo_ibge_municipio_nascimento' => 'município de nascimento',
            'microarea' => 'microárea',
            'cpf_responsavel_familiar' => 'CPF do responsável familiar',
            'cns_responsavel_familiar' => 'CNS do responsável familiar',
        ];
    }
}