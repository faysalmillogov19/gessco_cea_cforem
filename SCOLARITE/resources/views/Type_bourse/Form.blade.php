@extends('layout.dashroad')
 @section("content")
<section class="content">
      <form class="container-fluid" action="{{route('type_bourse.store')}}" method="POST">
        @csrf
        <div class="row h-100 justify-content-center align-items-center">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tye de bourse</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              @if(isset($data->id))  <input type="hidden" name="id" value="{{$data->id}}"> @endif

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Libelle</label>
                    <input type="text" class="form-control" name="libelle" id="exampleInputEmail1" placeholder="Libelle" @if( isset($data->libelle) ) value="{{$data->libelle}}" @endif required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Code</label>
                    <input type="texte" class="form-control" name="code" id="exampleInputPassword1" placeholder="Code" @if(isset($data->code)) value="{{$data->code}}" @endif>
                  </div>
                  <div class="form-group">
                      <label >Bourse totale(couvre tous les frais)</label>
                      <select name="total" class="custom-select" required>
                      @if(isset($data->total))<option value="{{$data->total}}">{{ $data->libelle_binaire }}</option>@endif
                      <option disabled></option> 
                      @foreach($var['bool'] as $bool)
                        <option value="{{$bool->id}}">{{ $bool->libelle }}</option>
                      @endforeach
                    </select>
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