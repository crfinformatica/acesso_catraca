<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaixaItem extends Model
{
    protected $table = 'caixa_item';

    protected $fillable = [
        'iduser',
        'caixa_header_id',
        'qrcode_id',
        'datetime',
        'idproduto',
        'valor',
        'desconto',
        'acrescimo',
        'valorapagar',
        'formadepagamento',
    ];

    public $timestamps = true;

    // Relacionamento com o Caixa (caixa_header)
    public function caixa()
    {
        return $this->belongsTo(Caixa::class, 'caixa_header_id');
    }

    // Relacionamento com o QR Code (opcional)
    public function qrcode()
    {
        return $this->belongsTo(QRCode::class, 'qrcode_id');
    }

    // Relacionamento com Produto (opcional)
    public function produto()
    {
        return $this->belongsTo(Produto::class, 'idproduto');
    }
}
