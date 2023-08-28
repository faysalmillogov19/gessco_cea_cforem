<?php

namespace App\Exports;

use App\Models\Export_note;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportNote implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Export_note::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'Nom complet',
            'matricule',
            'Code module',
            'Note',
            'Creation',
            'Modification'
        ];
    }
}
