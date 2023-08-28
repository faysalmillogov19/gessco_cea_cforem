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
use App\Http\Controllers\SpecialFunction;

class NoteC extends Controller
{
    public function index(){

    }

    public function show($id){
        
        $inscription=SpecialFunction::inscription_exacte($id);
        $semestres=Module_specialite::where('specialite',$inscription->specialite)
                                   ->join('repartition_academiques','repartition_academiques.id','module_specialites.semestre')
                                    ->select('semestre','specialite','libelle')
                                    ->distinct()
                                    ->get();
    
        $var=[
            'inscription'=>$inscription,
            'semestres'=>$semestres
        ];
        
        $data=SpecialFunction::getNote($inscription);
        
        $result=SpecialFunction::infos($data,$var);
        return view('Note.List',$result);
    }

    public function store(Request $request){
        $note=Note::where('inscription',$request->inscription)->where('module_specialite',$request->module_specialite)->first();
        if(!isset($note->id) ){
            $note = new Note();
        }
        $note->inscription=$request->inscription;
        $note->module_specialite=$request->module_specialite;
        $note->note=$request->note;
        $note->save();
             
        return redirect('note/'.$request->inscription);
    }

    public function filtre($id, $semestre){
        $inscription=SpecialFunction::inscription_exacte($id);
        $semestres=Module_specialite::where('specialite',$inscription->specialite)
                                    ->join('repartition_academiques','repartition_academiques.id','module_specialites.semestre')
                                    ->select('semestre','specialite','libelle')
                                    ->distinct()
                                    ->get();
    
        $var=[
            'inscription'=>$inscription,
            'semestres'=>$semestres
        ];
        $inscription->semestre=$semestre;
        $data=SpecialFunction::getNote($inscription);
        
        $result=SpecialFunction::infos($data,$var);
        return view('Note.List',$result);
    }

}
