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
use App\Http\Controllers\SpecialFunction;

class Module_specialiteC extends Controller
{
    public function index(){

    }

    public function show($id){

        $data= Module_specialite::where('module_specialites.specialite',$id)
                                ->join('element_constitutifs','element_constitutifs.id','module_specialites.element_constitutif')
                                ->join('unite_enseignements','unite_enseignements.id','module_specialites.unite_enseignement')
                                ->join('repartition_academiques','repartition_academiques.id','module_specialites.semestre')
                                ->select(
                                    '*','module_specialites.id as id','element_constitutifs.libelle as libelle_element_constitutif',
                                    'unite_enseignements.libelle as libelle_unite_enseignement',
                                    'repartition_academiques.libelle as libelle_semestre',
                                    
                                )
                                ->get();
								
								                    
        $specialites=Specialite::where('specialites.id',$id)
                        ->join('type_formations','type_formations.id','specialites.type_formation')
                        ->join('filieres','filieres.id','specialites.filiere')
                        ->join('orientations','orientations.id','specialites.orientation')
                        //->join('personnes','personnes.id','specialites.responsable')
                        //->join('personnels','personnels.personne','personnes.id')
                       // ->join('enseignants','enseignants.personnel','personnels.id')
                        ->select(
                            '*','specialites.id as id','specialites.code as code',
                            'type_formations.libelle as libelle_type_formation','filieres.libelle as libelle_filiere',
                            'orientations.libelle as libelle_orientation'
                        )
                        ->first();

        $semestre=Module_specialite::where('specialite',$id)
                            ->join('repartition_academiques','repartition_academiques.id','module_specialites.semestre')
                            ->select('semestre','specialite','libelle')
                            ->orderBy('libelle')
                         ->distinct()
                        ->get();

        $var=[
            'element_constitutifs'=>Element_constitutif::all(),
            'unite_enseignements'=> unite_enseignement::all(),
            'specialite'=> $specialites,
            'semestres'=>Repartition_academique::all(),
            'semestre'=>$semestre
        ];
        //dd($var['specialite']);
        $result=SpecialFunction::infos($data,$var);
        return view('Affectation_modules.List',$result);
    }

    public function form_specialite_module($specialite){

        $specialites=Specialite::where('specialites.id',$specialite)
                        ->join('type_formations','type_formations.id','specialites.type_formation')
                        ->join('filieres','filieres.id','specialites.filiere')
                        ->join('orientations','orientations.id','specialites.orientation')
                        //->join('personnes','personnes.id','specialites.responsable')
                        //->join('personnels','personnels.personne','personnes.id')
                       // ->join('enseignants','enseignants.personnel','personnels.id')
                        ->select(
                            '*','specialites.id as id','specialites.code as code',
                            'type_formations.libelle as libelle_type_formation','filieres.libelle as libelle_filiere',
                            'orientations.libelle as libelle_orientation'
                        )
                        ->first();
       

        $var=[
            'element_constitutifs'=>Element_constitutif::all(),
            'unite_enseignements'=> unite_enseignement::all(),
            'specialite'=> $specialites,
            'semestres'=>Repartition_academique::all(),
        ];
        
        $result=SpecialFunction::infos([],$var);
        return view('Affectation_modules.Form',$result);
    
    }

    public function store(Request $request){

       $instance_module= Module_specialite::where('specialite',$request->specialite)
                                            ->where('semestre',$request->semestre)
                                            ->where('unite_enseignement',$request->unite_enseignement)
                                            ->where('element_constitutif',$request->element_constitutif)
                                          ->first();

                                          
        if( isset($instance_module) ){

            if( isset($request->id) & ($request->id==$instance_module->id) ){
                $module=Module_specialite::where('id',$request->id)->first();
            }
            else{
                return redirect()->back()->with('alert', 'Ce module existe dejà !');
            }

        }
        else{
            $module= new Module_specialite();
        }
        $module->specialite=$request->specialite;
        $module->element_constitutif=$request->element_constitutif;
        $module->unite_enseignement=$request->unite_enseignement;
        $module->semestre=$request->semestre;
        $module->credit=$request->credit;
        $module->theorie=$request->theorie;
        $module->td=$request->td;
        $module->tp=$request->tp;
        $module->observation=$request->observation;
        $module->date_arret=$request->date_arret;
        $module->save();
        return redirect('specialite_module/'.$request->specialite);
    }

    public function edit($id){
        $row = Module_specialite::where('id',$id)->first();
        $row->delete();
        return redirect('specialite_module/'.$row->specialite);
    }

    public function filtre($id, $semestre){

        $data= Module_specialite::where('module_specialites.specialite',$id)
                                ->where('module_specialites.semestre',$semestre)
                                ->join('element_constitutifs','element_constitutifs.id','module_specialites.element_constitutif')
                                ->join('unite_enseignements','unite_enseignements.id','module_specialites.unite_enseignement')
                                ->join('repartition_academiques','repartition_academiques.id','module_specialites.semestre')
                                ->select(
                                    '*','module_specialites.id as id','element_constitutifs.libelle as libelle_element_constitutif',
                                    'unite_enseignements.libelle as libelle_unite_enseignement',
                                    'repartition_academiques.libelle as libelle_semestre',
                                    
                                )
                                ->get();
								
								
                    
        $specialites=Specialite::where('specialites.id',$id)
                        ->join('type_formations','type_formations.id','specialites.type_formation')
                        ->join('filieres','filieres.id','specialites.filiere')
                        ->join('orientations','orientations.id','specialites.orientation')
                        ->select(
                            '*','specialites.id as id','specialites.code as code',
                            'type_formations.libelle as libelle_type_formation','filieres.libelle as libelle_filiere',
                            'orientations.libelle as libelle_orientation'
                        )
                        ->first();

        $semestre=Module_specialite::where('specialite',$id)
                        ->join('repartition_academiques','repartition_academiques.id','module_specialites.semestre')
                        ->select('semestre','specialite','libelle')
                        ->distinct()
                        ->orderBy('libelle')
                        ->get();

        $var=[
            'element_constitutifs'=>Element_constitutif::all(),
            'unite_enseignements'=> unite_enseignement::all(),
            'specialite'=> $specialites,
            'semestres'=>Repartition_academique::all(),
            'semestre'=>$semestre
        ];
        //dd($var['specialite']);
        $result=SpecialFunction::infos($data,$var);
        return view('Affectation_modules.List',$result);

    }

}
