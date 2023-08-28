@extends('layout.dashroad')
 @section("content")
<section class="content">
      <form class="container-fluid" method="POST" action="@if(auth()->user()->role==3){{route('save_info')}} @else{{route('etudiant.store')}} @endif" enctype="multipart/form-data">
        @csrf
        @if(isset($data->id)) <input type="hidden" name="id" value="{{$data->id}}"> @endif
        <div class="row">
          <!-- left column -->
          <div class="col-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Partie1</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="card-header">
                    <h3 class="card-title"> <mark>Civilite</mark> </h3>
                  </div>
                  <div class="row">
                      <div class="col-4">
                        <div class="row">
                          <div class="form-group">
                            <img id="output" @if(isset($data->photo) && !empty($data->photo) ) src="{{ asset($data->photo) }}" @endif  width="170" height="200">
                            <input type="file" id="photo" name="photo" type="file" accept="image/*" style="display:none; visibility:hidden;" >
                          </div>
                        </div>
                      </div>
                      <div class="col-8">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Nom complet *</label>
                            <input type="text" name="nom_complet" class="form-control" id="exampleInputPassword1" placeholder="Nom complet"@if(isset($data->nom_complet)) value="{{$data->nom_complet}}" @endif required>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Matricule</label>
                            <input type="text" name="matricule" class="form-control" id="exampleInputEmail1" placeholder="N° Matricule" @if(isset($data->matricule)) value="{{$data->matricule}}" @endif >
                          </div>
                      </div>
                   </div>

                  <div class="row">
                    <div class="form-group col-3">
                      <label for="exampleInputPassword1">Sexe *</label>
                      <select name="sexe" class="custom-select" required>
                        @if(isset($data->libelle_sexe))<option value="{{$data->sexe}}">{{ $data->libelle_sexe }}</option>@endif
                        <option disabled></option> 
                        @foreach($var['sexe'] as $sexe)
                          <option value="{{$sexe->id}}">{{ $sexe->libelle }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-3">
                      <label for="exampleInputPassword1">Date_naissance *</label>
                      <input type="date" name="date_naissance" class="form-control" id="exampleInputPassword1" placeholder="Date de naissance"@if(isset($data->date_naissance)) value="{{$data->date_naissance}}" @endif required>
                    </div>
                    <div class="form-group col-6">
                      <label for="exampleInputPassword1">Lieu_naissance *</label>
                      <input type="text" name="lieu_naissance" class="form-control" id="exampleInputPassword1" placeholder="Lieu de naissance"@if(isset($data->lieu_naissance)) value="{{$data->lieu_naissance}}" @endif required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-5">
                      <label for="exampleInputPassword1">Nationalite *</label>
                      <select name="nationalite" class="custom-select" required>
                        @if(isset($data->libelle_pays))<option value="{{$data->nationalite}}">{{ $data->nom_fr_fr }}</option>@endif
                        <option disabled></option> 
                        @foreach($var['pays'] as $pays)
                          <option value="{{$pays->id}}">{{ $pays->nom_fr_fr }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-7">
                        <label for="exampleInputPassword1">Email *</label>
                        <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email"@if(isset($data->email)) value="{{$data->email}}" @endif required>
                      </div>
                  </div>
                  <div class="row">
                      <div class="form-group col-6">
                        <label for="exampleInputPassword1">N° de telephone *</label>
                        <input type="text" name="telephone1" class="form-control" id="exampleInputPassword1" placeholder="Telephone"@if(isset($data->telephone1)) value="{{$data->telephone1}}" @endif required>
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleInputPassword1">Deuxième N° de telephone</label>
                        <input type="text" name="telephone2" class="form-control" id="exampleInputPassword1" placeholder="Telephone 2"@if(isset($data->telephone2)) value="{{$data->telephone2}}" @endif >
                    </div>
                  </div>
                  <div class="row">
                  <div class="card-header col-12">
                    <h3 class="card-title"><mark>Reference piece</mark> </h3>
                  </div>
                    <div class="form-group col-3">
                      <label for="exampleInputPassword1">Type_piece *</label>
                      <select name="type_piece" class="custom-select" required>
                        @if(isset($data->libelle_type_piece))<option value="{{$data->type_piece}}">{{ $data->libelle_type_piece }}</option>@endif
                        <option disabled></option> 
                        @foreach($var['type_piece'] as $row)
                          <option value="{{$row->id}}">{{ $row->libelle }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-4">
                      <label for="exampleInputPassword1">N° piece *</label>
                      <input type="text" name="num_piece" class="form-control" id="exampleInputPassword1" placeholder="N° piece"@if(isset($data->num_piece)) value="{{$data->num_piece}}" @endif required>
                    </div>
                    <div class="form-group col-4">
                      <label for="exampleInputPassword1">Lieu etablissement *</label>
                      <input type="text" name="lieu_etablissement" class="form-control" id="exampleInputPassword1" placeholder="Lieu etablissement"@if(isset($data->lieu_etablissement)) value="{{$data->lieu_etablissement}}" @endif required>
                    </div>
                    <div class="form-group col-6">
                      <label for="exampleInputPassword1">Delivre le *</label>
                      <input type="date" name="date_etablissement" class="form-control" id="exampleInputPassword1" placeholder="Date Delivrance"@if(isset($data->date_etablissement)) value="{{$data->date_etablissement}}" @endif required>
                    </div>
                    <div class="form-group col-6">
                      <label for="exampleInputPassword1">Expire le *</label>
                      <input type="date" name="date_expire" class="form-control" id="exampleInputPassword1" placeholder="Expire" @if(isset($data->date_expire)) value="{{$data->date_expire}}" @endif required>
                    </div>
                  </div>
                  
             </div>
            </div>
          </div>
          <div class="col-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Partie 2</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <div class="row">
                    <div class="card-header col-12">
                      <h3 class="card-title"><mark>Socio-professionnel</mark> </h3>
                    </div>
                    <div class="form-group col-4">
                        <label for="exampleInputPassword1">Profession *</label>
                        <select name="profession" class="custom-select" >
                          @if(isset($data->libelle_profession))<option value="{{$data->profession}}">{{ $data->libelle_profession }}</option>@endif
                          <option disabled></option> 
                          @foreach($var['profession'] as $row)
                            <option value="{{$row->id}}">{{ $row->libelle }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group col-3">
                        <label for="exampleInputPassword1">Type de bourse *</label>
                        <select name="type_bourse" class="custom-select" required>
                          @if(isset($data->libelle_type_bourse))<option value="{{$data->type_bourse}}">{{ $data->libelle_type_bourse }}</option>@endif
                          <option disabled></option> 
                          @foreach($var['type_bourse'] as $row)
                            <option value="{{$row->id}}">{{ $row->libelle }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group col-4">
                        <label for="exampleInputPassword1">Source de financement *</label>
                        <input type="text" name="source_financement" class="form-control" id="exampleInputPassword1" placeholder="Source de financement"@if(isset($data->source_financement)) value="{{$data->source_financement}}" @endif required>
                    </div>
               </div>
               <div class="row">
                    <div class="form-group col-4">
                      <label for="exampleInputEmail1">Lieu de travail avant la formation</label>
                      <input type="text" name="travail_anterieur" class="form-control" id="exampleInputEmail1" placeholder="Lieu de travail avant la formation" @if(isset($data->travail_anterieur)) value="{{$data->travail_anterieur}}" @endif>
                    </div>
                    <div class="form-group col-4">
                      <label for="exampleInputPassword1">Lieu de travail pendant la formation</label>
                      <input type="text" name="travail_pendant" class="form-control" id="exampleInputPassword1" placeholder="Lieu de travail pendant la formation"@if(isset($data->travail_pendant)) value="{{$data->travail_pendant}}" @endif>
                    </div>
                    <div class="form-group col-4">
                      <label for="exampleInputPassword1">Lieu de travail apres la formation</label>
                      <input type="text" name="travail_apres" class="form-control" id="exampleInputPassword1" placeholder="Lieu de travail apres la formation"@if(isset($data->travail_apres)) value="{{$data->date_naissance}}" @endif>
                    </div>
                </div>
              
              <div class="card-body">

                  <div class="row">
                    <div class="card-header col-12">
                      <h3 class="card-title"><mark>Dosssier medical</mark></h3>
                    </div>
                    <div class="form-group col-6">
                      <label for="exampleInputPassword1">Groupe_sanguin *</label>
                      <select name="groupe_sanguin" class="custom-select" >
                        @if(isset($data->libelle_groupe_sanguin))<option value="{{$data->groupe_sanguin}}">{{ $data->libelle_groupe_sanguin }}</option>@endif
                        <option disabled></option> 
                        @foreach($var['groupe_sanguin'] as $groupe_sanguin)
                          <option value="{{$groupe_sanguin->id}}">{{ $groupe_sanguin->libelle }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label for="exampleInputPassword1">Handicap</label>
                      <input type="text" name="handicap" class="form-control" id="exampleInputPassword1" placeholder="Handicap"@if(isset($data->handicap)) value="{{$data->handicap}}" @endif >
                    </div>
                    <div class="form-group col-6">
                      <label for="exampleInputPassword1">Alergies</label>
                      <input type="text" name="alergie" class="form-control" id="exampleInputPassword1" placeholder="Alergies"@if(isset($data->alergie)) value="{{$data->alergie}}" @endif >
                    </div>
                    <div class="form-group col-6">
                      <label for="exampleInputPassword1">Antecedants medicaux</label>
                      <input type="text" name="antecedant_medicaux" class="form-control" id="exampleInputPassword1" placeholder="Antecedants medicaux"@if(isset($data->antecedant_medicaux)) value="{{$data->antecedant_medicaux}}" @endif >
                    </div>
                  </div>
                  <div class="row">
                    <div class="card-header col-12">
                      <h3 class="card-title"><mark>Personne a prevenir en cas de besoin</mark> </h3>
                    </div>
                    <div class="form-group col-6">
                      <label for="exampleInputPassword1">Nom complet de la personne *</label>
                      <input type="text" name="nom_complet_repondant" class="form-control" id="exampleInputPassword1" placeholder="Nom "@if(isset($data->nom_complet_repondant)) value="{{$data->nom_complet_repondant}}" @endif required>
                    </div>
                    <div class="form-group col-6">
                      <label for="exampleInputPassword1">Profession *</label>
                      <input type="text" name="profession_repondant" class="form-control" id="exampleInputPassword1" placeholder="Profession "@if(isset($data->profession_repondant)) value="{{$data->profession_repondant}}" @endif required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-4">
                      <label for="exampleInputPassword1">Adresse de la personne</label>
                      <input type="text" name="adresse_repondant" class="form-control" id="exampleInputPassword1" placeholder="Adresse "@if(isset($data->adresse_repondant)) value="{{$data->adresse_repondant}}" @endif >
                    </div>
                    <div class="form-group col-4">
                      <label for="exampleInputPassword1">Email </label>
                      <input type="email" name="email_repondant" class="form-control" id="exampleInputPassword1" placeholder="Email"@if(isset($data->email_repondant)) value="{{$data->email_repondant}}" @endif >
                    </div>
                    <div class="form-group col-4">
                      <label for="exampleInputPassword1">Telephone *</label>
                      <input type="text" name="telephone_repondant" class="form-control" id="exampleInputPassword1" placeholder="Telephone " @if(isset($data->telephone_repondant)) value="{{$data->telephone_repondant}}" @endif required>
                    </div>
										
                  </div>
                  

                <div class="card-footer">
				   @if(isset($data->id))<a href="{{ route('dossier.show',$data->id)}}" class="btn btn-warning"><i class="fa fa-file" aria-hidden="true"> Fichiers</i></a>@endif
                  <button type="submit" class="btn btn-primary float-right">Enregistrer</button>
                </div>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->

        </div>
        <!-- /.row -->
      </form><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection