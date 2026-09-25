<?php

namespace App\Http\Controllers;

use App\Domain\Paciente\DTOs\PacienteData;
use App\Domain\Paciente\Services\PacienteService;
use App\Http\Requests\PacienteRequest;
use App\Models\Paciente;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PacienteController extends Controller
{
    public function index(): View
    {
        $pacientes = Paciente::query()
            ->orderBy('nome')
            ->paginate(10);

        return view('pacientes.index', compact('pacientes'));
    }

    public function create(): View
    {
        return view('pacientes.create');
    }

    public function store(
        PacienteRequest $request,
        PacienteService $service
    ): RedirectResponse {
        $data = $request->validated();

        $paciente = $service->findOrCreate(
            new PacienteData(
                cpf: $data['cpf'] ?? null,
                cns: $data['cns'] ?? null,
                nome: $data['nome'],
                nomeSocial: $data['nome_social'] ?? null,
                nomeMae: $data['nome_mae'] ?? null,
                nomePai: $data['nome_pai'] ?? null,
                telefone: $data['telefone'] ?? null,
                email: $data['email'] ?? null,
                dataNascimento: $data['data_nascimento'] ?? null,
                sexo: $data['sexo'] ?? null,
                racaCor: $data['raca_cor'] ?? null,
                estadoCivil: $data['estado_civil'] ?? null,
                codigoIbgeMunicipioNascimento:
                    $data['codigo_ibge_municipio_nascimento'] ?? null,
                microArea: $data['microarea'] ?? null,
                cpfResponsavelFamiliar:
                    $data['cpf_responsavel_familiar'] ?? null,
                cnsResponsavelFamiliar:
                    $data['cns_responsavel_familiar'] ?? null,
            )
        );

        return redirect()
            ->route('pacientes.index')
            ->with(
                'success',
                'Paciente cadastrado com sucesso.'
            );
    }
}