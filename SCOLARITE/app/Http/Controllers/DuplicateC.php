<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DuplicateC extends Controller
{
    public function index(){
        $data=Filiere::all();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Filiere.List',$result);
    }

    public function create($table){
        return view('Filiere.Form');
    }

    public function store(Request $request){
        if($request->id){
            $niv= Filiere::where('id', $request->id)->first();
        }
        else{
            $niv= new Filiere();
        }
        $result=SpecialFunction::add_element($request, $niv);
        return redirect('/filiere');
    }

    public function show($id){
        $data = Filiere::where('id',$id)->first();
        return view('Filiere.Form',compact('data'));
    }

    public function edit($id){
        $niv = Filiere::where('id',$id)->first();
        $niv->delete();
        return redirect('/filiere');
    }
}
