<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return redirect('/');
});

Route::get('/',[App\Http\Controllers\IndexC::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::group(['middleware' =>['etudiant'] ], function(){
    Route::get('/info',[App\Http\Controllers\EtudiantRectriction::class, 'getInfo'])->name('getInfo');
    Route::post('/save_info',[App\Http\Controllers\EtudiantC::class, 'store'])->name('save_info');
    Route::resource('/dossier','App\Http\Controllers\DossierC');
    Route::get('/my_inscriptions',[App\Http\Controllers\EtudiantRectriction::class, 'Inscription'])->name('my_inscriptions');

    Route::get('/note/{inscription}/{semestre}', [App\Http\Controllers\NoteC::class, 'filtre'])->name('filtre');
    Route::resource('/note','App\Http\Controllers\NoteC');
    
});

require __DIR__.'/auth.php';

    Route::group([  'middleware' =>['admin']  ], function(){
    //Route::group([ ], function(){
        Route::resource('/annee_academique','App\Http\Controllers\Annee_academiqueC');
        Route::resource('/repartition_academique','App\Http\Controllers\Repartition_academiqueC');
        Route::resource('/niveaux','App\Http\Controllers\NiveauxC');
        //Route::resource('/niveaux','App\Http\Controllers\NiveauxC');
        Route::resource('/type_enseignant','App\Http\Controllers\Type_enseignantC');
        Route::resource('/grade','App\Http\Controllers\GradeC');
        Route::resource('/filiere','App\Http\Controllers\FiliereC');
        Route::resource('/profession','App\Http\Controllers\ProfessionC');
        Route::resource('/type_bourse','App\Http\Controllers\Type_bourseC');
        Route::resource('/type_piece','App\Http\Controllers\Type_pieceC');
        Route::resource('/type_element_scolarite','App\Http\Controllers\Type_element_scolariteC');
        Route::resource('/element_scolarite','App\Http\Controllers\Element_scolariteC');
        Route::resource('/type_formation','App\Http\Controllers\Type_formationC');
        Route::resource('/orientation','App\Http\Controllers\OrientationC');
        Route::resource('/unite_enseignement','App\Http\Controllers\Unite_enseignementC');
        Route::resource('/element_constitutif','App\Http\Controllers\Element_constitutifC');
        Route::resource('/ville','App\Http\Controllers\VilleC');
    });

    Route::group(['middleware' =>['secretaire'] ], function(){
        Route::resource('/etudiant','App\Http\Controllers\EtudiantC');
        Route::resource('/enseignant','App\Http\Controllers\EnseignantC');
        Route::resource('/personnel','App\Http\Controllers\PersonnelC');
        Route::resource('/inscription','App\Http\Controllers\InscriptionC');
        Route::resource('/paiement','App\Http\Controllers\PaiementC');
        
        Route::resource('/search_module','App\Http\Controllers\Search_Modules');
        Route::resource('/search_note','App\Http\Controllers\Search_Note');
        Route::resource('/generer_pv','App\Http\Controllers\GeneratePV');
        Route::resource('/recap_pv','App\Http\Controllers\Recapitulatif_PV');
        Route::resource('/attestation_inscription','App\Http\Controllers\Attestation_Inscription');
        
        Route::get('/print/{inscription}/{semestre}', [App\Http\Controllers\Print_bulletinC::class, 'print'])->name('print');

        Route::get('/export_note/{module_specialite}/{annee}',[App\Http\Controllers\Export_noteC::class, 'show'])->name('export_note');
        Route::post('/importer', [App\Http\Controllers\Export_noteC::class, 'importer'])->name('importer');
        
        Route::resource('/affectation_enseignant','App\Http\Controllers\Affectation_enseignantC');
        Route::resource('/frais_inscription','App\Http\Controllers\Frais_inscriptionC');
        Route::resource('/module_specialite_note','App\Http\Controllers\Module_specialite_noteC');
        Route::get('/module_specialite_note/{inscription}/{annee_academique}', [App\Http\Controllers\Module_specialite_noteC::class, 'getModuleNote']);

        
        Route::resource('/specialite','App\Http\Controllers\SpecialiteC');
        Route::resource('/specialite_module','App\Http\Controllers\Module_specialiteC');
        Route::get('/form_specialite_module/{specialite}',[App\Http\Controllers\Module_specialiteC::class, 'form_specialite_module'])->name('form_specialite_module');
        Route::get('/specialite_module/{module_specialite}/{semestre}', [App\Http\Controllers\Module_specialiteC::class, 'filtre'])->name('filtre_semestre');
        
    });
    
    Route::group(['middleware' =>['admin'] ], function(){
        //Route::resource('/affectation_formation','App\Http\Controllers\AffectationFormation');
        Route::resource('/utilisateur','App\Http\Controllers\ManageUserC');
    });

    /*Route::group(['middleware' =>['admin'] ], function(){
        //Route::resource('/affectation_formation','App\Http\Controllers\AffectationFormation');
        
    });*/