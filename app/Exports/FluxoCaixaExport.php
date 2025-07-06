<?php

namespace App\Exports;

use App\Models\FluxoCaixa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FluxoCaixaExport implements FromCollection, WithHeadings
{
    protected $dataInicio;
    protected $dataFim;
    protected $idfilial;

    public function __construct($dataInicio, $dataFim, $idfilial)
    {
        $this->dataInicio = $dataInicio;
        $this->dataFim = $dataFim;
        $this->idfilial = $idfilial;
    }

    public function collection()
    {
        $query = FluxoCaixa::whereBetween('data_movimento', [$this->dataInicio, $this->dataFim]);

        if ($this->idfilial) {
            $query->where('id_caixa', $this->idfilial);
        }

        return $query->select('descricao', 'tipo', 'valor', 'data_movimento')->get();
    }

    public function headings(): array
    {
        return ['Descrição', 'Tipo', 'Valor', 'Data'];
    }
}
