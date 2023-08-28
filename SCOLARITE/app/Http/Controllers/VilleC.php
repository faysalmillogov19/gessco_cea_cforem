<?php

namespace App\Http\Controllers;
use App\Models\Ville;
use App\Http\Controllers\SpecialFunction;

use Illuminate\Http\Request;

class VilleC extends Controller
{
    public function index(){
        $data=Ville::all();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Ville.List',$result);
    }

    public function create(){
        
        $data='';
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Ville.Form',$result);
    }

    public function store(Request $request){
        if($request->id){
            $niv= Ville::where('id', $request->id)->first();
        }
        else{
            $niv= new Ville();
        }
        $result=SpecialFunction::add_element($request, $niv);
        return redirect('/ville');
    }

    public function show($id){
        $data = Ville::where('id',$id)->first();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Ville.Form',$result);
    }

    public function edit($id){
        $niv = Ville::where('id',$id)->first();
        $niv->delete();
        return redirect('/ville');
    }
}
