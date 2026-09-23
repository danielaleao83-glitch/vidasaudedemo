<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Atendimento extends Model
{
    use HasFactory;

    protected $table = 'atendimentos';

    protected $fillable = [
        'uuid',
        'paciente_id',
        'data_atendimento',
        'tipo_atendimento',
        'prioridade',
        'senha',
        'status',
        'observacoes',
    ];

    protected function casts(): array
    {
        return [
            'data_atendimento' => 'date',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (Atendimento $atendimento): void {
            if (empty($atendimento->uuid)) {
                $atendimento->uuid = (string) Str::uuid();
            }

            if (empty($atendimento->status)) {
                $atendimento->status = 'aguardando';
            }

            if (empty($atendimento->prioridade)) {
                $atendimento->prioridade = 'normal';
            }
        });
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function triagem()
    {
        return $this->hasOne(Triagem::class);
    }

    public function registroClinico()
    {
        return $this->hasOne(RegistroClinico::class);
    }
}
