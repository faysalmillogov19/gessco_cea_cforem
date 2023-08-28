<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unite_enseignement;
use App\Models\Filiere;
use App\Models\Annee_academique;
use App\Models\Orientation;
use App\Models\Repartition_academique;
use App\Models\Specialite;
use App\Models\Unite_enseignement;
use App\Models\Personne;
use App\Models\Personnel;
use App\Models\Enseignant;
use App\Http\Controllers\SpecialFunction;
class AffectationFormation extends Controller
{
    public function index(){
        $filieres= Filiere::all();
        $annee_academique=Annee_academique::all();
        $specialite=Specialite::all();
        $unite_enseignement=Unite_enseignement::all();
        $orientation=Orientation::all();
        $enseignant=Enseignant::join('personnels','personnels.id','enseignants.personnel')->join('personnes','personnes.id','personnes.personnel')->select('*','enseignants.id as id')->get();
        $date=Specialite::join('annee_academiques','annee_academiques.id','specialites.annee_academique')
                        ->join('type_formations','type_formations.id','specialites.type_formation')
                        ->join('filieres','filieres.id','filieres.type_formation')
                        ->join('enseignants','enseignants.id','specialites.responsable')
                        ->join('personnels','personnels.id','enseignants.personnel')
                        ->join('personnes','personnes.id','personnes.personnel')
                        ->select(
                            '*','specialites.id as id','specialites.libelle as libelle_specialite','annee_academiques.libelle as libelle_annee_academique'
                            'type_formations.libelles as libelle_type_formation','filieres.libelles as libelle_filiere'
                        )
                        ->get();
        return view('Affection.Liste');
    }
}
