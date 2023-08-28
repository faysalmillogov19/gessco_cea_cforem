<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unite_enseignement;
use App\Http\Controllers\SpecialFunction;

class Unite_enseignementC extends Controller
{
    public function index(){
        $data=Unite_enseignement::all();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Unite_enseignement.List',$result);
    }

    public function create(){
        
        $data='';
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Unite_enseignement.Form',$result);
    }

    public function store(Request $request){
        if($request->id){
            $niv= Unite_enseignement::where('id', $request->id)->first();
        }
        else{
            $niv= new Unite_enseignement();
        }
        $result=SpecialFunction::add_element($request, $niv);
        return redirect('/unite_enseignement');
    }

    public function show($id){
        $data = Unite_enseignement::where('id',$id)->first();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Unite_enseignement.Form',$result);
    }

    public function edit($id){
        $niv = Unite_enseignement::where('id',$id)->first();
        $niv->delete();
        return redirect('/unite_enseignement');
    }
    
}
