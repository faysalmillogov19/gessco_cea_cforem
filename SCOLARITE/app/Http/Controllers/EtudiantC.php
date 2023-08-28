<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Sexe;
use App\Models\Groupe_sanguin;
use App\Models\Personne;
use App\Models\Type_bourse;
use App\Models\Profession;
use App\Models\Pay;
use App\Models\Type_piece;
use App\Models\Repondant;
use App\Http\Controllers\SpecialFunction;

class EtudiantC extends Controller
{
    public function index(){

        $var=[];

                    $data=Etudiant::join('personnes','personnes.id','etudiants.personne')
                          ->select('*','etudiants.id as id')
                          ->get();
              
        $result=SpecialFunction::infos($data,$var);
        return view('Etudiant.List',$result);
    }

    public function create(){
        
        $data='';
        $var=[
            'pays'=>Pay::orderBy('nom_fr_fr')->get(),
            'type_piece'=>Type_piece::all(),
            'sexe'=> Sexe::all(),
            'groupe_sanguin'=>Groupe_sanguin::all(),
            'profession'=>Profession::all(),
            'type_bourse'=>Type_bourse::all()
        ];
        $result=SpecialFunction::infos($data,$var);
        return view('Etudiant.Form',$result);
    }

    public function store(Request $request){
        if($request->id){
            $etudiant= Etudiant::where('id', $request->id)->first();
            $personne=Personne::where('id',$etudiant->personne)->first();
            $repondant=Repondant::where('personne',$etudiant->personne)->first();
        }
        else{
            $etudiant= new Etudiant();
            $personne= new Personne();
            $repondant=new Repondant();
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
        
        $etudiant->personne=$personne->id;
        $etudiant->matricule=$request->matricule;
        $etudiant->travail_anterieur=$request->travail_anterieur;
        $etudiant->travail_pendant=$request->travail_pendant;
        $etudiant->travail_apres=$request->travail_apres;
        $etudiant->source_financement=$request->source_financement;
        $etudiant->type_bourse=$request->type_bourse;
        $etudiant->handicap=$request->handicap;
        $etudiant->antecedant_medicaux=$request->antecedant_medicaux;
        $etudiant->alergies=$request->alergies;
        $etudiant->profession=$request->profession;
        $etudiant->save();

        $repondant->personne=$personne->id;
        $repondant->nom_complet_repondant=$request->nom_complet_repondant;
        $repondant->email_repondant=$request->email_repondant;
        $repondant->telephone_repondant=$request->telephone_repondant;
        $repondant->adresse_repondant=$request->adresse_repondant;
        $repondant->profession_repondant=$request->profession_repondant;
        $repondant->save();

        return redirect('/etudiant');
    }

    public function show($id){
        $data = Etudiant::where('personnes.id',$id)
                        ->join('personnes','personnes.id','etudiants.personne')
                        ->join('repondants','personnes.id','repondants.id')
                        ->join('sexes','sexes.id','personnes.sexe')
                        ->join('pays','pays.id','personnes.nationalite')
                        ->join('type_pieces','type_pieces.id','personnes.type_piece')
                        ->join('groupe_sanguins','groupe_sanguins.id','personnes.groupe_sanguin')
                        ->join('professions','professions.id','etudiants.profession')
                        ->join('type_bourses','type_bourses.id','etudiants.type_bourse')
                        ->select(
                            '*','etudiants.id as id','sexes.libelle as libelle_sexe','type_pieces.libelle as libelle_type_piece',
                            'groupe_sanguins.libelle as libelle_groupe_sanguin','professions.libelle as libelle_profession',
                            'type_bourses.libelle as libelle_type_bourse'
                        )
                        ->first();
                
        $var=[
            'pays'=>Pay::all(),
            'type_piece'=>Type_piece::all(),
            'sexe'=> Sexe::all(),
            'groupe_sanguin'=>Groupe_sanguin::all(),
            'profession'=>Profession::all(),
            'type_bourse'=>Type_bourse::all()
        ];
        $result=SpecialFunction::infos($data,$var);
        return view('Etudiant.Form',$result);
    }

    public function edit($id){
        $etudiant = Etudiant::where('id',$id)->first();
        $personne = Personne::where('id',$etudiant->personne)->first();
        if($personne->photo){
            $delete=SpecialFunction::deleteFichier($personne->photo);
        }
        $repondant = Repondant::where('personne',$etudiant->personne)->first();
        $etudiant->delete();
        $personne->delete();
        $repondant->delete();
        return redirect('/etudiant');
    }
}
