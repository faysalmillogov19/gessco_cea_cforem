<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profession;
use App\Http\Controllers\SpecialFunction;

class ProfessionC extends Controller
{
    public function index(){
        $data=Profession::all();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Profession.List',$result);
    }

    public function create(){
        
        $data='';
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Profession.Form',$result);
    }

    public function store(Request $request){
        if($request->id){
            $niv= Profession::where('id', $request->id)->first();
        }
        else{
            $niv= new Profession();
        }
        $result=SpecialFunction::add_element($request, $niv);
        return redirect('/profession');
    }

    public function show($id){
        $data = Profession::where('id',$id)->first();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Profession.Form',$result);
    }

    public function edit($id){
        $niv = Profession::where('id',$id)->first();
        $niv->delete();
        return redirect('/profession');
    }
}
