@extends('layout.dashroad')
 @section("content")
<section class="content">
      <form class="container-fluid" action="{{route('specialite_module.store')}}" method="POST">
        @csrf
        <div class="row h-100 justify-content-center align-items-center">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Modules</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              @if(isset($var['specialite']->id)) <input type="hidden" name="specialite" value="{{$var['specialite']->id}}"> @endif

                <div class="card-body">
        
                  @if(Session::has('alert'))
					<div class="alert alert-danger container" role="alert">
								{{ session()->get('alert') }}
					</div>
				 @endif
				  
				  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Unite d'Engnement</label>
                    <select name="unite_enseignement" class="custom-select" required>
                          <option disabled></option> 
                          @foreach($var['unite_enseignements'] as $row)
                            <option value="{{$row->id}}">{{ $row->libelle }}</option>
                          @endforeach
                    </select>
                   </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Element constituf</label>
                    <select name="element_constitutif" class="custom-select" required>
                          <option disabled></option> 
                          @foreach($var['element_constitutifs'] as $row)
                            <option value="{{$row->id}}">{{ $row->libelle }}</option>
                          @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Semestre</label>
                    <select name="semestre" class="custom-select" required>
                          <option disabled></option> 
                          @foreach($var['semestres'] as $r)
                            <option value="{{$r->id}}">{{ $r->libelle }}</option>
                          @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Credit</label>
                    <input type="number" class="form-control" min="1" name="credit" id="exampleInputPassword1" placeholder="Credit" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Heures cours Theorique</label>
                    <input type="number" class="form-control" min="0" name="theorie" id="exampleInputPassword1" placeholder="heure cours theorique" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Heures TD</label>
                    <input type="number" class="form-control" min="0" name="td" id="exampleInputPassword1" placeholder="TD" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Heures TP</label>
                    <input type="number" class="form-control" min="0" name="tp" id="exampleInputPassword1" placeholder="TP" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Observations</label>
                    <textarea class="form-control" name="observation" placeholder="Observations" ></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Date arret </label>
                    <input type="date" class="form-control" name="date_arret" id="exampleInputPassword1" placeholder="TP" @if(isset($row->date_arret)) value="{{$row->date_arret}}" @endif >
                  </div>
                  <div >
                    <button type="submit" class="btn btn-primary float-right">Enregister</button>
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