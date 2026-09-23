<?php

namespace App\Domain\Paciente\Adapters;

use App\Domain\Esus\CadastroIndividual\DTOs\CadastroIndividualData;
use App\Domain\Paciente\DTOs\PacienteData;

final class PacienteDataAdapter
{
    public function fromCadastroIndividual(
        CadastroIndividualData $data
    ): PacienteData {
        return new PacienteData(
            uuid: $data->uuid,
            cpf: $data->cpf,
            cns: $data->cns,
            nome: $data->nome,
            nomeSocial: $data->nomeSocial,
            nomeMae: $data->nomeMae,
            nomePai: $data->nomePai,
            telefone: $data->telefone,
            email: $data->email,
            dataNascimento: $data->dataNascimento,
            sexo: $data->sexo,
            racaCor: $data->racaCor,
            estadoCivil: $data->estadoCivil,
            codigoIbgeMunicipioNascimento:
                $data->codigoIbgeMunicipioNascimento,
            microArea: $data->microArea,
            cpfResponsavelFamiliar:
                $data->cpfResponsavelFamiliar,
            cnsResponsavelFamiliar:
                $data->cnsResponsavelFamiliar,
        );
    }
}
