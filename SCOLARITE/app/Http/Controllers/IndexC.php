<?php

namespace App\Http\Controllers;
use App\Models\Etudiant;
use App\Models\Enseignant;
use App\Models\Specialite;


use Illuminate\Http\Request;

class IndexC extends Controller
{
    public function index(){
        $var=[
            'etudiants'=>Etudiant::all(),
            'enseignants'=>Enseignant::all(),
            'specialites'=>Specialite::all()
        ];
        $data=[];
        $result=SpecialFunction::infos($data,$var);
        return view('index',$result);
    }
}
