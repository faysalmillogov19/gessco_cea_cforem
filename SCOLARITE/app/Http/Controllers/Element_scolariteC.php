<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Niveau;
use App\Models\Type_element_scolarite;
use App\Models\Element_scolarite;
use App\Http\Controllers\SpecialFunction;

class Element_scolariteC extends Controller
{
    public function index(){
        $data=Element_scolarite::join('type_element_scolarites','type_element_scolarites.id','element_scolarites.type_element_scolarite')
                        ->select('*','element_scolarites.id as id','element_scolarites.libelle as libelle','element_scolarites.code as code', 'element_scolarites.description as description', 'type_element_scolarites.libelle as libelle_type_element')
                        ->get();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Element_scolarite.List',$result);
    }

    public function create(){
        $data='';
        $var=[
            'type_element_scolarites'=>Type_element_scolarite::all()
        ];
        
        $result=SpecialFunction::infos($data,$var);
        return view('Element_scolarite.Form',$result);
    }

    public function store(Request $request){
        if($request->id){
            $spec= Element_scolarite::where('id', $request->id)->first();
        }
        else{
            $spec= new Element_scolarite();
        }
        $spec->libelle=$request->libelle;
        $spec->code=$request->code;
        $spec->description=$request->description;
        $spec->type_element_scolarite=$request->type_element_scolarite;
        $spec->save();
        
        return redirect('/element_scolarite');
    }

    public function show($id){
        $data = Element_scolarite::where('element_scolarites.id', $id)
                            ->join('type_element_scolarites','type_element_scolarites.id','element_scolarites.Type_element_scolarite')
                            ->select('*','element_scolarites.id as id','element_scolarites.libelle as libelle','element_scolarites.code as code', 'element_scolarites.description as description', 'type_element_scolarites.libelle as libelle_type_element')
                            ->first();
                           
        $var=[
                'type_element_scolarites'=>Type_element_scolarite::all()
        ];
                            
        $result=SpecialFunction::infos($data,$var);
        return view('Element_scolarite.Form',$result);
    }

    public function edit($id){
        $spec = Element_scolarite::where('id',$id)->first();
        $spec->delete();
        return redirect('/element_scolarite');
    }
}
