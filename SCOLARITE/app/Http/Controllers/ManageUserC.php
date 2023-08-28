<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;


class ManageUserC extends Controller
{
    public function index(){
        $data=User::where('users.id','<>',auth()->user()->id)
                  ->join('roles','roles.id','users.role')
                  ->select('*','users.id as id')
                  ->get();
        $var=[
            'roles'=>Role::all()
        ];
        $result=SpecialFunction::infos($data,$var);
        return view('Utilisateur.List',$result);
    }

    public function store(Request $request){
        $user= User::where('id',$request->id)->first();
        $user->role=$request->role;
        $user->save();
        return redirect('/utilisateur');
    }

    public function edit($id){
        $user= User::where('id',$request->id)->first();
        $user->delete();
        return redirect('/utilisateur');
    }
}
