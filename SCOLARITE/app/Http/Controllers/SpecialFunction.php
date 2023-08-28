<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Frais_inscription;
use App\Models\Inscription;
use App\Models\Paiement;
use App\Models\Note;
use App\Models\Element_constitutif;
use App\Models\Unite_enseignement;
use App\Models\Module_specialite;
use App\Models\Mention;


class SpecialFunction extends Controller
{
    public static function infos($data, $var){
        return compact('data','var');
    }

    public static function add_element($request, $table){
        $table->libelle=$request->libelle;
        $table->code=$request->code;
        $table->description=$request->description;
        $table->save();
    }
	
	public function getModuleNotes($inscriptions,$module_specialite){
		
		$list=[];
		foreach($inscriptions as $inscription){
			$note=Note::where('inscription',$inscription->id)->where('module_specialite',$module_specialite->id)->first();
			
			if(isset($note->id)){
				$inscription->note=$note->note;
			}
			else{
				$inscription->note=0;
			}
			array_push($list, $inscription);
		}
		return $list;
	}

	public function getMention($note){
		$mention=Mention::where('max','>', $note )
                        ->where('min','<=',$note )
                        ->first();
		return $mention;
	}

	public function getNote($inscription){
		$modules= Module_specialite::where('specialite',$inscription->specialite);

		if(isset($inscription->semestre)){
			$filtre=$modules->where('semestre',$inscription->semestre);
		}
		else{
			$filtre=$modules;
		}
		
		$modules=$filtre->join('element_constitutifs','element_constitutifs.id','module_specialites.element_constitutif')
			     ->join('unite_enseignements','unite_enseignements.id','module_specialites.unite_enseignement')
			     ->join('repartition_academiques','repartition_academiques.id','module_specialites.semestre')
			     ->select(
				'*','module_specialites.id as id','module_specialites.id as id_module_specialite','element_constitutifs.libelle as libelle_element_constitutif', 
				'unite_enseignements.libelle as libelle_unite_enseignement','repartition_academiques.libelle as libelle_semestre'
			   )
			 ->get();
			
		$list=[];
		foreach($modules as $module){
			$note=Note::where('notes.module_specialite',$module->id)
					  ->where('notes.inscription',$inscription->id)
					  ->first();
			if(isset($note->id)){
				$module->note=$note->note;
			}
			else{
				$module->note=0;
			}
			array_push($list, $module);
		}
		return $list;
		
	}

	public function getUniteEnseignement($inscription){
		$unite_enseignements= Module_specialite::where('specialite',$inscription->specialite)
								   ->where('semestre',$inscription->semestre)
								   ->join('unite_enseignements','unite_enseignements.id','module_specialites.unite_enseignement')
			     				   ->select(
										'unite_enseignements.id as id','unite_enseignements.libelle as libelle_unite_enseignement','unite_enseignements.id as id_unite_enseignement'
			  						 )
								   ->distinct()
			 						->get();
		return $unite_enseignements;
	}

	public function getElementConstitutif($inscription, $id_element){
		$elements=Module_specialite::where('specialite',$inscription->specialite)
								   ->where('semestre',$inscription->semestre)
								   ->where('unite_enseignement',$id_element)
								   ->join('element_constitutifs','element_constitutifs.id','module_specialites.element_constitutif')
			     				   ->select(
										'module_specialites.id as id','module_specialites.credit',
										'element_constitutifs.id as id_element_constitutif',
										'element_constitutifs.libelle as libelle_element_constitutif',
										'element_constitutifs.code as code_element_constitutif',
			  						 )
			 						->get();
		
		return $elements;
	}

