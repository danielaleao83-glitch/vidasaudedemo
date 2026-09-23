<?php

namespace App\Domain\Paciente\Services;

use App\Domain\Paciente\DTOs\PacienteData;
use App\Models\Paciente;

final class PacienteService
{
    public function findOrCreate(PacienteData $data): Paciente
    {
        if ($data->cpf !== null) {
            $paciente = Paciente::query()
                ->where('cpf', $data->cpf)
                ->first();

            if ($paciente !== null) {
                return $paciente;
            }
        }

        if ($data->cns !== null) {
            $paciente = Paciente::query()
                ->where('cns', $data->cns)
                ->first();

            if ($paciente !== null) {
                return $paciente;
            }
        }

        return Paciente::create([
            'cpf' => $data->cpf,
            'cns' => $data->cns,
            'nome' => $data->nome,
            'nome_social' => $data->nomeSocial,
            'nome_mae' => $data->nomeMae,
            'nome_pai' => $data->nomePai,
            'telefone' => $data->telefone,
            'email' => $data->email,
            'data_nascimento' => $data->dataNascimento,
            'sexo' => $data->sexo,
            'raca_cor' => $data->racaCor,
            'estado_civil' => $data->estadoCivil,
            'codigo_ibge_municipio_nascimento' =>
                $data->codigoIbgeMunicipioNascimento,
            'microarea' => $data->microArea,
            'cpf_responsavel_familiar' =>
                $data->cpfResponsavelFamiliar,
            'cns_responsavel_familiar' =>
                $data->cnsResponsavelFamiliar,
        ]);
    }
}
