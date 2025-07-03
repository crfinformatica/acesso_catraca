<?php


// app/Models/FluxoCaixa.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FluxoCaixa extends Model
{
    protected $table = 'fluxo_caixa';

    protected $fillable = [
        'iduser',
        'descricao',
        'valor',
        'tipo',
        'categoria',
        'data_movimento',
        'formadepagamento',
        'id_caixa',
    ];
}
