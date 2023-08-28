<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filiere;
use App\Http\Controllers\SpecialFunction;

class FiliereC extends Controller
{
    public function index(){
        $data=Filiere::all();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Filiere.List',$result);
    }

    public function create(){
        $data='';
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Filiere.Form',$result);
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
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Filiere.Form',$result);
    }

    public function edit($id){
        $niv = Filiere::where('id',$id)->first();
        $niv->delete();
        return redirect('/filiere');
    }

}
