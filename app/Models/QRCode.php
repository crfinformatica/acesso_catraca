<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QRCode extends Model
{
    protected $table = 'qrcodes';

    // Adicione 'user_id' aqui:
    protected $fillable = ['code', 'used_at', 'user_id', 'produto_id', 'entrada_em', 'descricao', 'cliente_id'];

      // Relacionamento com o usuário
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id', 'idproduto');
    }

    public function isUsed()
    {
        return !is_null($this->used_at);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }


    public function caixaItem()
{
    return $this->hasOne(\App\Models\CaixaItem::class, 'qrcode_id');
}

}
