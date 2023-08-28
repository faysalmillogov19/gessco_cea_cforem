<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialite;
use App\Models\Niveau;
use App\Models\Filiere;
use App\Models\Annee_academique;
use App\Models\Orientation;
use App\Models\Repartition_academique;
use App\Models\Personne;
use App\Models\Personnel;
use App\Models\Enseignant;
use App\Models\Type_formation;
use App\Models\Element_constitutif;
use App\Models\Unite_enseignement;
use App\Models\Module_specialite;
use App\Models\Affectation_enseignant;
use App\Models\Type_affectation_enseignant;
use App\Models\Statut;
use App\Models\Pay;
use App\Models\Ville;
class Affectation_enseignantC extends Controller
{
    public function index(){

    }

    public function show($id){
        
        $data= Affectation_enseignant::where('affectation_enseignants.module_specialite',$id)
                                ->join('personnes','personnes.id','affectation_enseignants.enseignant')
                                ->join('personnels','personnels.personne','personnes.id')
                                ->join('enseignants','enseignants.personnel','personnels.id')
                                ->join('type_affectation_enseignants','type_affectation_enseignants.id','affectation_enseignants.type_affectation')
                                ->join('statuts','statuts.id','affectation_enseignants.statut')
                                ->join('pays','pays.id','affectation_enseignants.pays')
                                ->join('villes','villes.id','affectation_enseignants.ville')
                                ->select(
                                    '*','affectation_enseignants.id as id','type_affectation_enseignants.libelle as libelle_type_affectation','statuts.libelle as libelle_statut',
                                    'villes.libelle as libelle_ville'
                                )
                                ->get(); 
                    
        $module_specialites=Module_specialite::where('module_specialites.id',$id)
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
                        
         $var=[
                'enseigants'=>Enseignant::join('personnels','personnels.id','enseignants.personnel')
                                        ->join('personnes','personnes.id','personnels.personne')
                                        ->select('*','personnes.id as id')->get(),
                "module_specialite"=> $module_specialites,
                "type_affectation"=> Type_affectation_enseignant::all(),
                "statut"=> Statut::all(),
                "villes"=> Ville::orderBy('libelle')->get(),
                "pays"=> Pay::orderBy('nom_fr_fr')->get()
                
        ];
         $result=SpecialFunction::infos($data,$var);
        return view('Affectation_enseignant.List',$result);
    }
        
    public function store(Request $request){

        $affectation= Affectation_enseignant::where('enseignant',$request->enseignant)
                                            ->where('module_specialite',$request->module_specialite)
                                            ->first();

        if(isset($affectation)){
            
            if(isset($request->id) & ($request->id==$affectation->id) ){
                $affectation= Affectation_enseignant::where('id',$request->id)->first();
            }
            else{
                return redirect()->back()->with('alert', 'Ce enseignant est dejà affecté !');
            }
        }
        else{
            $affectation= new Affectation_enseignant();
        }
        $affectation->module_specialite= $request->module_specialite;
        $affectation->enseignant= $request->enseignant;
        $affectation->type_affectation= $request->type_affectation;
        $affectation->statut= $request->statut;
        $affectation->pays= $request->pays;
        $affectation->ville= $request->ville;
        if($request->date_affectation)
            $affectation->date_affectation= $request->date_affectation;
        if($request->date_arret)
            $affectation->date_arret= $request->date_arret;

        $affectation->save();
        return redirect('affectation_enseignant/'.$request->module_specialite);
        
    }
    public function edit($id){
        $row = Affectation_enseignant::where('id',$id)->first();
        $row->delete();
        return redirect('affectation_enseignant/'.$row->module_specialite);
    
    }
    
}
