<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type_piece;
use App\Http\Controllers\SpecialFunction;

class Type_pieceC extends Controller
{
    public function index(){
        $data=Type_piece::all();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Type_piece.List',$result);
    }

    public function create(){
        
        $data='';
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Type_piece.Form',$result);
    }

    public function store(Request $request){
        if($request->id){
            $niv= Type_piece::where('id', $request->id)->first();
        }
        else{
            $niv= new Type_piece();
        }
        $result=SpecialFunction::add_element($request, $niv);
        return redirect('/type_piece');
    }

    public function show($id){
        $data = Type_piece::where('id',$id)->first();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Type_piece.Form',$result);
    }

    public function edit($id){
        $niv = Type_piece::where('id',$id)->first();
        $niv->delete();
        return redirect('/type_piece');
    }
}
