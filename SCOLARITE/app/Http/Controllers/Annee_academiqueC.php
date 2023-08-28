<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annee_academique;
use App\Http\Controllers\SpecialFunction;

class Annee_academiqueC extends Controller
{
    public function index(){
        $data=Annee_academique::all();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Annee_academique.List',$result);
    }

    public function create(){
        
        $data='';
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Annee_academique.Form',$result);
    }

    public function store(Request $request){
        if($request->id){
            $annee= Annee_academique::where('id', $request->id)->first();
        }
        else{
            $annee= new Annee_academique();
        }
        $result=SpecialFunction::add_element($request, $annee);
        return redirect('/annee_academique');
    }

    public function show($id){
        $data = Annee_academique::where('id',$id)->first();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Annee_academique.Form',$result);
    }

    public function edit($id){
        $annee = Annee_academique::where('id',$id)->first();
        $annee->delete();
        return redirect('/annee_academique');
    }
}
