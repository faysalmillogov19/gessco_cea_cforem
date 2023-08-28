<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Element_constitutif;
use App\Http\Controllers\SpecialFunction;

class Element_constitutifC extends Controller
{
    public function index(){
        $data=Element_constitutif::all();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Element_constitutif.List',$result);
    }

    public function create(){
        
        $data='';
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Element_constitutif.Form',$result);
    }

    public function store(Request $request){
        if($request->id){
            $niv= Element_constitutif::where('id', $request->id)->first();
        }
        else{
            $niv= new Element_constitutif();
        }
        $result=SpecialFunction::add_element($request, $niv);
        return redirect('/element_constitutif');
    }

    public function show($id){
        $data = Element_constitutif::where('id',$id)->first();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Element_constitutif.Form',$result);
    }

    public function edit($id){
        $niv = Element_constitutif::where('id',$id)->first();
        $niv->delete();
        return redirect('/element_constitutif');
    }

}
