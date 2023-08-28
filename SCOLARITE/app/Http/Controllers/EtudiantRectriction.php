<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Http\Controllers\EtudiantC;
use App\Http\Controllers\InscriptionC;

use App\Http\Controllers\SpecialFunction;


class EtudiantRectriction extends Controller
{
    public function getInfo(){
    
        $personne=auth()->user()->personne;
        
            $exist=Etudiant::where('personne',$personne)->first();
            
            if(isset($exist)){
                return EtudiantC::show($personne);
            }
            
            $result=SpecialFunction::infos([],[]);
            return view('error',$result);
        
    }

    public function Inscription(){
        $personne=auth()->user()->personne;
        
            $exist=Etudiant::where('personne',$personne)->first();
            
            if(isset($exist)){
                return InscriptionC::show($exist->id);
            }
            
            $result=SpecialFunction::infos([],[]);
            return view('error',$result);
    }
}
