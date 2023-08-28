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
use App\Http\Controllers\SpecialFunction;

class SpecialiteC extends Controller
{
    public function index(){
        
        $var =[];
        
        $data=Specialite::join('type_formations','type_formations.id','specialites.type_formation')
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
                        ->get();
        $result=SpecialFunction::infos($data,$var);
        return view('Specialite.List',$result);
    }

    public function create(){
        $data='';
        $var =[
            'filieres'=> Filiere::all(),
            'specialites'=>Specialite::all(),
            'unite_enseignements'=>Unite_enseignement::all(),
            'orientations'=>Orientation::all(),
            'type_formations'=>Type_formation::all(),
            'enseignants'=>Enseignant::join('personnels','personnels.id','enseignants.personnel')
                              ->join('personnes','personnes.id','personnels.personne')
                              ->select('*','personnes.id as id')->get()
        ];
        
        $result=SpecialFunction::infos($data,$var);
        return view('Specialite.Form',$result);
    }

    public function store(Request $request){

        $instance_specialite= Specialite::where('filiere', $request->filiere)
                                        ->where('type_formation', $request->type_formation)
                                        ->where('orientation', $request->orientation)
                                        ->first();
        
        if( isset($instance_specialite->id) ){
            if( isset($request->id) & ( $request->id == $instance_specialite->id ) ) {
                $spec= Specialite::where('id', $request->id)->first();  
            }
            else{
        
                return redirect()->back() ->with('alert', 'Cette spécialité existe dejà ');                

            }
        }
        else{
            $spec= new Specialite();
        }
        $spec->code=$request->code;
        $spec->description=$request->description;
        $spec->filiere=$request->filiere;
        $spec->type_formation=$request->type_formation;
        $spec->orientation=$request->orientation;
        $spec->responsable=$request->responsable;
        $spec->save();
        
        return redirect('/specialite');
    }

    public function show($id){
        $data=Specialite::where('specialites.id',$id)
                        ->join('type_formations','type_formations.id','specialites.type_formation')
                        ->join('filieres','filieres.id','specialites.filiere')
                        ->join('orientations','orientations.id','specialites.orientation')
                        ->join('personnes','personnes.id','specialites.responsable')
                        ->join('personnels','personnels.personne','personnes.id')
                        ->join('enseignants','enseignants.personnel','personnels.id')
                        ->select(
                            '*','specialites.id as id','specialites.code as code',
                            'type_formations.libelle as libelle_type_formation','filieres.libelle as libelle_filiere',
                            'orientations.libelle as libelle_orientation'
                        )
                        ->first();
                //dd($data);
        $var =[
            'filieres'=> Filiere::all(),
            'specialites'=>Specialite::all(),
            'unite_enseignements'=>Unite_enseignement::all(),
            'orientations'=>Orientation::all(),
            'type_formations'=>Type_formation::all(),
            'enseignants'=>Enseignant::join('personnels','personnels.id','enseignants.personnel')
                                    ->join('personnes','personnes.id','personnels.personne')
                                    ->select('*','personnes.id as id')->get()
        ];
                            
        $result=SpecialFunction::infos($data,$var);
        return view('Specialite.Form',$result);
    }

    public function edit($id){
        $spec = Specialite::where('id',$id)->first();
        $spec->delete();
        return redirect('/specialite');
    }

    
}
