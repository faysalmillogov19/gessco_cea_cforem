<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orientation;
use App\Http\Controllers\SpecialFunction;

class OrientationC extends Controller
{
    public function index(){
        $data=Orientation::all();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Orientation.List',$result);
    }

    public function create(){
        
        $data='';
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Orientation.Form',$result);
    }

    public function store(Request $request){
        if($request->id){
            $niv= Orientation::where('id', $request->id)->first();
        }
        else{
            $niv= new Orientation();
        }
        $result=SpecialFunction::add_element($request, $niv);
        return redirect('/orientation');
    }

    public function show($id){
        $data = Orientation::where('id',$id)->first();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Orientation.Form',$result);
    }

    public function edit($id){
        $niv = Orientation::where('id',$id)->first();
        $niv->delete();
        return redirect('/orientation');
    }
}
