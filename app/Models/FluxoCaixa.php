<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FluxoCaixa extends Model
{
    protected $table = 'fluxo_caixa';

    protected $fillable = [
        'iduser',
        'descricao',
        'valor',
        'tipo',              // ENTRADA ou SAÍDA
        'categoria',         // ex: Fechamento de Caixa, Venda, etc.
        'data_movimento',
        'formadepagamento',
        'id_caixa',
        'filial_id', 
    ];

    protected $dates = [
        'data_movimento'=> 'datetime',
        'created_at',
        'updated_at',
    ];

    // Relacionamento com o usuário
    public function user()
    {
        return $this->belongsTo(User::class, 'iduser');
    }

    // Relacionamento com o caixa (caixa_header)
    public function caixa()
    {
        return $this->belongsTo(Caixa::class, 'id_caixa');
    }
    // Relacionamento com filial
    public function filial()
    {
        return $this->belongsTo(Filial::class, 'idfilial');
    }
}
