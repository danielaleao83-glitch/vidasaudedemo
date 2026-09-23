<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use App\Models\RegistroClinico;
use Illuminate\Http\Request;

class RegistroClinicoController extends Controller
{
    public function index()
    {
        $atendimentos = Atendimento::with([
            'paciente',
            'triagem',
            'registroClinico',
        ])
            ->whereIn('status', ['em_atendimento', 'finalizado'])
            ->orderByDesc('data_atendimento')
            ->orderByDesc('id')
            ->get();

        return view('prontuario.index', compact('atendimentos'));
    }

    public function show(Atendimento $atendimento)
    {
        $atendimento->load([
            'paciente',
            'triagem',
            'registroClinico',
        ]);

        return view('prontuario.show', compact('atendimento'));
    }

    public function store(Request $request, Atendimento $atendimento)
    {
        if ($atendimento->status !== 'em_atendimento') {
            return redirect()
                ->route('prontuario.show', $atendimento)
                ->with('error', 'Este atendimento nÃ£o estÃ¡ em atendimento clÃ­nico.');
        }

        $validated = $request->validate([
            'historia_clinica' => ['nullable', 'string'],
            'exame_clinico' => ['nullable', 'string'],
            'avaliacao' => ['nullable', 'string'],
            'diagnostico' => ['nullable', 'string'],
            'conduta' => ['nullable', 'string'],
            'orientacoes' => ['nullable', 'string'],
            'observacoes' => ['nullable', 'string'],
        ]);

        RegistroClinico::updateOrCreate(
            [
                'atendimento_id' => $atendimento->id,
            ],
            [
                ...$validated,
                'status' => 'rascunho',
            ]
        );

        return redirect()
            ->route('prontuario.show', $atendimento)
            ->with('success', 'Registro clÃ­nico salvo como rascunho.');
    }

    public function finalizar(Atendimento $atendimento)
    {
        if ($atendimento->status !== 'em_atendimento') {
            return redirect()
                ->route('prontuario.show', $atendimento)
                ->with('error', 'Este atendimento nÃ£o pode ser finalizado neste momento.');
        }

        $registro = RegistroClinico::where(
            'atendimento_id',
            $atendimento->id
        )->first();

        if (!$registro) {
            return redirect()
                ->route('prontuario.show', $atendimento)
                ->with('error', 'Salve o registro clÃ­nico antes de finalizar o atendimento.');
        }

        $registro->update([
            'status' => 'finalizado',
            'finalizado_em' => now(),
        ]);

        $atendimento->update([
            'status' => 'finalizado',
        ]);

        return redirect()
            ->route('prontuario.show', $atendimento)
            ->with('success', 'Atendimento finalizado com sucesso.');
    }
}
