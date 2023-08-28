@extends('layout.dashroad')
 @section("content")
    <!-- Main content -->
    <section class="content">
      <div class="row">
      <div class=" col-5" >
              
              <div class="row h-100 card">
                <!-- left column -->
                  <!-- general form elements -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Infos precédentes</h3>
                    </div>
                  </div>
                    <!-- /.card-header -->
                    <!-- form start -->


                  <div class="card-body">
                          <div class="row">
                            <div class="col-5">
                            <img src="{{ asset($var['inscription']->photo)}}" class="img-responsive img-rounded" alt="{{ $var['inscription']->nom_complet }}" style="width:180px;" />
                            </div>
                            <div class="col-7">
                              <p><span class="text-bold">Nom :</span>@if(isset($var['inscription']->nom_complet)) {{$var['inscription']->nom_complet}} @endif</p>
                              <p ><span class="text-bold">Matricule :</span>@if(isset($var['inscription']->matricule)) {{$var['inscription']->matricule}} @endif</p>
                              <p ><span class="text-bold">Source financement :</span>@if(isset($var['inscription']->source_financement)) {{$var['inscription']->source_financement}} @endif</p>
                            </div>

                          </div>
                          <p><span class="text-bold">Code :</span>@if(isset($var['inscription']->code)) {{$var['inscription']->code}} @endif</p>
                          <p><span class="text-bold">Annee academique : </span>@if(isset($var['inscription']->annee_academique)) {{$var['inscription']->libelle_annee_academique}} @endif</p>
                          <p><span class="text-bold">Formation: </span>@if(isset($var['inscription']->type_formation)) {{$var['inscription']->libelle_type_formation}} @endif</p>
                          <p><span class="text-bold">Specialité : </span>@if(isset($var['inscription']->filiere)) {{$var['inscription']->libelle_filiere}} @endif</p>
                          <p><span class="text-bold">Orientation : </span>@if(isset($var['inscription']->orientation)) {{$var['inscription']->libelle_orientation}} @endif</p>
                          <p><span class="text-bold text-center">Frais de scolarite </span></p>
                          @foreach($var['frais_inscription'][0] as $row)
                          <p><span class="text-bold">{{$row->libelle_element_scolarite}} : </span><mark>{{$row->montant_paiement}}</mark> </p>
                          @endforeach
                          <p><span class="text-bold">Total : </span>@if(isset($var['frais_inscription'][1])) <mark> {{$var['frais_inscription'][1]}} </mark>  @endif</p>
                          <p><span class="text-bold">Reste : </span>@if(isset($var['frais_inscription'][2])) <mark> {{$var['frais_inscription'][2]}} </mark>  @endif</p>

                  </div>
                  
                  <div class="card-body">
                         @if(isset($var['inscription']->etudiant))<a class="text-right" href="{{route('inscription.show',$var['inscription']->etudiant)}}">clicker ici pour revenir aux inscriptions</a>@endif
                  </div>
                  <!-- /.card -->
              </div>
              <!-- /.row -->
        </div>
        @include('Paiement.add_paiement')
        <div class="col-7">
          

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Suivi des paiements</h3>
              <button  class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addModule">Ajouter <i class="nav-icon fa fa-plus"></i></button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <td>Date</td>
                  <td>Montant</td>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                <tr>
                  <td>{{$row->date}}</td>
                  <td>{{$row->montant}}</td>
                </tr>
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