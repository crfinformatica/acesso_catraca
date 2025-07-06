<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filial extends Model
{
    protected $table = 'filial';

    protected $fillable = [
        'nomedafilial',
        'endereco',
        'nun_end',
        'bairro',
        'cidade',
        'uf',
        'cep',
    ];
}
