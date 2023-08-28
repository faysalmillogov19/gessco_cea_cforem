<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscription;
use App\Models\Etudiant;
use App\Models\Module_specialite;
use App\Models\Note;
use App\Models\Specialite;
use App\Models\Annee_academique;
use App\Models\Personne;
use App\Models\Type_bourse;
use App\Models\Profession;
use App\Models\Niveau;
use App\Models\Filiere;
use App\Models\Orientation;
use App\Models\Repartition_academique;
use App\Models\Personnel;
use App\Models\Enseignant;
use App\Models\Type_formation;
use App\Models\Element_constitutif;
use App\Models\Unite_enseignement;
use App\Models\Affectation_enseignant;
use App\Models\Type_affectation_enseignant;
use App\Models\Statut;
use App\Models\Pay;
use App\Models\Ville;
use App\Http\Controllers\SpecialFunction;


class Search_Note extends Controller
{
    public function index(){


        $data=[];

        $specialites=Specialite::join('type_formations','type_formations.id','specialites.type_formation')
                               ->join('orientations','orientations.id','specialites.orientation')
                               //->join('annee_academiques','annee_academiques.id','specialites.annee_academique')
                               ->join('filieres','filieres.id','specialites.filiere')
                               ->select(
                                        '*','specialites.id as id','type_formations.libelle as libelle_type_formation',
                                        'orientations.libelle as libelle_orientation',
                                        'filieres.libelle as libelle_filiere'
                               )
                              ->get();

        $var=[
            'annee_academiques'=>Annee_academique::all(),
            'element_constitutifs'=>Element_constitutif::all(),
            'unite_enseignements'=> unite_enseignement::all(),
            'semestres'=>Repartition_academique::all(),
            'specialites'=>$specialites
        ];
        $result=SpecialFunction::infos($data,$var);
        return view('search.Search_Note_form',$result);

    }

    public function store(Request $request){

        $data=Module_specialite::where('specialite',$request->specialite)
                               ->where('element_constitutif',$request->element_constitutif)
                                ->where('unite_enseignement',$request->unite_enseignement)
                                ->select('*','module_specialites.id as id')
                                ->first();
        


        if(isset($data)){
            return redirect('module_specialite_note/'.$data->id.'/'.$request->annee_academique);
        }
        else{
            return redirect()->back()->with('alert', "Erreur : ce module  n'existe pas !");
        }
        
    }

}
