<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{
    use HasFactory;

    // Nome da tabela, se for diferente de 'clientes'
    protected $table = 'clientes';

    // Chave primária (se for diferente de "id")
    protected $primaryKey = 'id'; 

    // Se a chave primária for auto incrementável
    public $incrementing = true;

    // Tipo da chave primária
    protected $keyType = 'int';

    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'nome',
        'cpf',
        'email',
        'telefone',
        'descricao'
        // outros campos conforme sua tabela
    ];

    // Relacionamento com QR Codes (1 cliente pode ter vários QR codes)
    public function qrcodes()
    {
        return $this->hasMany(QRCode::class, 'cliente_id');
    }
}
