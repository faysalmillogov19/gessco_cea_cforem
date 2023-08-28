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
                      <h3 class="card-title">Precedents</h3>
                    </div>
                  </div>
                    <!-- /.card-header -->
                    <!-- form start -->


                  <div class="card-body">
                          <h5 class="text-center">SPECIALITES</h5>
                          <p><span class="text-bold">Code :</span> @if(isset($var['module_specialite']->code)) {{$var['module_specialite']->code}} @endif</p>
                          <p><span class="text-bold">Annee academique : </span>@if(isset($var['annee_academique'])) {{$var['annee_academique']->libelle}} @endif</p>
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
        <div class="col-9">
          
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Notes modules</h3>
			  <div class="float-right">
                <span class="container">
					<button  data-toggle="modal" data-target="#importNote" class="btn btn-secondary btn-sm " href="{{route('export_note',[ $var['module_specialite']->id,$var['annee_academique']->id ])}}">Importer <i class="nav-icon fas fa-file-code"></i></button>
                </span>
				
				<span class="container">
					<a  class="btn btn-secondary btn-sm" href="{{route('export_note',[ $var['module_specialite']->id,$var['annee_academique'] ])}}">Exporter <i class="nav-icon fas fa-file-code"></i></a>
                </span>
                  
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <td>Nom</td>
                  <td>Matricule</td>
                  <td>Date de naissance</td>
                  <td>Code inscription</td>
				  <td>Note</td>

                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                <tr>
                  <td>{{$row->nom_complet}}</td>
                  <td>{{$row->matricule}}</td>
                  <td>{{date("d/m/Y", strtotime($row->date_naissance))}}</td>
                  <td>{{$row->code_inscription}}</td>
				  <td>{{$row->note}}</td>
                  <td>
                        <button data-toggle="modal" data-target="#change{{$row->id}}"  class="btn btn-warning btn-sm "><i class="nav-icon fa fa-pen"></i></button>
                  </td>
                  
                </tr>
                  @include('Module_specialite_note.change_note')
				  
				  @include('Module_specialite_note.import')
                  
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