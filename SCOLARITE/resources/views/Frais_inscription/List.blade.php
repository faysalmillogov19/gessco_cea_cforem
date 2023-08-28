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
                      <h3 class="card-title">Specialité</h3>
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
        @include('Frais_inscription.add')
        <div class="col-9">
          

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Frais d'inscription</h3>
              <button  class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addModule">Ajouter <i class="nav-icon fa fa-plus"></i></button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <td>Elelement de scolarité</td>
                  <td>Type élement de scolarité</td>
                  <td>Montant etudiant UEMOA</td>
                  <td>Montant salarié UEMOA</td>
                  <td>Montant étudiant autre</td>
                  <td>Montant Boursier Total</td>
                  <td>Montant Boursier Partiel</td>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                <tr>
                  <td>{{$row->libelle_element_scolarite}}</td>
                  <td>{{$row->libelle_type}}</td>
                  <td>{{$row->montant_etudiant_uemoa}}</td>
                  <td>{{$row->montant_salarie_uemoa}}</td>
                  <td>{{$row->montant_etudiant_autre}}</td>
                  <td>{{$row->montant_boursier_total}}</td>
                  <td>{{$row->montant_boursier_partiel}}</td>
                  <td>
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#updateModule{{$row->id}}"  class="btn btn-success btn-sm "> <i class="nav-icon fa fa-pen"></i></button>
                        <button type="button"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#supprimer{{$row->id}}"> <i class="nav-icon fa fa-trash"></i></button>
                  </td>
                  @include('Frais_inscription.update')
                </tr>
				  
                  @include('Frais_inscription.delete')
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