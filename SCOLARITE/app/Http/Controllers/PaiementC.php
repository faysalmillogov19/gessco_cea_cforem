<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paiement;
use App\Models\Inscription;
use App\Models\Frais_inscription;
use App\Models\Etudiant;
use App\Models\Specialite;
use App\Models\Annee_academique;
use App\Models\Personne;
use App\Models\Type_bourse;
use App\Models\Profession;
use App\Http\Controllers\SpecialFunction;
class PaiementC extends Controller
{
    public function index(){

    }

    public function show($id){
        
        $inscription=SpecialFunction::inscription_exacte($id);
        $frais_inscription=SpecialFunction::frais_inscription_exacte($inscription->specialite, $inscription);
        $var=[
            'inscription'=>$inscription,
            'frais_inscription'=>$frais_inscription
        ];
        //dd($frais_inscription);
        $data=Paiement::where('inscription',$id)->get();

        $result=SpecialFunction::infos($data,$var);
        return view('Paiement.List',$result);
    }

    public function store(Request $request){
        $somme_paye=Paiement::where('inscription',$request->inscription)->sum('montant');
        $somme_paye=$somme_paye+($request->montant*$request->type_paiement);

        $inscription=SpecialFunction::inscription_exacte($request->inscription);
        $frais_inscription=SpecialFunction::frais_inscription_exacte($inscription->specialite, $inscription);
        $frais_inscription=$frais_inscription[1];

        $reste=$frais_inscription-$somme_paye;
        
        if($reste>=0 & $reste<=$frais_inscription){
            $paiement = new Paiement();
            $paiement->inscription=$request->inscription;        
            $paiement->montant=$request->montant*$request->type_paiement;
            $paiement->date=$request->date;
            $paiement->save();
        }
        
        return redirect('paiement/'.$request->inscription);
    }
}
