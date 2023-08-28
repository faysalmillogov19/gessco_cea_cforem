<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Repartition_academique;
use App\Http\Controllers\SpecialFunction;

class Repartition_academiqueC extends Controller
{
    public function index(){
        $data=Repartition_academique::all();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Repartition_academique.List',$result);
    }

    public function create(){
        
        $data='';
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Repartition_academique.Form',$result);
    }

    public function store(Request $request){
        if($request->id){
            $annee= Repartition_academique::where('id', $request->id)->first();
        }
        else{
            $annee= new Repartition_academique();
        }
        $result=SpecialFunction::add_element($request, $annee);
        return redirect('/repartition_academique');
    }

    public function show($id){
        $data = Repartition_academique::where('id',$id)->first();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Repartition_academique.Form',$result);
    }

    public function edit($id){
        $annee = Repartition_academique::where('id',$id)->first();
        $annee->delete();
        return redirect('/repartition_academique');
    }
}
