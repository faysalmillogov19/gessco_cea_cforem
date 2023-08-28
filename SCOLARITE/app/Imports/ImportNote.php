<?php

namespace App\Imports;

use App\Models\Export_note;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportNote implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        return new Export_note([
                //'id'=> $row[0],
                'Nom complet'=> $row[1],
                'matricule'=> $row[2],
                'Code module'=> $row[3],
                'Note'=> $row[4],
        ]);
    }
}
