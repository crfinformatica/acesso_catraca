<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caixa extends Model
{
    protected $table = 'caixa_header';

    protected $fillable = [
        'iduser', 'datahora_abertura', 'datahora_fechamento', 'idfilial',
        'total_bruto', 'total_desconto', 'total_acrescimo', 'total_liquido', 'formadepagamento'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'iduser');
    }

    public function estaAberto()
    {
        return is_null($this->datahora_fechamento);
    }
}