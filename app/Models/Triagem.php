<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Triagem extends Model
{
    use HasFactory;

    protected $table = 'triagens';

    protected $fillable = [
        'atendimento_id',
        'pressao_arterial',
        'temperatura',
        'frequencia_cardiaca',
        'frequencia_respiratoria',
        'peso',
        'altura',
        'saturacao_oxigenio',
        'queixa_principal',
        'observacoes',
        'classificacao_risco',
        'status',
        'triado_em',
    ];

    protected function casts(): array
    {
        return [
            'temperatura' => 'decimal:1',
            'peso' => 'decimal:2',
            'altura' => 'decimal:2',
            'saturacao_oxigenio' => 'decimal:2',
            'triado_em' => 'datetime',
        ];
    }

    public function atendimento()
    {
        return $this->belongsTo(Atendimento::class);
    }
}
