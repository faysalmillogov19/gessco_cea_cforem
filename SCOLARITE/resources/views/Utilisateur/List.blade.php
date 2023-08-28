@extends('layout.dashroad')
 @section("content")
    <!-- Main content -->
    <section class="content">
	 @if(Session::has('alert'))
		<div class="alert alert-danger container" role="alert">
					{{ session()->get('alert') }}
		</div>
	 @endif

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Utilisateurs</h3>
              <br/>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <td>Nom complet</td>
                  <td>Email</td>
                  <td>Role</td>

				  <th >Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                <tr>
                  <td>{{$row->name}}</td>
				  <td>{{$row->email}}</td>
                  <td>{{$row->libelle}}</td>
				  <td>
						<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#updateModule{{$row->id}}"  class="btn btn-success btn-sm "> <i class="nav-icon fa fa-pen"></i></button>
						<button type="button"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#supprimer{{$row->id}}"> <i class="nav-icon fa fa-trash"></i></button>
						
                  </td>
                  
                </tr>
                  @include('Utilisateur.delete')
                  @include('Utilisateur.update')
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
       
      <!-- /.row -->
    </section>
    <!-- /.content -->
    @endsection