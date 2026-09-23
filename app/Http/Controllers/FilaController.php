<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use Illuminate\Http\Request;

class FilaController extends Controller
{
    public function index()
    {
        $atendimentos = Atendimento::with('paciente')
            ->where('status', 'aguardando')
            ->orderByRaw("
                CASE prioridade
                    WHEN 'alta' THEN 1
                    WHEN 'normal' THEN 2
                    WHEN 'baixa' THEN 3
                    ELSE 4
                END
            ")
            ->orderBy('created_at')
            ->get();

        return view('fila.index', compact('atendimentos'));
    }

    public function chamar(Atendimento $atendimento)
    {
        if ($atendimento->status !== 'aguardando') {
            return redirect()
                ->route('fila.index')
                ->with('error', 'Este atendimento não está mais aguardando na fila.');
        }

        $atendimento->status = 'chamando';
        $atendimento->save();

        return redirect()
            ->route('fila.index')
            ->with(
                'success',
                'Senha ' . $atendimento->senha . ' — ' .
                ($atendimento->paciente->nome ?? 'Paciente') .
                ' foi chamada.'
            );
    }
}
