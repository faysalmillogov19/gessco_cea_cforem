<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscription;
use App\Models\Etudiant;
use App\Models\Specialite;
use App\Models\Annee_academique;
use App\Models\Personne;
use App\Models\Type_bourse;
use App\Models\Profession;
use App\Http\Controllers\SpecialFunction;

class InscriptionC extends Controller
{
    public function index(){

    }

    public function show($etudiant){
        $specialites=Specialite::join('type_formations','type_formations.id','specialites.type_formation')
                        ->join('filieres','filieres.id','specialites.filiere')
                        ->join('orientations','orientations.id','specialites.orientation')
                        ->select(
                            '*','specialites.id as id','specialites.code as code',
                            'type_formations.libelle as libelle_type_formation','filieres.libelle as libelle_filiere',
                            'orientations.libelle as libelle_orientation'
                        )
                        ->get();
        $var=[
            'etudiant'=>Etudiant::where('etudiants.id',$etudiant)->join('personnes','personnes.id','etudiants.personne')->first(),
            'specialite'=>$specialites,
            'annee_academique'=>Annee_academique::all()
            
        ];

        $data=Inscription::where('inscriptions.etudiant',$etudiant)
                            ->join('specialites','specialites.id','inscriptions.specialite')
                            ->join('annee_academiques','annee_academiques.id','inscriptions.annee_academique')
                            ->join('type_formations','type_formations.id','specialites.type_formation')
                            ->join('filieres','filieres.id','specialites.filiere')
                            ->join('orientations','orientations.id','specialites.orientation')
                            ->select(
                                '*','inscriptions.id as id','specialites.code as code','annee_academiques.libelle as libelle_annee_academique',
                                'type_formations.libelle as libelle_type_formation','filieres.libelle as libelle_filiere',
                                'orientations.libelle as libelle_orientation'
                            )
                            ->get();

        $result=SpecialFunction::infos($data,$var);
        return view('Inscription.List',$result);
    }

    public function store(Request $request){

        $exist=Inscription::where('specialite',$request->specialite)
                          ->where('annee_academique',$request->annee_academique)
                          ->where('etudiant', $request->etudiant)
                          ->first();
        

        if( isset($exist) ){
            if(isset($request->id) & ($request->id==$exist->id) ){
                $inscription=Inscription::where('id',$request->id)->first();
            }
            else{
                return redirect()->back()->with('alert', 'Erreur : ce étudiant est déjà inscrit pour cette spécialité !');
            }
        }
        else {
            
            $inscription= new Inscription();
            $inscription->code_inscription=date('Y-m-d');
            
        }
        $inscription->specialite=$request->specialite;
        $inscription->annee_academique=$request->annee_academique;        
        $inscription->etudiant=$request->etudiant;
        $inscription->date=$request->date;
        $inscription->save();
        return redirect('inscription/'.$inscription->etudiant);
    }
    public function edit($id){
        $row = Inscription::where('id',$id)->first();
        $row->delete();
        return redirect('inscription/'.$row->etudiant);
    }
}
