<?php

namespace App\Domain\Esus\CadastroIndividual\Adapters;

use App\Domain\Esus\CadastroIndividual\DTOs\CadastroIndividualData;
use br\gov\saude\esusab\ras\cadastroindividual\CadastroIndividualThrift;
use br\gov\saude\esusab\ras\cadastroindividual\IdentificacaoUsuarioCidadaoThrift;

final class CadastroIndividualAdapter
{
    public function fromThrift(
        CadastroIndividualThrift $cadastro
    ): CadastroIndividualData {
        $identificacao = $cadastro->identificacaoUsuarioCidadao;

        if (!$identificacao instanceof IdentificacaoUsuarioCidadaoThrift) {
            return new CadastroIndividualData(
                uuid: $cadastro->uuid ?? null,
            );
        }

        return new CadastroIndividualData(
            uuid: $cadastro->uuid ?? null,
            cpf: $identificacao->cpfCidadao ?? null,
            cns: $identificacao->cnsCidadao ?? null,
            nome: $identificacao->nomeCidadao ?? null,
            nomeSocial: $identificacao->nomeSocial ?? null,
            nomeMae: $identificacao->nomeMaeCidadao ?? null,
            nomePai: $identificacao->nomePaiCidadao ?? null,
            telefone: $identificacao->telefoneCelular ?? null,
            email: $identificacao->emailCidadao ?? null,
            dataNascimento: $this->formatDate(
                $identificacao->dataNascimentoCidadao ?? null
            ),
            sexo: $identificacao->sexoCidadao ?? null,
            racaCor: $identificacao->racaCorCidadao ?? null,
            estadoCivil: $identificacao->estadoCivil ?? null,
            codigoIbgeMunicipioNascimento:
                $identificacao->codigoIbgeMunicipioNascimento ?? null,
            microArea: $identificacao->microArea ?? null,
            cpfResponsavelFamiliar:
                $identificacao->cpfResponsavelFamiliar ?? null,
            cnsResponsavelFamiliar:
                $identificacao->cnsResponsavelFamiliar ?? null,
        );
    }

    private function formatDate(?int $timestamp): ?string
    {
        if ($timestamp === null || $timestamp <= 0) {
            return null;
        }

        return date('Y-m-d', $timestamp);
    }
}
