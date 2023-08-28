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


class Search_Modules extends Controller
{
    public function index(){

        $data=[];

        $var=[
            'element_constitutifs'=>Element_constitutif::all(),
            'unite_enseignements'=> unite_enseignement::all(),
            'semestres'=>Repartition_academique::all(),
            'type_formations'=>Type_formation::all(),
            'annee_academiques'=>Annee_academique::all(),
            'filieres'=>Filiere::all(),
            'orientations'=>Orientation::all()
        ];
        $result=SpecialFunction::infos($data,$var);
        return view('search.Search_Module_form',$result);

    }

    public function store(Request $request){

        $data=Specialite::where('specialites.type_formation',$request->type_formation)
                                     //->where('specialites.annee_academique',$request->annee_academique)
                                     ->where('specialites.filiere',$request->filiere)
                                     ->where('specialites.orientation',$request->orientation)
                                     ->select('*','specialites.id as id')
                                     ->first();					
       
        $var=[
            'element_constitutifs'=>Element_constitutif::all(),
            'unite_enseignements'=> unite_enseignement::all(),
            'semestres'=>Repartition_academique::all(),
            'type_formations'=>Type_formation::all(),
            'annee_academiques'=>Annee_academique::all(),
            'filieres'=>Filiere::all(),
            'orientations'=>Orientation::all(),
            'type_formation'=>Type_formation::where('id',$request->type_formation)->first(),
            'filiere'=>Filiere::where('id',$request->filiere)->first(),
            'annee_academique'=>Annee_academique::where('id',$request->annee_academique)->first(),
            'orientation'=>Orientation::where('id',$request->orientation)->first(),
        ];

        if(isset($data)){
            return redirect('specialite_module/'.$data->id);
        }
        //dd($var['orientation']);
        $result=SpecialFunction::infos($data,$var);
        return view('search.Search_Module_form',$result);
    }
}
