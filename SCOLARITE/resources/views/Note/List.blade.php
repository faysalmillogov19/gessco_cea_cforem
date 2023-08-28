@extends('layout.dashroad')
 @section("content")
    <!-- Main content -->
    <section class="content">
      <div class="row">
      <div class=" col-3" >
              
              <div class="row h-100 card">
                <!-- left column -->
                  <!-- general form elements -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Infos precédentes</h3>
                    </div>
                  </div>
                    <!-- /.card-header -->
                    <!-- form start -->


                  <div class="card-body">
                          <div class="row">
                            <div class="col-5">
                            <img src="{{ asset($var['inscription']->photo)}}" class="img-responsive img-rounded" alt="{{ $var['inscription']->nom_complet }}" style="width:120px;" />
                            </div>
                            <div class="col-7">
                              <p><span class="text-bold">Nom :</span>@if(isset($var['inscription']->nom_complet)) {{$var['inscription']->nom_complet}} @endif</p>
                            </div>
                            <p class="col-12"><span class="text-bold">Matricule :</span>@if(isset($var['inscription']->matricule)) {{$var['inscription']->matricule}} @endif</p>
                            <p class="col-12"><span class="text-bold">Source financement :</span>@if(isset($var['inscription']->source_financement)) {{$var['inscription']->source_financement}} @endif</p>

                          </div>
                          <p><span class="text-bold">Code :</span>@if(isset($var['inscription']->code)) {{$var['inscription']->code}} @endif</p>
                          <p><span class="text-bold">Annee academique : </span>@if(isset($var['inscription']->annee_academique)) {{$var['inscription']->libelle_annee_academique}} @endif</p>
                          <p><span class="text-bold">Formation: </span>@if(isset($var['inscription']->type_formation)) {{$var['inscription']->libelle_type_formation}} @endif</p>
                          <p><span class="text-bold">Specialité : </span>@if(isset($var['inscription']->filiere)) {{$var['inscription']->libelle_filiere}} @endif</p>
                          <p><span class="text-bold">Orientation : </span>@if(isset($var['inscription']->orientation)) {{$var['inscription']->libelle_orientation}} @endif</p>
                  </div>
				@if(auth()->user()->role==1 || auth()->user()->role==2)
				  <div>
					<h4 class="text-center">Relevés de notes</h4>
				  </div>
				  
				  <div class="align-self-lg-center">
					<span class="container">
					  @foreach($var['semestres'] as $row)
						<a type="button" href="{{url('print/'.$var['inscription']->id.'/'.$row->semestre)}}"  class="btn btn-outline-dark">{{$row->libelle}}<i class="fa fa-print" aria-hidden="true"></i>
</a>
					  @endforeach
					</span>
					  
				  </div>
				@endif
                  
                  <div class="card-body">
                         @if(isset($var['inscription']->etudiant))<a class="text-right text-center" href="{{route('inscription.show',$var['inscription']->etudiant)}}">clicker ici pour revenir aux inscriptions</a>@endif
                  </div>
                  <!-- /.card -->
				  
				  
			  
              </div>
              <!-- /.row -->
        </div>
        @include('Paiement.add_paiement')
        <div class="col-9">
          

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Notes</h3>
              <div class="float-right">
                <span class="container">
                  @foreach($var['semestres'] as $row)
                    <a type="button" href="{{url('note/'.$var['inscription']->id.'/'.$row->semestre)}}"  class="btn btn-primary btn-sm">{{$row->libelle}}</a>
                  @endforeach
                </span>
                  
              </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <td>Semestre</td>
                  <td>Unite enseignement</td>
                  <td>Element enseignement</td>
                  <td>Credit</td>
                  <td>Note</td>
                  <td>Total</td>
				  @if(auth()->user()->role==1 || auth()->user()->role==2)
					<td>Action</td>
				  @endif
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                <tr>
                  <td>{{$row->libelle_semestre}}</td>
                  <td>{{$row->libelle_unite_enseignement}}</td>
                  <td>{{$row->libelle_element_constitutif}}</td>
                  <td>{{$row->credit}}</td>
                  <td>{{$row->note}}</td>
                  <td>{{$row->note*$row->credit}}</td>
				  @if(auth()->user()->role==1 || auth()->user()->role==2)
                  <td><button type="button"  class="btn btn-infos btn-sm" data-toggle="modal" data-target="#change{{$row->id}}" alt="Modifier"> <i class="nav-icon fa fa-pen"></i></button></td>
                  
					@include('Note.change_note')
				  @endif
                </tr>
                @endforeach
                </tbody>
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