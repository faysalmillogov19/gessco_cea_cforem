<?php

namespace App\Http\Controllers;
use App\Models\Enseignant;
use App\Models\Sexe;
use App\Models\Groupe_sanguin;
use App\Models\Personne;
use App\Models\Personnel;
use App\Models\Grade;
use App\Models\Profession;
use App\Models\Pay;
use App\Models\Type_piece;
use App\Models\Type_enseignant;
use App\Models\Situation_matrimoniale;
use App\Http\Controllers\SpecialFunction;

use Illuminate\Http\Request;

class EnseignantC extends Controller
{
    public function index(){
        
        $data=Enseignant::join('personnels','personnels.id','enseignants.personnel')
                        ->join('personnes','personnes.id','personnels.personne')
                        ->join('grades','grades.id','enseignants.grade')
                        ->join('type_enseignants','type_enseignants.id','enseignants.type_enseignant')
                        ->select('*','enseignants.id as id','type_enseignants.libelle as libelle_type_enseignant','grades.libelle as libelle_grade')
                        ->get();
        $var=[];
        $result=SpecialFunction::infos($data,$var);
        return view('Enseignant.List',$result);
    }

    public function create(){
        
        $data='';
        $var=[
            'pays'=>Pay::orderBy('nom_fr_fr')->get(),
            'type_piece'=>Type_piece::all(),
            'sexe'=> Sexe::all(),
            'groupe_sanguin'=>Groupe_sanguin::all(),
            'profession'=>Profession::all(),
            'grades'=>Grade::all(),
            'type_enseignants'=>Type_enseignant::all(),
            'situation_matrimoniales'=>Situation_matrimoniale::all()
        ];
        $result=SpecialFunction::infos($data,$var);
        return view('Enseignant.Form',$result);
    }

    public function store(Request $request){
        if($request->id){
            $Enseignant= Enseignant::where('id', $request->id)->first();
            $personnel=Personnel::where('id',$Enseignant->personnel)->first();
            $personne=Personne::where('id',$personnel->personne)->first();
        }
        else{
            $Enseignant= new Enseignant();
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
        $personnel->profession=0;
        $personnel->situation_matrimoniale=$request->situation_matrimoniale;
        $personnel->enfant=$request->enfant;
        $personnel->save();


        $Enseignant->personnel=$personnel->id;
        $Enseignant->grade=$request->grade;
        $Enseignant->type_enseignant=$request->type_enseignant;
        $Enseignant->num_autorisation_enseigner=$request->num_autorisation_enseigner;
        $Enseignant->date_autorisation_enseigner=$request->date_autorisation_enseigner;
        $Enseignant->save();


        return redirect('/enseignant');
    }

    public function show($id){
        $data = Enseignant::where('enseignants.id',$id)
                        ->join('personnels','personnels.id','enseignants.personnel')
                        ->join('personnes','personnes.id','personnels.personne')
                        ->join('sexes','sexes.id','personnes.sexe')
                        ->join('pays','pays.id','personnes.nationalite')
                        ->join('type_pieces','type_pieces.id','personnes.type_piece')
                        ->join('groupe_sanguins','groupe_sanguins.id','personnes.groupe_sanguin')
                        ->join('grades','grades.id','enseignants.grade')
                        ->join('type_enseignants','type_enseignants.id','enseignants.type_enseignant')
                        ->join('situation_matrimoniales','situation_matrimoniales.id','personnels.situation_matrimoniale')
                        ->select(
                            '*','Enseignants.id as id','sexes.libelle as libelle_sexe','type_pieces.libelle as libelle_type_piece',
                            'groupe_sanguins.libelle as libelle_groupe_sanguin',
                            'grades.libelle as libelle_grade','type_enseignants.libelle as libelle_type_enseignant',
                            'situation_matrimoniales.libelle as libelle_situation_matrimoniale'
                        )
                        ->first();
        $var=[
            'pays'=>Pay::all(),
            'type_piece'=>Type_piece::all(),
            'sexe'=> Sexe::all(),
            'groupe_sanguin'=>Groupe_sanguin::all(),
            'profession'=>Profession::all(),
            'grades'=>Grade::all(),
            'type_enseignants'=>Type_enseignant::all(),
            'situation_matrimoniales'=>Situation_matrimoniale::all()
        ];
        $result=SpecialFunction::infos($data,$var);
        return view('Enseignant.Form',$result);
    }

    public function edit($id){
        $Enseignant = Enseignant::where('id',$id)->first();
        $personnel = Personnel::where('id',$Enseignant->personnel)->first();
        $personne = Personne::where('id',$personnel->personne)->first();
        if($personne->photo){
            $delete=SpecialFunction::deleteFichier($personne->photo);
        }
        $Enseignant->delete();
        $personne->delete();
        $personnel->delete();
        return redirect('/enseignant');
    }

}
