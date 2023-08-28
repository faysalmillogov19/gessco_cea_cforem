@extends('layout.dashroad')
 @section("content")
    <!-- Main content -->
    <section class="content container">
		<div class="row">
			<button type="button" class="btn btn-info float-right" data-toggle="tooltip" data-placement="top" title="Imprimer" onclick="printPageArea('printableArea')"><i class="fa fa-print" aria-hidden="true"></i></button>
	    </div>
	   <hr>
	  <div class="card">
      <div class="row" id="printableArea">
		<div class="col-12">
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
				</div>
		<div class="col-12 container">
			<h2 class="text-center">ATTESTATION D'INSCRIPTION</h2>
		</div>
		<div class="col-12">
			<div class="text-center">-------------------------------</div>
		</div>
		<div class="col-11 justify-content-center align-items-center container">
			<p class="container text-justify">
				Je sousigné le vice-président de l'Université Joseph KI-ZERBO atteste que <span class="text-bold">{{$data->nom_complet}}</span>
				né(e) le <span class="text-bold">{{ $data->date_naissance }}</span> à <span class="text-bold">{{ $data->lieu_naissance }}</span>
				est inscrit au titre de l'année academique <span class="text-bold">@if(isset($data->annee_academique)) {{$data->libelle_annee_academique}}</span> comme étudiant sous le matricule <span class="text-bold"> {{$data->matricule}} </span> @endif
				en <span class="text-bold">@if(isset($data->filiere)) {{$data->libelle_filiere}} @endif</span>
				Orientation : @if(isset($data->orientation)) <span class="text-bold">{{$data->libelle_orientation}} </span>@endif
				Type de formation : @if(isset($data->type_formation)) <span class="text-bold">{{$data->libelle_type_formation}} </span>@endif.
			</p>
			<p>
				En foi de quoi cette attestation lui est délivrée pour servir et valoir ce que de droit.
			</p>
					
		</div>
		
        
		<div class="col-12">

		  <div class="container">
			<div class="float-right">
				<p class="text-center">Ouagadougou, le {{date('d/m/y')}}</p>
				<p class="text-center">Le Coordinateur</p>
			</div>
			<div class="">
					<div class="float-left">
						<p class="border border-secondary text-justify" style="width:56%">
							NB: Cette attestation n'est délivré qu'en un seul exemplaire. Faire des photocopies légalisées conformes auprès des autorités compétentes.
						</p>
					</div>
					<div>
						<br/><br/><br/><br/><br/><br/>
					</div>
					<div class="float-right">
						<p class="text-center">Pr Rasmané SEMDE</p>
						<p class="text-center">Maitre de Conference</p>
					</div>
			</div>
		  </div>
		  
		  <br/><br/><br/>
		  
		</div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    @endsection