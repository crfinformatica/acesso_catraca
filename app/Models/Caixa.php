<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caixa extends Model
{
    protected $table = 'caixa';

    protected $fillable = [
        'user_id', 'aberto_em', 'fechado_em'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function estaAberto()
    {
        return is_null($this->fechado_em);
    }
}
