<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdemDeServico extends Model
{
    protected  $fillable = [
        'nome_tecnico',
        'data_solicitacao',
        'prazo_atendimento',
        'endereco_atendimento',
        'status',
    ];
}
