@extends('layout.dashroad')
 @section("content")
    <!-- Main content -->
    <section class="content">
      <div class="row">
      <div class=" col-5" >
              
              <div class="row card">
                <!-- left column -->
                  <!-- general form elements -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Identité</h3>
                    </div>
                  </div>
                    <!-- /.card-header -->
                    <!-- form start -->


                  <div class="card-body">
                          <div class="row">
                            <div class="col-5">
                            <img src="{{ asset($var['personne']->photo)}}" class="img-responsive img-rounded" alt="{{ $var['personne']->nom_complet }}" style="width:180px;" />
                            </div>
                            <div class="col-7">
                              <p><span class="text-bold">Nom :</span>@if(isset($var['personne']->nom_complet)) {{$var['personne']->nom_complet}} @endif</p>
                              <p ><span class="text-bold">Matricule :</span>@if(isset($var['personne']->matricule)) {{$var['personne']->matricule}} @endif</p>
							  <p><span class="text-bold">Date de naissance :</span>@if(isset($var['personne']->date_naissance)) {{$var['personne']->date_naissance}} @endif</p>
							  <p><span class="text-bold">Lieu de naissance :</span>@if(isset($var['personne']->lieu_naissance)) {{$var['personne']->lieu_naissance}} @endif</p>
                            </div>

                          </div>
                                                    
                  </div>
              </div>
			  <div class="row card">
				  
					<div class="card-header">
					  <h3 class="card-title">Pièces jointes</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
						<tr>
						  <td>Libelle</td>
						  <td>Actions</td>
						</tr>
						</thead>
						<tbody>
						@foreach($data as $row)
						<tr>
						  <td>{{$row->libelle}}</td>
						  <td>
								<button  id="{{ asset($row->fichier) }}" class="btn btn-warning btn-sm previsualiser"> <i class="nav-icon fa fa-eye"></i></button>
								<button  data-target="#updatedossier{{$row->id}}" data-toggle="modal"  class="btn btn-success btn-sm"> <i class="nav-icon fa fa-pen"></i></button>
								<button type="button"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#supprimer{{$row->id}}"> <i class="nav-icon fa fa-trash"></i></button>
						  </td>
						  @include('dossier.update_dossier')
						</tr>
							<div class="modal fade" id="supprimer{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
										<a type="button" class="btn btn-primary" href="{{route('dossier.edit',$row->id)}}">Oui</a>
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
									</div>
									</div>
								</div>
							</div>
						@endforeach
						</tbody>
					  </table>
					</div>
					<!-- /.card-body -->
				  <!-- /.card -->
				</div>
			  
              <!-- /.row -->
        </div>
        @include('dossier.add_dossier')
        <div class="col-7">
          

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Previsualiser</h3>
              <button  class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addModule">Ajouter une pièce <i class="nav-icon fa fa-plus"></i></button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <object data="{{asset('/dist/img/GESSCO.pdf')}}" id="pdf_reader" class="border border-primary" type="application/pdf" width="100%" height="600px">
			  <p>Unable to display PDF file. <a href="/uploads/media/default/0001/01/540cb75550adf33f281f29132dddd14fded85bfc.pdf">Download</a> instead.</p>
			 </object>
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