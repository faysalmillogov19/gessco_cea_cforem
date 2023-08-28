@extends('layout.dashroad')
 @section("content")
    <!-- Main content -->
    <section class="content">
	 @if(Session::has('alert'))
		<div class="alert alert-danger container" role="alert">
					{{ session()->get('alert') }}
		</div>
	 @endif
      <div class="row">
        <div class="col-12 card">
              <div class="row card-body">
                    <div class="col-2  align-items-center h-100">
                      <img src="{{ asset($var['etudiant']->photo)}}" class="img-responsive img-rounded" alt="{{ $var['etudiant']->nom_complet }}" style="width:120px;" />
                    </div>
                    <div class="col-3">
                          <p class="align-self-center"><span class="text-bold">Nom :</span>@if(isset($var['etudiant']->nom_complet)) {{$var['etudiant']->nom_complet}} @endif</p>
                    </div>
                    <div class="col-3">
                          <p><span class="text-bold">Matricule :</span>@if(isset($var['etudiant']->matricule)) {{$var['etudiant']->matricule}} @endif</p>
                    </div>
                    <div class="col-3">
                          <p><span class="text-bold">Source financement :</span>@if(isset($var['etudiant']->source_financement)) {{$var['etudiant']->source_financement}} @endif</p>
                    </div>
              </div>
        </div>
          
        <div class="col-12">
		@if(auth()->user()->role==1 || auth()->user()->role==2)
          @include("Inscription.add_inscription")
		@endif
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Inscriptions</h3>
              <a type="button" data-toggle="modal" data-target="#addInscription" class="btn btn-primary btn-sm float-right">Ajouter <i class="nav-icon fa fa-plus"></i></a>
            </div>
            
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <td>Code inscription</td>
                  <td>Annees academiques</td>
                  <td>Formation</td>
                  <td>Specialites</td>
                  <td>Orientation</td>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $datum)
                <tr>
                <td>{{$datum->code_inscription}}</td>
                  <td>{{$datum->libelle_annee_academique}}</td>
                  <td>{{$datum->libelle_type_formation}}</td>
                  <td>{{$datum->libelle_filiere}}</td>
                  <td>{{$datum->libelle_orientation}}</td>
                  <td>{{$datum->date}}</td>
                 
                  <td>
                      <a  href="{{route('note.show',$datum->id)}}" class="btn btn-info btn-sm " data-toggle="tooltip" data-placement="top" title="Notes"> <i class="nav-icon fas fa-file"></i></a>
                    @if(auth()->user()->role==1 || auth()->user()->role==2)
					  <a  href="{{route('paiement.show',$datum->id)}}" class="btn btn-warning btn-sm " data-toggle="tooltip" data-placement="top" title="Paiements"><i class="nav-icon fas fa-coins"></i></a>
                        <button type="button"  class="btn btn-success btn-sm" data-toggle="modal" data-target="#update{{$datum->id}}" alt="Modifier"> <i class="nav-icon fa fa-pen"></i></button>
                       <button type="button"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#supprimer{{$datum->id}}" alt="Supprimer"> <i class="nav-icon fa fa-trash"></i></button>
					@endif
				  </td>
                  
                </tr>
				@if(auth()->user()->role==1)
                <div class="modal fade" id="supprimer{{$datum->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Alerte</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Voulez vous vraiment supprimer cet element ??
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-primary" href="{{route('inscription.edit',$datum->id)}}">Oui</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        </div>
                        </div>
                    </div>
                </div>
				@endif
				@if(auth()->user()->role==1 || auth()->user()->role==2)
					@include("Inscription.update_inscription")
				@endif
                @endforeach
                </tbody>
                <!--tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot-->
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    @endsection