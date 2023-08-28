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
use App\Models\Element_scolarite;
use App\Models\Unite_enseignement;
use App\Models\Frais_inscription;
use App\Models\Affectation_enseignant;
use App\Http\Controllers\SpecialFunction;

class Frais_inscriptionC extends Controller
{
    public function index(){

    }

    public function show($id){

        $data= Frais_inscription::where('frais_inscriptions.specialite',$id)
                                ->join('element_scolarites','element_scolarites.id','frais_inscriptions.element_scolarite')
                                ->join('type_element_scolarites','type_element_scolarites.id','element_scolarites.type_element_scolarite')
                                ->select(
                                    '*','frais_inscriptions.id as id','element_scolarites.libelle as libelle_element_scolarite',
                                    'type_element_scolarites.libelle as libelle_type','element_scolarite'
                                    
                                )
                                ->get();
                    
        $specialites=Specialite::where('specialites.id',$id)
                        ->join('type_formations','type_formations.id','specialites.type_formation')
                        ->join('filieres','filieres.id','specialites.filiere')
                        ->join('orientations','orientations.id','specialites.orientation')
                        //->join('personnes','personnes.id','specialites.responsable')
                        //->join('personnels','personnels.personne','personnes.id')
                        //->join('enseignants','enseignants.personnel','personnels.id')
                        ->select(
                            '*','specialites.id as id','specialites.code as code',
                            'type_formations.libelle as libelle_type_formation','filieres.libelle as libelle_filiere',
                            'orientations.libelle as libelle_orientation'
                        )
                        ->first();

        $var=[
            'element_scolarites'=>Element_scolarite::all(),
            'specialite' =>$specialites
        ];
        $result=SpecialFunction::infos($data,$var);
        return view('Frais_inscription.List',$result);
    }

    public function store(Request $request){

        $instance=Frais_inscription::where('specialite',$request->specialite)
                                   ->where('element_scolarite', $request->element_scolarite)
                                   ->first();

        

        if(isset($instance)){
            if(isset($request->id) & ($request->id==$instance->id) ){
                $module=Frais_inscription::where('id',$request->id)->first();
            }
            else{
                
                return redirect()->back()->with('alert', 'Erreur : ce élément existe dejà !');
            }
        }
        else{
            $module= new Frais_inscription();
        }
        $module->specialite=$request->specialite;
        $module->element_scolarite=$request->element_scolarite;
        $module->montant_etudiant_uemoa=$request->montant_etudiant_uemoa;
        $module->montant_salarie_uemoa=$request->montant_salarie_uemoa;
        $module->montant_etudiant_autre=$request->montant_etudiant_autre;
        $module->montant_boursier_total=$request->montant_boursier_total;
        $module->montant_boursier_partiel=$request->montant_boursier_partiel;
        $module->save();
        return redirect('frais_inscription/'.$request->specialite);
    }

    public function edit($id){
        $row = Frais_inscription::where('id',$id)->first();
        $row->delete();
        return redirect('frais_inscription/'.$row->specialite);
    }
}
