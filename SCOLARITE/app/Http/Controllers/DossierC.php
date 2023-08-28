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
use App\Models\Dossier;
use App\Http\Controllers\SpecialFunction;

class DossierC extends Controller
{
    public function index(){

    }

    public function show($id){

        $data=Dossier::where('personne',$id)
                     ->get();
    
        $var=[
            'personne'=>Personne::where('id',$id)->first(),
        ];
        
        $result=SpecialFunction::infos($data,$var);
        return view('dossier.List',$result);
    }

    public function store(Request $request){
        if($request->id){
            $dossier = Dossier::where('id',$request->id)->first();
        }
        else{
            $dossier = new Dossier();
        }
        
        $dossier->personne=$request->personne;
        $dossier->libelle=$request->libelle;
        if($request->file('fichier')){
            if($dossier->fichier){
                $delete=SpecialFunction::deleteFichier($dossier->fichier);
            }
            $dossier->fichier=SpecialFunction::uploadFichier($request->file('fichier'),"uploads/pieces_jointes/",date("m-d-y-h-i-s") );
        }
        $dossier->save();

        return redirect('dossier/'.$dossier->personne);
    }

    public function edit($id){
        $dossier= Dossier::where('id',$id)->first();
        $delete=SpecialFunction::deleteFichier($dossier->fichier);
        $dossier->delete();
        return redirect('dossier/'.$dossier->personne);
    }
}
