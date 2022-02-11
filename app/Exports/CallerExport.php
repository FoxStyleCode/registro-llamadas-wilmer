<?php

namespace App\Exports;

use App\Models\Llamada;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CallerExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Llamada::all();
    }


    public function headings(): array
    {
        return [
            'id',
            'municipio',
            'tipo de llamada',
            'nombre de la persona',
            'detalle de la llamada',
            'razón de la llamada',
            'respuesta a la llamada',
            'quién responde'
        ];
    }
}
