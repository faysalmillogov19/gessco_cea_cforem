<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type_enseignant;
use App\Http\Controllers\SpecialFunction;

class Type_enseignantC extends Controller
{
    public function index(){
        $data=Type_enseignant::all();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Type_enseignant.List',$result);
    }

    public function create(){
        
        $data='';
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Type_enseignant.Form',$result);
    }

    public function store(Request $request){
        if($request->id){
            $niv= Type_enseignant::where('id', $request->id)->first();
        }
        else{
            $niv= new Type_enseignant();
        }
        $result=SpecialFunction::add_element($request, $niv);
        return redirect('/type_enseignant');
    }

    public function show($id){
        $data = Type_enseignant::where('id',$id)->first();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('/type_enseignant.Form',$result);
    }

    public function edit($id){
        $niv = Type_enseignant::where('id',$id)->first();
        $niv->delete();
        return redirect('/type_enseignant');
    }
}
