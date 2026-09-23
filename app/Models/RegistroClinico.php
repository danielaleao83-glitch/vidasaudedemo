<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroClinico extends Model
{
    use HasFactory;

    protected $table = 'registros_clinicos';

    protected $fillable = [
        'atendimento_id',
        'historia_clinica',
        'exame_clinico',
        'avaliacao',
        'diagnostico',
        'conduta',
        'orientacoes',
        'observacoes',
        'status',
        'finalizado_em',
    ];

    protected function casts(): array
    {
        return [
            'finalizado_em' => 'datetime',
        ];
    }

    public function atendimento()
    {
        return $this->belongsTo(Atendimento::class);
    }
}
