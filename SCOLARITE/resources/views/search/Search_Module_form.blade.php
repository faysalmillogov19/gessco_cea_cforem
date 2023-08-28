@extends('layout.dashroad')
 @section("content")
<section class="content">
      <form class="container-fluid" action="{{route('search_module.store')}}" method="POST">
        @csrf
        <div class="row h-100 justify-content-center align-items-center">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Recherche spécialité</h3>
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
                    <div class="form-group col-12">
                      <label for="exampleInputPassword1">Specialites *</label>
                      <select name="filiere" class="custom-select" required>
                        @if(isset($var['filiere']->id))<option value="{{$var['filiere']->id}}">{{ $var['filiere']->libelle }}</option>@endif
                        <option disabled></option> 
                        @foreach($var['filieres'] as $filiere)
                          <option value="{{$filiere->id}}">{{ $filiere->libelle }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label for="exampleInputPassword1">Formation *</label>
                      <select name="type_formation" class="custom-select" required>
                      @if(isset($var['type_formation']->id))<option value="{{$var['type_formation']->id}}">{{ $var['type_formation']->libelle }}</option>@endif
                      <option disabled></option> 
                      @foreach($var['type_formations'] as $row)
                          <option value="{{$row->id}}">{{ $row->libelle }}</option>
                        @endforeach
                      </select>
                    </div>
                    
                    <div class="form-group col-6">
                      <label for="exampleInputPassword1">Orientation *</label>
                      <select name="orientation" class="custom-select" required>
                      @if(isset($var['orientation']->id))<option value="{{$var['orientation']->id}}">{{ $var['orientation']->libelle }}</option>@endif
                      <option disabled></option> 
                      @foreach($var['orientations'] as $row)
                          <option value="{{$row->id}}">{{ $row->libelle }}</option>
                        @endforeach
                      </select>
                    </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Rechercher</button>
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