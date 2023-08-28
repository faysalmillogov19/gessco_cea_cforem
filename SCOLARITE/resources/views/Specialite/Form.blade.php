@extends('layout.dashroad')
 @section("content")
<section class="content">
      <form class="container-fluid" action="{{route('specialite.store')}}" method="POST">
        @csrf
        <div class="row h-100 justify-content-center align-items-center">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Spécialité</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			 

              @if(isset($data->id))  <input type="hidden" name="id" value="{{$data->id}}"> @endif

                <div class="card-body">
					@if(Session::has('alert'))
				  
				   <div class="alert alert-danger form-group container" role="alert">
					{{session()->get('alert')}}
					</div>
				  @endif
                  <div class="form-group">
                    <label for="exampleInputPassword1">Code</label>
                    <input type="texte" class="form-control" name="code" id="exampleInputPassword1" placeholder="Code" @if(isset($data->code)) value="{{$data->code}}" @endif>
                  </div>
                  <div class="row">
				  
                    <div class="form-group col-6">
                      <label for="exampleInputPassword1">Formation *</label>
                      <select name="type_formation" class="custom-select" required>
                      @if(isset($data->type_formation))<option value="{{$data->type_formation}}">{{ $data->libelle_type_formation }}</option>@endif
                      <option disabled></option> 
                      @foreach($var['type_formations'] as $row)
                          <option value="{{$row->id}}">{{ $row->libelle }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label for="exampleInputPassword1">Specialites *</label>
                      <select name="filiere" class="custom-select" required>
                        @if(isset($data->filiere))<option value="{{$data->filiere}}">{{ $data->libelle_filiere }}</option>@endif
                        <option disabled></option> 
                        @foreach($var['filieres'] as $filiere)
                          <option value="{{$filiere->id}}">{{ $filiere->libelle }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label for="exampleInputPassword1">Orientation *</label>
                      <select name="orientation" class="custom-select" required>
                      @if(isset($data->orientation))<option value="{{$data->orientation}}">{{ $data->libelle_orientation }}</option>@endif
                      <option disabled></option> 
                      @foreach($var['orientations'] as $row)
                          <option value="{{$row->id}}">{{ $row->libelle }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label for="exampleInputPassword1">Responsable *</label>
                      <select name="responsable" class="custom-select" required>
                      @if(isset($data->responsable))<option value="{{$data->responsable}}">{{ $data->nom_complet }}</option>@endif
                      <option disabled></option> 
                      @foreach($var['enseignants'] as $row)
                          <option value="{{$row->id}}">{{ $row->nom_complet }}</option>
                        @endforeach
                      </select>
                    </div>

                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea class="form-control" name="description" placeholder="Description" >@if(isset($data->description)) {{$data->description}} @endif</textarea>
                  </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Enregister</button>
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