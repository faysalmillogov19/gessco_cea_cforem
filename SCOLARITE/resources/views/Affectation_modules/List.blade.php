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
                      <h3 class="card-title">Spécialité</h3>
                    </div>
                  </div>
                    <!-- /.card-header -->
                    <!-- form start -->


                  <div class="card-body">
                          <p><span class="text-bold">Code :</span>@if(isset($var['specialite']->code)) {{$var['specialite']->code}} @endif</p>
                          <p><span class="text-bold">Formation: </span>@if(isset($var['specialite']->type_formation)) {{$var['specialite']->libelle_type_formation}} @endif</p>
                          <p><span class="text-bold">Specialité : </span>@if(isset($var['specialite']->filiere)) {{$var['specialite']->libelle_filiere}} @endif</p>
                          <p><span class="text-bold">Orientation : </span>@if(isset($var['specialite']->orientation)) {{$var['specialite']->libelle_orientation}} @endif</p>
                          <a class="text-right" href="{{route('specialite.index')}}">clicker ici pour revenir aux specialités</a>
                  
                  </div>
                  <!-- /.card -->
              </div>
              <!-- /.row -->
        </div>

        <div class="col-9">
          

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Gestion de modules de formation</h3>
			  <div class="float-right">
                <span class="container">
					@if(isset($var['specialite']->id))<a  class="btn btn-primary btn-sm float-right" href="{{route('form_specialite_module',$var['specialite']->id)}}">Ajouter <i class="nav-icon fa fa-plus"></i></a>@endif
                </span>
                  
              </div>
              <br/>
			  <div class="float-left">
                <span class="container">
                  @foreach($var['semestre'] as $row)
                    <a type="button" href="{{url('specialite_module/'.$var['specialite']->id.'/'.$row->semestre)}}"  class="btn btn-primary btn-sm">{{$row->libelle}}</a>
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
                  <td>Unite d'enseignement</td>
                  <td>Element contitutif</td>
                  <td>Credit</td>
                  <td>Total horaire</td>
				  <th >Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                <tr>
                  <td>{{$row->libelle_semestre}}</td>
				  <td>{{$row->libelle_unite_enseignement}}</td>
                  <td>{{$row->libelle_element_constitutif}}</td>
                  <td>{{$row->credit}}</td>
                  <td>{{$row->td+$row->tp+$row->theorie}}</td>
                  <td>
                        <a  href="{{route('affectation_enseignant.show',$row->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Enseignant"><i class="nav-icon fas fa-chalkboard-teacher "></i></a>
						<!--a  href="{{route('module_specialite_note.show',$row->id)}}" class="btn btn-warning btn-sm ">Notes <i class="nav-icon fa fa-persons"></i></a-->
                  </td>
				  <td>
						<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#updateModule{{$row->id}}"  class="btn btn-success btn-sm "> <i class="nav-icon fa fa-pen"></i></button>
                  </td>
				  <td>
						<button type="button"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#supprimer{{$row->id}}"> <i class="nav-icon fa fa-trash"></i></button>
						
                  </td>
                  
                </tr>
                  @include('Affectation_modules.delete_module')
                  @include('Affectation_modules.update_module')
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