	public function getNoteODer($inscription){
		
		$unite_enseignements= self::getUniteEnseignement($inscription);
		$list=[];
		$unite_enseigment_array=[];
		$total_credit=0;
		$total_point=0;
		
		foreach($unite_enseignements as $unite_enseigment){
			
			$elements=self::getElementConstitutif($inscription, $unite_enseigment->id_unite_enseignement);
			$groupe=[];
			$credit=0;
			$total_point_unite=0;
			
			foreach($elements as $element){
				$note=Note::where('notes.module_specialite',$element->id)
						  ->where('notes.inscription',$inscription->id)
						  ->first();
				if(isset($note->id)){
					$element->note=$note->note;
				}
				else{
					$element->note=0;
				}
				$credit+=$element->credit;
				$total_point_unite+=$element->note*$element->credit;
				$element->moyenne=$total_point_unite/$credit;
				array_push($groupe, $element);
			}
			$total_credit+=$credit;
			$total_point+=$total_point_unite;
			
			$unite_enseigment_array[$unite_enseigment->libelle_unite_enseignement]=$groupe;
		}
		
		$inscription->list_unite=$unite_enseigment_array;
		$inscription->moyenne_generale=$total_point/$total_credit;
		$mention=self::getMention($inscription->moyenne_generale);
		$inscription->libelle_mention=$mention->libelle;
		$inscription->cote=$mention->cote;
		$inscription->total_credit=$total_credit;
		if($inscription->moyenne_generale>=10){
			$inscription->resultat="Admis(e)";
		}
		else{
			$inscription->resultat="Ajourné(e)";
		}
		array_push($list, $inscription);
		return $list;
		
	}

	public static function inscription_exacte($id){
		$inscription=Inscription::where('inscriptions.id', $id)
                        ->join('specialites','specialites.id','inscriptions.specialite')
                        ->join('annee_academiques','annee_academiques.id','inscriptions.annee_academique')
                        ->join('type_formations','type_formations.id','specialites.type_formation')
                        ->join('filieres','filieres.id','specialites.filiere')
                        ->join('orientations','orientations.id','specialites.orientation')
                        ->join('etudiants','etudiants.id','inscriptions.etudiant')
                        ->join('personnes','personnes.id','etudiants.personne')
                        ->join('pays','pays.id','personnes.nationalite')
                        ->select(
                            '*','inscriptions.id as id','specialites.code as code','annee_academiques.libelle as libelle_annee_academique',
                            'type_formations.libelle as libelle_type_formation','filieres.libelle as libelle_filiere',
                            'orientations.libelle as libelle_orientation'
                        )
                        ->first();
		return $inscription;
	}

	public static function changeNote($request){
		$note=Note::where('inscription',$request->inscription)->where('module_specialite',$request->module_specialite)->first();
        
        if(!isset($note->id))
		{
            $note= new Note();
			$note->module_specialite=$request->module_specialite;
			$note->inscription=$request->inscription;
        }
		$note->note=$request->note;
        $note->save();
		return $note;
	}

	public static function frais_inscription_exacte($specialite, $inscription){
		$frais_inscription=Frais_inscription::where('specialite',$specialite)
                                            ->join('element_scolarites','element_scolarites.id','frais_inscriptions.element_scolarite')
                                            ->join('type_element_scolarites','type_element_scolarites.id','element_scolarites.type_element_scolarite')
                                            ->select(   '*',
                                                        'element_scolarites.libelle as libelle_element_scolarite',
                                                        'type_element_scolarites.libelle as libelle_type_element_scolarite'
                                            )
                                            ->get();
        $montant_exacte=[];
        $total=0;
		
        foreach($frais_inscription as $row){
            if($inscription->type_bourse==2){
                $row->montant_paiement=$row->montant_boursier_total;
            }
            else if($inscription->type_bourse==3){
                $row->montant_paiement=$row->montant_boursier_partiel;
            }
            else if($inscription->uemoa==1){
                if($inscription->profession==1){
                    $row->montant_paiement=$row->montant_etudiant_uemoa;
                }
                else{
                    $row->montant_paiement=$row->montant_salarie_uemoa;
                }
            }
            else{
                $row->montant_paiement=$row->montant_etudiant_autre;
            }
			$total+=$row->montant_paiement;
            array_push($montant_exacte,$row);
        }
		
		$somme_paye=Paiement::where('inscription',$inscription->id)->sum('montant');
		$reste=$total-$somme_paye;

		return [$montant_exacte,$total,$reste];
	}

    public static function uploadFichier($var,$dossier,$rename)
	{
		$date=date_create();
		$date=date_timestamp_get($date);
		$file = $var;
		$extension=$file->getClientOriginalExtension();
		//$filename=$file->getClientOriginalName();
		$filename=$dossier.$rename.$date.".".$extension;
		$size=$file->getSize();
		$mimeType=$file->getMimeType();
		$file->move($dossier,$filename);
		return $filename;
	}

	public static function deleteFichier($chemin){
		unlink($chemin);
	}

}
