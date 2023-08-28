<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Inscription;
use App\Models\Mention;
use App\Models\Etudiant;
use App\Models\Module_specialite;
use App\Models\Note;
use App\Models\Specialite;
use App\Models\Annee_academique;
use App\Models\Personne;
use App\Models\Type_bourse;
use App\Models\Profession;
use App\Http\Controllers\SpecialFunction;


class Print_bulletinC extends Controller
{
    public function print($id, $semestre){
        $inscription=SpecialFunction::inscription_exacte($id);
        $semestres=Module_specialite::where('specialite',$inscription->specialite)
                                    ->join('repartition_academiques','repartition_academiques.id','module_specialites.semestre')
                                    ->select('semestre','specialite','libelle')
                                    ->distinct()
                                    ->get();
    
        $var=[
            'inscription'=>$inscription,
            'semestres'=>$semestres,
            'mentions'=>Mention::all()
        ];
        $inscription->semestre=$semestre;
        $data=SpecialFunction::getNoteODer($inscription);
        //dd($data);
        
        $result=SpecialFunction::infos($data,$var);
        return view('Impression.List',$result);
    }
}
