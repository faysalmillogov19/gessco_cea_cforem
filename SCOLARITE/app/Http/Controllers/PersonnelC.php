<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnel;
use App\Models\Sexe;
use App\Models\Groupe_sanguin;
use App\Models\Personne;
use App\Models\Profession;
use App\Models\Pay;
use App\Models\Type_piece;
use App\Models\Situation_matrimoniale;
use App\Http\Controllers\SpecialFunction;

class PersonnelC extends Controller
{
    public function index(){
        
        $data=Personnel::where('profession','!=',0)
                        ->join('personnes','personnes.id','personnels.personne')
                        ->join('professions','professions.id','personnels.profession')
                        ->select('*','Personnels.id as id','professions.libelle as libelle_profession')
                        ->get();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Personnel.List',$result);
    }

    public function create(){
        
        $data='';
        $var=[
            'pays'=>Pay::orderBy('nom_fr_fr')->get(),
            'type_piece'=>Type_piece::all(),
            'sexe'=> Sexe::all(),
            'groupe_sanguin'=>Groupe_sanguin::all(),
            'profession'=>Profession::all(),
            'situation_matrimoniales'=>Situation_matrimoniale::all()
        ];
        $result=SpecialFunction::infos($data,$var);
        return view('Personnel.Form',$result);
    }

    public function store(Request $request){
        if($request->id){
            $personnel= Personnel::where('id', $request->id)->first();
            $personne=Personne::where('id',$personnel->personne)->first();
        }
        else{
            $Personnel= new Personnel();
            $personne= new Personne();
            $personnel=new Personnel();
        }

        $personne->nom_complet=$request->nom_complet;
        $personne->date_naissance=$request->date_naissance;
        $personne->lieu_naissance=$request->lieu_naissance;
        $personne->sexe=$request->sexe;
        $personne->nationalite=$request->nationalite;
        $personne->adresse=$request->adresse;
        $personne->email=$request->email;
        $personne->telephone1=$request->telephone1;
        $personne->telephone2=$request->telephone2;
        $personne->groupe_sanguin=$request->groupe_sanguin;
        $personne->type_piece=$request->type_piece;
        $personne->num_piece=$request->num_piece;
        $personne->date_etablissement=$request->date_etablissement;
        $personne->date_expire=$request->date_expire;
        $personne->lieu_etablissement=$request->lieu_etablissement;

        if($request->file('photo')){
                if($personne->photo){
                    $delete=SpecialFunction::deleteFichier($personne->photo);
                }
                $personne->photo=SpecialFunction::uploadFichier($request->file('photo'),"uploads/personnes/photos/",date("m-d-y-h-i-s") );
        }

        $personne->save();
        
        $personnel->personne=$personne->id;
        $personnel->num_cnss=$request->num_cnss;
        $personnel->profession=$request->profession;
        $personnel->situation_matrimoniale=$request->situation_matrimoniale;
        $personnel->enfant=$request->enfant;
        $personnel->save();



        return redirect('/personnel');
    }

    public function show($id){
        $data = Personnel::where('personnels.id',$id)
                        ->join('personnes','personnes.id','personnels.personne')
                        ->join('sexes','sexes.id','personnes.sexe')
                        ->join('pays','pays.id','personnes.nationalite')
                        ->join('type_pieces','type_pieces.id','personnes.type_piece')
                        ->join('groupe_sanguins','groupe_sanguins.id','personnes.groupe_sanguin')
                        ->join('professions','professions.id','personnels.profession')
                        ->join('situation_matrimoniales','situation_matrimoniales.id','personnels.situation_matrimoniale')
                        ->select(
                            '*','Personnels.id as id','sexes.libelle as libelle_sexe','type_pieces.libelle as libelle_type_piece',
                            'groupe_sanguins.libelle as libelle_groupe_sanguin',
                            'professions.libelle as libelle_profession',
                            'situation_matrimoniales.libelle as libelle_situation_matrimoniale'
                        )
                        ->first();
        $var=[
            'pays'=>Pay::all(),
            'type_piece'=>Type_piece::all(),
            'sexe'=> Sexe::all(),
            'groupe_sanguin'=>Groupe_sanguin::all(),
            'profession'=>Profession::all(),
            'situation_matrimoniales'=>Situation_matrimoniale::all()
        ];
        $result=SpecialFunction::infos($data,$var);
        return view('Personnel.Form',$result);
    }

    public function edit($id){
        $Personnel = Personnel::where('id',$id)->first();
        $personnel = Personnel::where('id',$Personnel->personnel)->first();
        $personne = Personne::where('id',$personnel->personne)->first();
        if($personne->photo){
            $delete=SpecialFunction::deleteFichier($personne->photo);
        }
        $Personnel->delete();
        $personne->delete();
        $personnel->delete();
        return redirect('/personnel');
    }
    
}
