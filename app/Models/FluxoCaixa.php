<?php


    // app/Models/FluxoCaixa.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FluxoCaixa extends Model
{
    protected $table = 'fluxocaixa';

    protected $fillable = [
        'idfilial',
        'tipo',
        'valor',
        'descricao',
        'dataregistro'
    ];
    public function filial()
{
    return $this->belongsTo(Filial::class, 'idfilial');
}

}

