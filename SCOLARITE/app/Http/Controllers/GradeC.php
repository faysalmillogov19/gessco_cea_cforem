<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Http\Controllers\SpecialFunction;

class GradeC extends Controller
{
    public function index(){
        $data=Grade::all();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Grade.List',$result);
    }

    public function create(){
        
        $data='';
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Grade.Form',$result);
    }

    public function store(Request $request){
        if($request->id){
            $niv= Grade::where('id', $request->id)->first();
        }
        else{
            $niv= new Grade();
        }
        $result=SpecialFunction::add_element($request, $niv);
        return redirect('/grade');
    }

    public function show($id){
        $data = Grade::where('id',$id)->first();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Grade.Form',$result);
    }

    public function edit($id){
        $niv = Grade::where('id',$id)->first();
        $niv->delete();
        return redirect('/grade');
    }
}
