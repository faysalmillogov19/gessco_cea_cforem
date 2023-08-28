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

class Module_specialite_noteC extends Controller
{
    public function index(){

    }

    public function show($id){

    }

    public function getModuleNote($id_module_specialite, $id_annee_academique){

		
		$module_specialites=Module_specialite::where('module_specialites.id',$id_module_specialite)
                        ->join('element_constitutifs','element_constitutifs.id','module_specialites.element_constitutif')
                        ->join('unite_enseignements','unite_enseignements.id','module_specialites.unite_enseignement')
                        ->join('repartition_academiques','repartition_academiques.id','module_specialites.semestre')
                        ->join('specialites','specialites.id','module_specialites.specialite')
                        ->join('type_formations','type_formations.id','specialites.type_formation')
                        ->join('filieres','filieres.id','specialites.filiere')
                        ->join('orientations','orientations.id','specialites.orientation')
                        ->select(
                            '*','specialites.code as code',
                            'type_formations.libelle as libelle_type_formation','filieres.libelle as libelle_filiere',
                            'orientations.libelle as libelle_orientation','specialites.id as id_specialite',
                            'module_specialites.id as id','element_constitutifs.libelle as libelle_element_constitutif',
                            'unite_enseignements.libelle as libelle_unite_enseignement',
                            'repartition_academiques.libelle as libelle_semestre',
                        )
                        ->first();
		
		$inscriptions=	Inscription::where('inscriptions.specialite',$module_specialites->specialite)
                          ->where('inscriptions.annee_academique',$id_annee_academique)
						   ->join('etudiants','etudiants.id','inscriptions.etudiant')
						   ->join('personnes','personnes.id','etudiants.personne')
						   ->join('pays','pays.id','personnes.nationalite')
						   ->select(
								'*','inscriptions.id as id'
							)
						   ->get();
		
        $data= SpecialFunction::getModuleNotes($inscriptions,$module_specialites);
                        
         $var=[
                'enseigants'=>Enseignant::join('personnels','personnels.id','enseignants.personnel')
                                        ->join('personnes','personnes.id','personnels.personne')
                                        ->select('*','personnes.id as id')->get(),
                "module_specialite"=> $module_specialites,
                'annee_academique'=>Annee_academique::where('id',$id_annee_academique)->first(),
                "type_affectation"=> Type_affectation_enseignant::all(),
                "statut"=> Statut::all(),
                "villes"=> Ville::all(),
                "pays"=> Pay::all()
                
        ];
         $result=SpecialFunction::infos($data,$var);
        return view('Module_specialite_note.List',$result);
    }
        
    public function store(Request $request){
        
        $note=SpecialFunction::changeNote($request);
        $inscription=Inscription::where('id',$request->inscription)->first();
        return redirect('module_specialite_note/'.$request->module_specialite.'/'.$inscription->annee_academique);
        
    }

    public function edit($id){
        $row = Affectation_enseignant::where('id',$id)->first();
        $row->delete();
        return redirect('module_specialite_note/'.$row->module_specialite);
    
    }
    
}
