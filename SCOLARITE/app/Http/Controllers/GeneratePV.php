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
use App\Http\Controllers\SpecialFunction;


class GeneratePV extends Controller
{
    public function index(){
        $data=[];

        $specialites=Specialite::join('type_formations','type_formations.id','specialites.type_formation')
                               ->join('orientations','orientations.id','specialites.orientation')
                               ->join('filieres','filieres.id','specialites.filiere')
                               ->select(
                                        '*','specialites.id as id','type_formations.libelle as libelle_type_formation',
                                        'orientations.libelle as libelle_orientation',
                                        'filieres.libelle as libelle_filiere'
                               )
                              ->get();

        $var=[
            'annee_academiques'=>Annee_academique::all(),
            'semestres'=>Repartition_academique::all(),
            'specialites'=>$specialites
        ];
        $result=SpecialFunction::infos($data,$var);
        return view('Pv_Deliberation.search_pv',$result);

    }

    public function store(Request $request){
        $inscriptions=Inscription::where('inscriptions.specialite',$request->specialite)
                                ->where('inscriptions.annee_academique',$request->annee_academique)
                                ->join('etudiants','etudiants.id','inscriptions.etudiant')
                                ->join('personnes','personnes.id','etudiants.personne')
                                ->join('pays','pays.id','personnes.nationalite')
                                ->select(
                                        'inscriptions.id as id','inscriptions.specialite','inscriptions.annee_academique','personnes.nom_complet',
                                        'etudiants.matricule'
                                )
                                ->get();
        $data=[];
        foreach($inscriptions as $inscription){
            $inscription->semestre=$request->semestre;
            array_push($data,SpecialFunction::getNoteODer($inscription));
        }
        $inscription=Inscription::where('inscriptions.specialite',$request->specialite)
                                 ->where('inscriptions.annee_academique',$request->annee_academique)
                                 ->join('specialites','specialites.id','inscriptions.specialite')
                                 ->join('annee_academiques','annee_academiques.id','inscriptions.annee_academique')
                                 ->join('type_formations','type_formations.id','specialites.type_formation')
                                 ->join('filieres','filieres.id','specialites.filiere')
                                 ->join('orientations','orientations.id','specialites.orientation')
                                 ->select(
                                    '*','inscriptions.id as id',
                                    'filieres.libelle as libelle_filiere','orientations.libelle as libelle_orientation',
                                    'type_formations.libelle as libelle_type_formation','annee_academiques.libelle as libelle_annee_academique',
                                )
                                ->first();
        $var=[
            'inscription'=>$inscription,
            'semestre'=>Repartition_academique::where('id',$request->semestre)->first()
        ];
        $result=SpecialFunction::infos($data,$var);
        return view('Pv_Deliberation.List',$result);
    }

}
