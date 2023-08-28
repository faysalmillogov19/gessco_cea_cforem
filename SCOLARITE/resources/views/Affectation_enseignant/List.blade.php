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
      <div class=" col-3" >
              <div class="row h-100 card">
                <!-- left column -->
                  <!-- general form elements -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Precedents</h3>
                    </div>
                  </div>
                    <!-- /.card-header -->
                    <!-- form start -->


                  <div class="card-body">
                          <h5 class="text-center">SPECIALITES</h5>
                          <p><span class="text-bold">Code :</span> @if(isset($var['module_specialite']->code)) {{$var['module_specialite']->code}} @endif</p>
                          <p><span class="text-bold">Formation : </span>@if(isset($var['module_specialite']->type_formation)) {{$var['module_specialite']->libelle_type_formation}} @endif</p>
                          <p><span class="text-bold">Specialité : </span>@if(isset($var['module_specialite']->filiere)) {{$var['module_specialite']->libelle_filiere}} @endif</p>
                          <p><span class="text-bold">Orientation : </span>@if(isset($var['module_specialite']->orientation)) {{$var['module_specialite']->libelle_orientation}} @endif</p>
                          <a class="text-right" href="{{route('specialite.index')}}">clicker ici pour revenir aux specialités</a>
                          <hr>
                          <h5 class="text-center">Modules</h5>
                          <p><span class="text-bold">Unite Enseignement:</span>@if(isset($var['module_specialite']->libelle_unite_enseignement)) {{$var['module_specialite']->libelle_unite_enseignement}} @endif</p>
                          <p><span class="text-bold">Elements constitutif:</span>@if(isset($var['module_specialite']->libelle_element_constitutif)) {{$var['module_specialite']->libelle_element_constitutif}} @endif</p>
                          <p><span class="text-bold">Semestre :</span>@if(isset($var['module_specialite']->libelle_semestre)) {{$var['module_specialite']->libelle_semestre}} @endif</p>
                          <p><span class="text-bold">Cours Theorique: </span>@if(isset($var['module_specialite']->theorie)) {{$var['module_specialite']->theorie}} H @endif</p>
                          <p><span class="text-bold">TD :</span>@if(isset($var['module_specialite']->td)) {{$var['module_specialite']->td}} H @endif</p>
                          <p><span class="text-bold">TP :</span>@if(isset($var['module_specialite']->tp)) {{$var['module_specialite']->tp}} H @endif</p>
                          <a class="text-right" href="{{route('specialite_module.show',$var['module_specialite']->id_specialite)}}">clicker ici pour revenir à la gestion des Modules</a>

                  </div>
                  <!-- /.card -->
              </div>
              <!-- /.row -->
        </div>
        @include('Affectation_enseignant.add_enseignant')
        <div class="col-9">
          
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Affectation des Enseignants</h3>
              <button  class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addModule">Ajouter <i class="nav-icon fa fa-plus"></i></button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <td>Nom</td>
                  <td>Type</td>
                  <td>Statut</td>
                  <td>Date affectation</td>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                <tr>
                  <td>{{$row->nom_complet}}</td>
                  <td>{{$row->libelle_type_affectation}}</td>
                  <td>{{$row->libelle_statut}}</td>
                  <td>{{$row->date_affectation}}</td>
                  <td>
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#updateModule{{$row->id}}"  class="btn btn-success btn-sm "> <i class="nav-icon fa fa-pen"></i></button>
                        <button type="button"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#supprimer{{$row->id}}"> <i class="nav-icon fa fa-trash"></i></button>
                  </td>
                  
                </tr>
				  @include('Affectation_enseignant.update_enseignant')
                  @include('Affectation_enseignant.delete_enseignant')
                  
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