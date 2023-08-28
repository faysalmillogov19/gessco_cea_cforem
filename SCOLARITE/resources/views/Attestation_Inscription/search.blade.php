@extends('layout.dashroad')
 @section("content")
<section class="content">
      <form class="container-fluid" action="{{route('attestation_inscription.store')}}" method="POST">
        @csrf
        <div class="row h-100 justify-content-center align-items-center">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Attestation d'inscription</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              @if(isset($data->id))  <input type="hidden" name="id" value="{{$data->id}}"> @endif

                <div class="card-body">
                  <!--div class="form-group">
                    <label for="exampleInputPassword1">Code</label>
                    <input type="texte" class="form-control" name="code" id="exampleInputPassword1" placeholder="Code" @if(isset($data->code)) value="{{$data->code}}" @endif>
                  </div-->
                  <div class="row">
				  
					 @if(Session::has('alert'))
						<div class="alert alert-danger container" role="alert">
							{{ session()->get('alert') }}
						</div>
					 @endif
				  
                    <div class="form-group col-12">
                      <label for="exampleInputPassword1">Annee academique *</label>
                      <select name="annee_academique" class="custom-select" required>

                      <option disabled></option> 
                      @foreach($var['annee_academiques'] as $row)
                          <option value="{{$row->id}}">{{$row->libelle}}</option>
                        @endforeach
                      </select>
                    </div>
					<div class="form-group col-12">
                      <label for="exampleInputPassword1">Specialite *</label>
                      <select name="specialite" class="custom-select" required>
                      <option disabled></option> 
                      @foreach($var['specialites'] as $row)
                          <option value="{{$row->id}}">Filière:</mark>{{ $row->libelle_filiere }} <mark>Type formation:</mark>{{ $row->libelle_type_formation }} <mark>Orientation:</mark>{{ $row->libelle_orientation }}  </option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-12">
                      <label for="exampleInputPassword1">Matricule *</label>
                        <input type="texte" class="form-control" name="matricule" id="exampleInputPassword1" placeholder="Matricule" required>
                    </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Previsualiser</button>
                </div>
            </div>
            <!-- /.card -->

          </div>
        </div>
        <!-- /.row -->
</form><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection