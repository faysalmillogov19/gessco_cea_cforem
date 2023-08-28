@extends('layout.dashroad')
 @section("content")
    <!-- Main content -->
    <section class="content container">
	<div class="row">
			<button type="button" class="btn btn-info float-right" data-toggle="tooltip" data-placement="top" title="Imprimer" onclick="printPageArea('printableArea')"><i class="fa fa-print" aria-hidden="true"></i></button>
	    </div>
	    <hr>
      <div class="row" id="printableArea">
			<table style="width:100%">
				<thead>
					<thead>
						<tr>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</thead>
				</thead>
				<tbody>
					<tr>
						<td>
							<p class="">UNIVERSITE JOSEPH KI-ZERBO</p>
							<p class="">UFR/ Sciences de la Santé (SDS)</p>
							<p class="">Master de spécialités santé et sciences du médicament</p>
						</td>
						<td>
							<img src="{{asset('dist/img/logo_ujkz.jpg')}}" class="float-left">
						</td>
						<td>
							<p class="text-center">BURKINA FASO</p>
							<p class="text-center">UNITE-PROGRES-JUSTICE</p>
							<p class="text-center">Annee Universitaire: @if(isset($var['inscription']->annee_academique)) {{$var['inscription']->libelle_annee_academique}} @endif</p>
						</td>
					</tr>
				</tbody>
			</table>
		    <div class=" col-12">
				  <div class="row h-100 ">

					  <div class="">

						<p class="text-center"><span class="text-bold">PROCES VERNAL DE DELIBERARATION DU @if(isset($var['semestre']->libelle)) {{$var['semestre']->libelle}} @endif  : </span>@if(isset($var['inscription']->annee_academique)) {{$var['inscription']->libelle_annee_academique}} @endif</p>
						<p>
							<span class="text-bold">Code :</span>@if(isset($var['inscription']->code)) {{$var['inscription']->code}} @endif
							<span class="text-bold">Formation: </span>@if(isset($var['inscription']->type_formation)) {{$var['inscription']->libelle_type_formation}} @endif
							<span class="text-bold">Specialité : </span>@if(isset($var['inscription']->filiere)) {{$var['inscription']->libelle_filiere}} @endif
							<span class="text-bold">Orientation : </span>@if(isset($var['inscription']->orientation)) {{$var['inscription']->libelle_orientation}} @endif
						</p>
					  </div>

				  </div>
			</div>
		
        @include('Paiement.add_paiement')
        <div class="col-12">
          <p class="text-center"><span class="text-bold">Les candidats dont les noms suivent sont déclarés admis par ordre de mérite au titre du @if(isset($var['semestre']->libelle)) {{$var['semestre']->libelle}} @endif   de l'année academique @if(isset($var['inscription']->annee_academique)) {{$var['inscription']->libelle_annee_academique}} @endif </span></p>

		  
          <div class="">
            <!-- /.card-header -->
            <div class="card-body">
			
              <table class="table table-bordered table-striped text-center" >
				@if( isset($data[0]) )
                <thead class="text-center">
				
					<tr>
					  <th rowspan="2">Nom complet</th>
					  <th rowspan="2">Matricule</th>
					  <th rowspan="2">Moyenne</th>
					  <th rowspan="2">Mention</th>
					  <th rowspan="2">Résultat</th>
					</tr>
                </thead>
				@endif
                <tbody>
				@php($exist=0)
				@if(isset($data))
					@foreach($data as $row)
						@foreach($row as $r)
						 @if($r->moyenne_generale>=10)
							 @php($exist+=1)
							<tr>
								<td>{{$r->nom_complet}}</td>
								<td>{{$r->matricule}}</td>
								<td>{{$r->moyenne_generale}}</td>
								<td>{{$r->cote}}</td>
								<td>{{$r->resultat}}</td>
							</tr>
						@endif
						@endforeach
					@endforeach
				@endif
				@if($exist==0)
					<tr>
						<td></td>
						<td></td>
						<td>Néant</td>
						<td></td>
						<td></td>
					</tr>
				@endif
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
		
		<div class="col-12">
			<div class="float-left">
				<p class="text-bold">Président du Jury</p>
			</div>
			<div class="float-right">
				<p class="text-bold">Membres du jury</p>
			</div>
		</div>
		<div class="col-12">
			<br>
		</div>
		<div class="col-12">
			<br><br><br><br>
		</div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    @endsection