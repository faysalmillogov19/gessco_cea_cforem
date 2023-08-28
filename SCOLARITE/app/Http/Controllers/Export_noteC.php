<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Export_note;
use App\Exports\ExportNote;
use App\Imports\ImportNote;


use App\Models\Inscription;
use App\Models\Etudiant;
use App\Models\Module_specialite;
use App\Models\Note;
use App\Models\Specialite;
use App\Models\Annee_academique;
use App\Models\Personne;
use App\Models\Type_bourse;
use App\Models\Profession;
use App\Models\Niveau;
use App\Models\Filiere;
use App\Models\Orientation;
use App\Models\Repartition_academique;
use App\Models\Personnel;
use App\Models\Enseignant;
use App\Models\Type_formation;
use App\Models\Element_constitutif;
use App\Models\Unite_enseignement;
use App\Models\Affectation_enseignant;
use App\Models\Type_affectation_enseignant;
use App\Models\Statut;
use App\Models\Pay;
use App\Models\Ville;
use App\Http\Controllers\SpecialFunction;

class Export_noteC extends Controller
{
    public function index(){

    }

    public function show($module_specialite, $annee){
        $module_specialites=Module_specialite::where('module_specialites.id',$module_specialite)
                        ->join('element_constitutifs','element_constitutifs.id','module_specialites.element_constitutif')
                        ->join('unite_enseignements','unite_enseignements.id','module_specialites.unite_enseignement')
                        ->join('repartition_academiques','repartition_academiques.id','module_specialites.semestre')
                        ->join('specialites','specialites.id','module_specialites.specialite')
                        ->join('type_formations','type_formations.id','specialites.type_formation')
                        ->join('filieres','filieres.id','specialites.filiere')
                        ->join('orientations','orientations.id','specialites.orientation')
                        ->select(
                            '*','specialites.code as code',
                            'type_formations.libelle as libelle_type_formation','filieres.libelle as libelle_filiere',
                            'orientations.libelle as libelle_orientation','specialites.id as id_specialite',
                            'module_specialites.id as id','element_constitutifs.libelle as libelle_element_constitutif',
                            'unite_enseignements.libelle as libelle_unite_enseignement',
                            'repartition_academiques.libelle as libelle_semestre',
                        )
                        ->first();
		
		$inscriptions=	Inscription::where('inscriptions.specialite',$module_specialites->specialite)
                           ->where('inscriptions.annee_academique',$annee)
						   ->join('etudiants','etudiants.id','inscriptions.etudiant')
						   ->join('personnes','personnes.id','etudiants.personne')
						   ->join('pays','pays.id','personnes.nationalite')
						   ->select(
								'*','inscriptions.id as id'
							)
						   ->get();
		
        $data= SpecialFunction::getModuleNotes($inscriptions,$module_specialites);
        Export_note::truncate();
        foreach($data as $d){
            $export = new Export_note();
            $export->nom_complet=$d->nom_complet;
            $export->matricule=$d->matricule;
            $export->module_specialite=$d->id;
            $export->note=$d->note;
            $export->save();
        }
        
        return Excel::download(new ExportNote, 'Note.xlsx');
        #$result=SpecialFunction::infos($data,$var);
        
    }

    public function export() 
    {
        return Excel::download(new Export_note, 'Note.xlsx');
    }

    public function importer(Request $request){

        Export_note::truncate();
        //request()->validate([
        //    'Export_note' => 'required|mimes:xlx,xls|max:2048'
        //]);
    
        $fichier= SpecialFunction::uploadFichier($request->file('fichier'),'imports/',date("m-d-y-h-i-s"));
        //$request->file('fichier')->store('imports/');
        $excel=Excel::import(  new ImportNote, $fichier  );
        dd($excel);
        //return back()->with('massage', 'User Imported Successfully');
    }
}
