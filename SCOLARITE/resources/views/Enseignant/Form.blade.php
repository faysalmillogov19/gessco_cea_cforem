@extends('layout.dashroad')
 @section("content")
<section class="content">
      <form class="container-fluid" method="POST" action="{{route('enseignant.store')}}" enctype="multipart/form-data">
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
                      <div class="col-5">
                        <div class="row">
                          <div class="form-group">
                            <img id="output" @if(isset($data->photo) && !empty($data->photo) ) src="{{ asset($data->photo) }}" @endif  width="220" height="240">
                            <input type="file" id="photo" name="photo" type="file" accept="image/*" style="display:none; visibility:hidden;" >
                          </div>
                        </div>
                      </div>
                      <div class="col-7">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Nom complet *</label>
                            <input type="text" name="nom_complet" class="form-control" id="exampleInputPassword1" placeholder="Nom complet"@if(isset($data->nom_complet)) value="{{$data->nom_complet}}" @endif required>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">N° CNSS</label>
                            <input type="text" name="num_cnss" class="form-control" id="exampleInputEmail1" placeholder="N° CNSS" @if(isset($data->num_css)) value="{{$data->num_cnss}}" @endif >
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Sexe *</label>
                            <select name="sexe" class="custom-select" required>
                              @if(isset($data->libelle_sexe))<option value="{{$data->sexe}}">{{ $data->libelle_sexe }}</option>@endif
                              <option disabled></option> 
                              @foreach($var['sexe'] as $sexe)
                                <option value="{{$sexe->id}}">{{ $sexe->libelle }}</option>
                              @endforeach
                            </select>
                          </div>
                      </div>
                   </div>

                  <div class="row">
                    
                    <div class="form-group col-12">
                      <label for="exampleInputPassword1">Date_naissance *</label>
                      <input type="date" name="date_naissance" class="form-control" id="exampleInputPassword1" placeholder="Date de naissance"@if(isset($data->date_naissance)) value="{{$data->date_naissance}}" @endif required>
                    </div>
                    <div class="form-group col-12">
                      <label for="exampleInputPassword1">Lieu_naissance *</label>
                      <input type="text" name="lieu_naissance" class="form-control" id="exampleInputPassword1" placeholder="Lieu de naissance"@if(isset($data->lieu_naissance)) value="{{$data->lieu_naissance}}" @endif required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="exampleInputPassword1">Nationalite *</label>
                      <select name="nationalite" class="custom-select" required>
                        @if(isset($data->libelle_pays))<option value="{{$data->nationalite}}">{{ $data->nom_fr_fr }}</option>@endif
                        <option disabled></option> 
                        @foreach($var['pays'] as $pays)
                          <option value="{{$pays->id}}">{{ $pays->nom_fr_fr }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-12">
                        <label for="exampleInputPassword1">Email *</label>
                        <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email"@if(isset($data->email)) value="{{$data->email}}" @endif required>
                      </div>
                  </div>
                  <div class="row">
                      <div class="form-group col-12">
                        <label for="exampleInputPassword1">N° de telephone *</label>
                        <input type="text" name="telephone1" class="form-control" id="exampleInputPassword1" placeholder="Telephone"@if(isset($data->telephone1)) value="{{$data->telephone1}}" @endif required>
                      </div>
                      <div class="form-group col-12">
                        <label for="exampleInputPassword1">Deuxième N° de telephone</label>
                        <input type="text" name="telephone2" class="form-control" id="exampleInputPassword1" placeholder="Telephone 2"@if(isset($data->telephone2)) value="{{$data->telephone2}}" @endif >
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
              <div class="row container">
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
              
              <div class="card-body">

                  <div class="row">
                    <div class="card-header col-12">
                      <h3 class="card-title"><mark>Dosssier Professionnel</mark></h3>
                    </div>
                    <div class="form-group col-12">
                        <label for="exampleInputPassword1">Grade *</label>
                        <select name="grade" class="custom-select" required>
                          @if(isset($data->libelle_grade))<option value="{{$data->grade}}">{{ $data->libelle_grade }}</option>@endif
                          <option disabled></option> 
                          @foreach($var['grades'] as $row)
                            <option value="{{$row->id}}">{{ $row->libelle }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group col-12">
                        <label for="exampleInputPassword1">Type d'enseignant *</label>
                        <select name="type_enseignant" class="custom-select" required>
                          @if(isset($data->type_enseignant))<option value="{{$data->type_enseignant}}">{{ $data->libelle_type_enseignant }}</option>@endif
                          <option disabled></option> 
                          @foreach($var['type_enseignants'] as $row)
                            <option value="{{$row->id}}">{{ $row->libelle }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group col-12">
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
                      <label for="exampleInputPassword1">N° d'enseigner *</label>
                      <input type="text" name="num_autorisation_enseigner" class="form-control" id="exampleInputPassword1" placeholder="N° autorisation d'enseigner"  @if(isset($data->num_autorisation_enseigner)) value="{{$data->num_autorisation_enseigner}}" @endif required>
                    </div>
                    <div class="form-group col-6">
                      <label for="exampleInputPassword1">Date autorisation d'enseigner *</label>
                      <input type="date" name="date_autorisation_enseigner" class="form-control" id="exampleInputPassword1" placeholder="Nombre d'enfant" @if(isset($data->date_autorisation_enseigner)) value="{{$data->date_autorisation_enseigner}}" @endif required>
                    </div>
                    <div class="form-group col-12">
                      <label for="exampleInputPassword1">Situation matrimoniale *</label>
                      <select name="situation_matrimoniale" class="custom-select" >
                        @if(isset($data->libelle_situation_matrimoniale))<option value="{{$data->situation_matrimoniale}}">{{ $data->libelle_situation_matrimoniale }}</option>@endif
                        <option disabled></option> 
                        @foreach($var['situation_matrimoniales'] as $row)
                          <option value="{{$row->id}}">{{ $row->libelle }}</option>
                        @endforeach
                      </select>
                    </div>
                    
                    <div class="form-group col-12">
                      <label for="exampleInputPassword1">Nombre d'enfants *</label>
                      <input type="number" name="enfant" class="form-control" id="exampleInputPassword1" placeholder="Nombre d'enfant" min="0" default="0" @if(isset($data->enfant)) value="{{$data->enfant}}" @endif required>
                    </div>
                  </div>
                 

                <div class="card-footer">
                  
				   @if(isset($data->id))<a href="{{ route('dossier.show',$data->personne)}}" class="btn btn-warning"><i class="fa fa-file" aria-hidden="true"> Fichiers</i></a>@endif
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