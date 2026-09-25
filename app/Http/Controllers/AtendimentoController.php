<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use App\Models\Paciente;
use Illuminate\Http\Request;

class AtendimentoController extends Controller
{
    public function index()
    {
        $atendimentos = Atendimento::with('paciente')
            ->orderByDesc('data_atendimento')
            ->orderByDesc('id')
            ->limit(15)
            ->get();

        return view('atendimentos.index', compact('atendimentos'));
    }

    public function create()
    {
        $pacientes = Paciente::orderBy('nome')->limit(10)->get();

        return view('atendimentos.create', compact('pacientes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'paciente_id' => ['required', 'exists:pacientes,id'],
            'data_atendimento' => ['required', 'date'],
            'tipo_atendimento' => ['required', 'string', 'max:30'],
            'prioridade' => ['required', 'in:baixa,normal,alta'],
            'observacoes' => ['nullable', 'string'],
        ]);

        $ultimoNumero = Atendimento::where('senha', 'like', 'A%')
            ->get()
            ->map(function ($atendimento) {
                return (int) substr($atendimento->senha, 1);
            })
            ->max() ?? 0;

        $validated['senha'] = 'A' . str_pad($ultimoNumero + 1, 3, '0', STR_PAD_LEFT);
        $validated['status'] = 'aguardando';

        Atendimento::create($validated);

        return redirect()
            ->route('fila.index')
            ->with('success', 'Atendimento criado com sucesso e enviado para a fila.');
    }
}
