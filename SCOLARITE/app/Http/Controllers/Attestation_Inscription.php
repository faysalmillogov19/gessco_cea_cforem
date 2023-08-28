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


class Attestation_Inscription extends Controller
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
            'specialites'=>$specialites
        ];
        $result=SpecialFunction::infos($data,$var);
        return view('Attestation_Inscription.Search',$result);
    }

    public function store(Request $request){
        
        $inscription= Etudiant::where('etudiants.matricule', $request->matricule)
                              ->join('inscriptions','inscriptions.etudiant','etudiants.id')
                              ->where('inscriptions.specialite',$request->specialite)
                              ->where('inscriptions.annee_academique',$request->annee_academique)
                              ->select('inscriptions.id as id_inscription')
                              ->first();
        
        if( isset($inscription) ){
            return self::show($inscription->id_inscription);
        }
        else{
            return redirect()->back()->with('alert', "Erreur : Element inexistant !");
        }
    }

    public function show($id){
        $data=Inscription::where('inscriptions.id',$id)
                                ->join('etudiants','etudiants.id','inscriptions.etudiant')
                                ->join('annee_academiques','annee_academiques.id','inscriptions.annee_academique')
                                ->join('specialites','specialites.id','inscriptions.specialite')
                                ->join('personnes','personnes.id','etudiants.personne')
                                ->join('pays','pays.id','personnes.nationalite')
                                ->join('type_formations','type_formations.id','specialites.type_formation')
                                ->join('orientations','orientations.id','specialites.orientation')
                                ->join('filieres','filieres.id','specialites.filiere')
                                ->select(
                                        '*','inscriptions.id as id','inscriptions.specialite','inscriptions.annee_academique','personnes.nom_complet',
                                        'etudiants.matricule','annee_academiques.libelle as libelle_annee_academique','type_formations.libelle as libelle_type_formation',
                                        'orientations.libelle as libelle_orientation',
                                        'filieres.libelle as libelle_filiere'
                                )
                                ->first();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Attestation_Inscription.List',$result);
    }
}
