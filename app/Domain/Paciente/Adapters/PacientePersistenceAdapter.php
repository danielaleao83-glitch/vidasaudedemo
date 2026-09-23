<?php

namespace App\Domain\Paciente\Adapters;

use App\Domain\Paciente\DTOs\PacienteData;
use App\Models\Paciente;

final class PacientePersistenceAdapter
{
    public function create(PacienteData $data): Paciente
    {
        return Paciente::create([
            'uuid' => $data->uuid,
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
