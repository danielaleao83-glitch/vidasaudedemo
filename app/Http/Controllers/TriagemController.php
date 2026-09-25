<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use App\Models\Triagem;
use Illuminate\Http\Request;

class TriagemController extends Controller
{
    public function index()
    {
        $atendimentos = Atendimento::with(['paciente', 'triagem'])
            ->where('status', 'chamando')
            ->orderByRaw("
                CASE prioridade
                    WHEN 'alta' THEN 1
                    WHEN 'normal' THEN 2
                    WHEN 'baixa' THEN 3
                    ELSE 4
                END
            ")
            ->orderBy('created_at')
            ->limit(5)
            ->get();

        return view('triagem.index', compact('atendimentos'));
    }

    public function create(Request $request)
    {
        $atendimento = Atendimento::with('paciente')
            ->findOrFail($request->query('atendimento'));

        return view('triagem.create', compact('atendimento'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'atendimento_id' => ['required', 'exists:atendimentos,id'],
            'pressao_arterial' => ['nullable', 'string', 'max:20'],
            'temperatura' => ['nullable', 'numeric', 'between:25,45'],
            'frequencia_cardiaca' => ['nullable', 'integer', 'between:20,250'],
            'frequencia_respiratoria' => ['nullable', 'integer', 'between:5,80'],
            'peso' => ['nullable', 'numeric', 'between:0,500'],
            'altura' => ['nullable', 'numeric', 'between:0,3'],
            'saturacao_oxigenio' => ['nullable', 'numeric', 'between:0,100'],
            'queixa_principal' => ['nullable', 'string'],
            'observacoes' => ['nullable', 'string'],
            'classificacao_risco' => [
                'required',
                'in:nao_classificado,verde,amarelo,laranja,vermelho',
            ],
        ]);

        $atendimento = Atendimento::findOrFail($validated['atendimento_id']);

        Triagem::updateOrCreate(
            [
                'atendimento_id' => $atendimento->id,
            ],
            [
                ...$validated,
                'status' => 'concluida',
                'triado_em' => now(),
            ]
        );

        $atendimento->status = 'em_atendimento';
        $atendimento->save();

        return redirect()
            ->route('triagem.index')
            ->with('success', 'Triagem registrada com sucesso.');
    }
}

