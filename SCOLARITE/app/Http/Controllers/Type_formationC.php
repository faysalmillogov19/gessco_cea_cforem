<?php

namespace App\Http\Controllers;
use App\Models\Type_formation;
use App\Http\Controllers\SpecialFunction;

use Illuminate\Http\Request;

class Type_formationC extends Controller
{
    public function index(){
        $data=Type_formation::all();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Type_formation.List',$result);
    }

    public function create(){
        
        $data='';
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Type_formation.Form',$result);
    }

    public function store(Request $request){
        if($request->id){
            $niv= Type_formation::where('id', $request->id)->first();
        }
        else{
            $niv= new Type_formation();
        }
        $result=SpecialFunction::add_element($request, $niv);
        return redirect('/type_formation');
    }

    public function show($id){
        $data = Type_formation::where('id',$id)->first();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('type_formation.Form',$result);
    }

    public function edit($id){
        $niv = Type_formation::where('id',$id)->first();
        $niv->delete();
        return redirect('/type_formation');
    }
}
