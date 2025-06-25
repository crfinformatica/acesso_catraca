<?php
namespace App\Exports;

use App\Models\FluxoCaixa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FluxoCaixaExport implements FromCollection, WithHeadings
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $query = FluxoCaixa::with('filial')
            ->whereBetween('dataregistro', [$this->request->data_inicio, $this->request->data_fim]);

        if ($this->request->idfilial) {
            $query->where('idfilial', $this->request->idfilial);
        }

        return $query->get()->map(function ($item) {
            return [
                $item->dataregistro,
                $item->tipo,
                $item->valor,
                $item->filial->nomedafilial ?? '-',
                $item->descricao,
            ];
        });
    }

    public function headings(): array
    {
        return ['Data', 'Tipo', 'Valor', 'Filial', 'Descrição'];
    }
}