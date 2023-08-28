<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type_bourse;
use App\Models\Reponse_binaire;
use App\Http\Controllers\SpecialFunction;

class Type_bourseC extends Controller
{
    public function index(){
        $data=Type_bourse::join('reponse_binaires','reponse_binaires.id','type_bourses.total')
                          ->select('type_bourses.id as id','type_bourses.libelle as libelle','type_bourses.code as code','type_bourses.description as description','reponse_binaires.libelle as libelle_binaire')
                          ->get();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Type_bourse.List',$result);
    }

    public function create(){
        $data='';
        $var=['bool'=>Reponse_binaire::all()];
        $result=SpecialFunction::infos($data,$var);
        return view('Type_bourse.Form',$result);
    }

    public function store(Request $request){
        if($request->id){
            $niv= Type_bourse::where('id', $request->id)->first();
        }
        else{
            $niv= new Type_bourse();
        }
        $niv->libelle=$request->libelle;
        $niv->code=$request->code;
        $niv->description=$request->description;
        $niv->total=(int) $request->total;
        $niv->save();
        return redirect('/type_bourse');
    }

    public function show($id){
        $data = Type_bourse::where('type_bourses.id',$id)
                            ->join('reponse_binaires','reponse_binaires.id','type_bourses.total')
                            ->select('type_bourses.id as id','type_bourses.libelle as libelle','type_bourses.total as total','type_bourses.code as code','type_bourses.description as description','reponse_binaires.libelle as libelle_binaire')
                            ->first();
        $var=['bool'=>Reponse_binaire::all()];
        $result=SpecialFunction::infos($data,$var);
        return view('Type_bourse.Form',$result);
    }

    public function edit($id){
        $niv = Type_bourse::where('id',$id)->first();
        $niv->delete();
        return redirect('/type_bourse');
    }
}
