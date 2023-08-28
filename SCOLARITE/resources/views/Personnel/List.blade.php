@extends('layout.dashroad')
 @section("content")
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Personnel</h3>
              <a type="button" href="{{route('personnel.create')}}" class="btn btn-primary btn-sm float-right">Ajouter <i class="nav-icon fa fa-plus"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th></th>
                  <th>Nom</th>
                  <th>Numero CNSS</th>
                  <th>Date naissance</th>
                  <th>Telephone</th>
                  <th>Email</th>
                  <th>Fonction</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $datum)
                <tr>
                  <td>
                      <img src="{{ asset($datum->photo)}}" class="img-responsive img-rounded" alt="{{ $datum->nom_complet }}" style="width:120px;" />
                  </td>
                  <td>
                  <span class="ps-2">{{ $datum->nom_complet }}</span>
                  </td>
                  <td>{{$datum->num_cnss}}</td>
                  <td>{{$datum->date_naissance}}</td>
                  <td>{{$datum->telephone1."/".$datum->telephone2}}</td>
                  <td>{{$datum->email}}</td>
                  <td>{{$datum->libelle_profession}}</td>
                  <td>  
                        <a  href="{{route('personnel.show',$datum->id)}}" class="btn btn-success btn-sm "> <i class="nav-icon fa fa-pen"></i></a>
                        <button type="button"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#supprimer{{$datum->id}}"> <i class="nav-icon fa fa-trash"></i></button>
                  </td>
                </tr>
                <div class="modal fade" id="supprimer{{$datum->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ALerte</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Voulez vous vraiment supprimer cet element ??
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-primary" href="{{route('personnel.edit',$datum->id)}}">Oui</a>
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
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    @endsection