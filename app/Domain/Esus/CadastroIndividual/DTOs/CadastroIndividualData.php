<?php

namespace App\Domain\Esus\CadastroIndividual\DTOs;

final class CadastroIndividualData
{
    public function __construct(
        public readonly ?string $uuid = null,
        public readonly ?string $cpf = null,
        public readonly ?string $cns = null,
        public readonly ?string $nome = null,
        public readonly ?string $nomeSocial = null,
        public readonly ?string $nomeMae = null,
        public readonly ?string $nomePai = null,
        public readonly ?string $telefone = null,
        public readonly ?string $email = null,
        public readonly ?string $dataNascimento = null,
        public readonly ?int $sexo = null,
        public readonly ?int $racaCor = null,
        public readonly ?int $estadoCivil = null,
        public readonly ?string $codigoIbgeMunicipioNascimento = null,
        public readonly ?string $microArea = null,
        public readonly ?string $cpfResponsavelFamiliar = null,
        public readonly ?string $cnsResponsavelFamiliar = null,
    ) {
    }
}
