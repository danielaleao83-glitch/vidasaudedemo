<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Paciente extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pacientes';

    protected $fillable = [
        'uuid',
        'cpf',
        'cns',
        'nome',
        'nome_social',
        'nome_mae',
        'nome_pai',
        'telefone',
        'email',
        'data_nascimento',
        'sexo',
        'raca_cor',
        'estado_civil',
        'codigo_ibge_municipio_nascimento',
        'microarea',
        'cpf_responsavel_familiar',
        'cns_responsavel_familiar',
    ];

    protected function casts(): array
    {
        return [
            'data_nascimento' => 'date',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (Paciente $paciente): void {
            if (empty($paciente->uuid)) {
                $paciente->uuid = (string) Str::uuid();
            }
        });
    }
}
