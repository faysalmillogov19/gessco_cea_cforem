<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Niveau;
use App\Http\Controllers\SpecialFunction;

class NiveauxC extends Controller
{
    public function index(){
        $data=Niveau::all();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('NiveauX.List',$result);
    }

    public function create(){
        
        $data='';
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('NiveauX.Form',$result);
    }

    public function store(Request $request){
        if($request->id){
            $niv= Niveau::where('id', $request->id)->first();
        }
        else{
            $niv= new Niveau();
        }
        $result=SpecialFunction::add_element($request, $niv);
        return redirect('/niveaux');
    }

    public function show($id){
        $data = Niveau::where('id',$id)->first();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Niveaux.Form',$result);
    }

    public function edit($id){
        $niv = Niveau::where('id',$id)->first();
        $niv->delete();
        return redirect('/niveaux');
    }
}
