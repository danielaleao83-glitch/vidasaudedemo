<?php

namespace Database\Seeders;

use App\Models\Atendimento;
use App\Models\Paciente;
use App\Models\RegistroClinico;
use App\Models\Triagem;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | USUÁRIO DEMONSTRAÇÃO
        |--------------------------------------------------------------------------
        */

        User::updateOrCreate(
            ['email' => 'admin@vida-saude.local'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('Admin1!'),
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | PACIENTES
        |--------------------------------------------------------------------------
        */

        $pacientes = [];

        $dadosPacientes = [
            [
                'nome' => 'Maria Aparecida Santos',
                'nome_social' => null,
                'cpf' => '11111111111',
                'cns' => '700000000000001',
                'nome_mae' => 'Ana Maria Santos',
                'telefone' => '(91) 99999-1001',
                'email' => 'maria.santos@example.com',
                'data_nascimento' => '1985-04-12',
                'sexo' => 1,
                'raca_cor' => 3,
                'estado_civil' => 2,
            ],
            [
                'nome' => 'João Carlos Oliveira',
                'nome_social' => null,
                'cpf' => '22222222222',
                'cns' => '700000000000002',
                'nome_mae' => 'Lucia Oliveira',
                'telefone' => '(91) 99999-1002',
                'email' => 'joao.oliveira@example.com',
                'data_nascimento' => '1978-09-23',
                'sexo' => 2,
                'raca_cor' => 3,
                'estado_civil' => 2,
            ],
            [
                'nome' => 'Ana Paula Costa',
                'nome_social' => null,
                'cpf' => '33333333333',
                'cns' => '700000000000003',
                'nome_mae' => 'Marcia Costa',
                'telefone' => '(91) 99999-1003',
                'email' => 'ana.costa@example.com',
                'data_nascimento' => '1992-02-18',
                'sexo' => 1,
                'raca_cor' => 1,
                'estado_civil' => 1,
            ],
            [
                'nome' => 'Carlos Eduardo Lima',
                'nome_social' => null,
                'cpf' => '44444444444',
                'cns' => '700000000000004',
                'nome_mae' => 'Regina Lima',
                'telefone' => '(91) 99999-1004',
                'email' => 'carlos.lima@example.com',
                'data_nascimento' => '1969-11-07',
                'sexo' => 2,
                'raca_cor' => 2,
                'estado_civil' => 3,
            ],
            [
                'nome' => 'Fernanda Alves Rocha',
                'nome_social' => null,
                'cpf' => '55555555555',
                'cns' => '700000000000005',
                'nome_mae' => 'Silvia Alves',
                'telefone' => '(91) 99999-1005',
                'email' => 'fernanda.rocha@example.com',
                'data_nascimento' => '2001-06-29',
                'sexo' => 1,
                'raca_cor' => 3,
                'estado_civil' => 1,
            ],
        ];

        foreach ($dadosPacientes as $dados) {
            $pacientes[] = Paciente::updateOrCreate(
                ['cpf' => $dados['cpf']],
                array_merge($dados, [
                    'uuid' => (string) Str::uuid(),
                ])
            );
        }

        /*
        |--------------------------------------------------------------------------
        | ATENDIMENTOS
        |--------------------------------------------------------------------------
        */

        $a1 = Atendimento::updateOrCreate(
            ['senha' => 'A001'],
            [
                'paciente_id' => $pacientes[0]->id,
                'data_atendimento' => now()->toDateString(),
                'tipo_atendimento' => 'Consulta',
                'prioridade' => 'normal',
                'status' => 'aguardando',
                'observacoes' => 'Aguardando atendimento.',
            ]
        );

        $a2 = Atendimento::updateOrCreate(
            ['senha' => 'A002'],
            [
                'paciente_id' => $pacientes[1]->id,
                'data_atendimento' => now()->toDateString(),
                'tipo_atendimento' => 'Consulta',
                'prioridade' => 'alta',
                'status' => 'aguardando',
                'observacoes' => 'Aguardando atendimento.',
            ]
        );

        $a3 = Atendimento::updateOrCreate(
            ['senha' => 'A003'],
            [
                'paciente_id' => $pacientes[2]->id,
                'data_atendimento' => now()->toDateString(),
                'tipo_atendimento' => 'Consulta',
                'prioridade' => 'normal',
                'status' => 'chamando',
                'observacoes' => 'Paciente chamado para atendimento.',
            ]
        );

        $a4 = Atendimento::updateOrCreate(
            ['senha' => 'A004'],
            [
                'paciente_id' => $pacientes[3]->id,
                'data_atendimento' => now()->toDateString(),
                'tipo_atendimento' => 'Consulta',
                'prioridade' => 'alta',
                'status' => 'em_atendimento',
                'observacoes' => 'Atendimento em andamento.',
            ]
        );

        $a5 = Atendimento::updateOrCreate(
            ['senha' => 'A005'],
            [
                'paciente_id' => $pacientes[4]->id,
                'data_atendimento' => now()->subDay()->toDateString(),
                'tipo_atendimento' => 'Consulta',
                'prioridade' => 'normal',
                'status' => 'finalizado',
                'observacoes' => 'Atendimento concluído.',
            ]
        );

        $a6 = Atendimento::updateOrCreate(
            ['senha' => 'A006'],
            [
                'paciente_id' => $pacientes[0]->id,
                'data_atendimento' => now()->subDay()->toDateString(),
                'tipo_atendimento' => 'Retorno',
                'prioridade' => 'normal',
                'status' => 'finalizado',
                'observacoes' => 'Retorno concluído.',
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | TRIAGEM
        |--------------------------------------------------------------------------
        */

        Triagem::updateOrCreate(
            ['atendimento_id' => $a4->id],
            [
                'pressao_arterial' => '130/85',
                'temperatura' => 36.7,
                'frequencia_cardiaca' => 78,
                'frequencia_respiratoria' => 18,
                'peso' => 82.50,
                'altura' => 1.74,
                'saturacao_oxigenio' => 98,
                'queixa_principal' => 'Mal-estar geral e acompanhamento clínico.',
                'observacoes' => 'Paciente em avaliação pela equipe assistencial.',
                'classificacao_risco' => 'Verde',
                'status' => 'concluida',
                'triado_em' => now()->subMinutes(18),
            ]
        );

        Triagem::updateOrCreate(
            ['atendimento_id' => $a5->id],
            [
                'pressao_arterial' => '125/80',
                'temperatura' => 36.5,
                'frequencia_cardiaca' => 72,
                'frequencia_respiratoria' => 17,
                'peso' => 68.30,
                'altura' => 1.62,
                'saturacao_oxigenio' => 99,
                'queixa_principal' => 'Consulta de acompanhamento.',
                'observacoes' => 'Sem alterações relevantes no momento.',
                'classificacao_risco' => 'Verde',
                'status' => 'concluida',
                'triado_em' => now()->subDay(),
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | REGISTROS CLÍNICOS
        |--------------------------------------------------------------------------
        */

        RegistroClinico::updateOrCreate(
            ['atendimento_id' => $a4->id],
            [
                'historia_clinica' => 'Paciente em acompanhamento clínico.',
                'exame_clinico' => 'Estado geral preservado. Sinais vitais estáveis.',
                'avaliacao' => 'Quadro clínico sem sinais de gravidade no momento.',
                'diagnostico' => 'Acompanhamento clínico.',
                'conduta' => 'Manter acompanhamento conforme avaliação da equipe.',
                'orientacoes' => 'Orientado quanto ao acompanhamento e retorno.',
                'observacoes' => 'Registro demonstrativo.',
                'status' => 'em_andamento',
            ]
        );

        RegistroClinico::updateOrCreate(
            ['atendimento_id' => $a5->id],
            [
                'historia_clinica' => 'Consulta de acompanhamento.',
                'exame_clinico' => 'Exame clínico sem alterações relevantes.',
                'avaliacao' => 'Evolução clínica estável.',
                'diagnostico' => 'Acompanhamento de rotina.',
                'conduta' => 'Manter acompanhamento.',
                'orientacoes' => 'Retorno conforme necessidade assistencial.',
                'observacoes' => 'Registro demonstrativo.',
                'status' => 'finalizado',
                'finalizado_em' => now()->subDay()->addHour(),
            ]
        );

        RegistroClinico::updateOrCreate(
            ['atendimento_id' => $a6->id],
            [
                'historia_clinica' => 'Retorno para acompanhamento.',
                'exame_clinico' => 'Paciente estável.',
                'avaliacao' => 'Sem alterações relevantes.',
                'diagnostico' => 'Acompanhamento.',
                'conduta' => 'Manter cuidados e acompanhamento.',
                'orientacoes' => 'Orientações fornecidas ao paciente.',
                'observacoes' => 'Registro demonstrativo.',
                'status' => 'finalizado',
                'finalizado_em' => now()->subDay()->addHours(2),
            ]
        );
    }
}
