<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type_element_scolarite;
use App\Http\Controllers\SpecialFunction;

class Type_element_scolariteC extends Controller
{
    public function index(){
        $data=Type_element_scolarite::all();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Type_element_scolarite.List',$result);
    }

    public function create(){
        
        $data='';
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Type_element_scolarite.Form',$result);
    }

    public function store(Request $request){
        if($request->id){
            $niv= Type_element_scolarite::where('id', $request->id)->first();
        }
        else{
            $niv= new Type_element_scolarite();
        }
        $result=SpecialFunction::add_element($request, $niv);
        return redirect('/type_element_scolarite');
    }

    public function show($id){
        $data = Type_element_scolarite::where('id',$id)->first();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Type_element_scolarite.Form',$result);
    }

    public function edit($id){
        $niv = Type_element_scolarite::where('id',$id)->first();
        $niv->delete();
        return redirect('/type_element_scolarite');
    }
}
