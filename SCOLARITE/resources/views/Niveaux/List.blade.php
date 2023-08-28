@extends('layout.dashroad')
 @section("content")
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Niveaux academiques</h3>
              <a type="button" href="{{route('niveaux.create')}}" class="btn btn-primary btn-sm float-right">Ajouter <i class="nav-icon fa fa-plus"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Libelle</th>
                  <th>Code</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $datum)
                <tr>
                  <td>{{$datum->libelle}}</td>
                  <td>{{$datum->code}}</td>
                  <td>{{$datum->description}}</td>
                  <td>
                        <a  href="{{route('niveaux.show',$datum->id)}}" class="btn btn-success btn-sm ">Modifier <i class="nav-icon fa fa-pen"></i></a>
                        <button type="button"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#supprimer{{$datum->id}}">Supprimer <i class="nav-icon fa fa-trash"></i></button>
                  </td>
                </tr>
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
                            <a type="button" class="btn btn-primary" href="{{route('niveaux.edit',$datum->id)}}">Oui</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        </div>
                        </div>
                    </div>
                </div>
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