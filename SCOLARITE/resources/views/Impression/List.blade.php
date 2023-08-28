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
		<div class="col-12">
			<p class="text-center">RELEVE DE NOTES</p>
		</div>
		<div class="col-12">
			<div class="text-center">--------------------</div>
		</div>
		<div class="col-12">
			<p class="text-center">@if(isset($var['inscription']->filiere)) {{$var['inscription']->libelle_filiere}} @endif - SEMESTRE1(S1)</p>
			<div class="row">
				<div class="col-3"></div>
				<div class="col-3">
					<p>FORMATION:</p>
					<p>ORIENTATION:</p>
				</div >
				<div class="col-3">
					<p>@if(isset($var['inscription']->type_formation)) {{$var['inscription']->libelle_type_formation}} @endif</p>
					<p>@if(isset($var['inscription']->orientation)) {{$var['inscription']->libelle_orientation}} @endif</p>
				</div >
			</div>
		</div>
		<div class="col-12">
			<div class="row">
				<div class="col-3"></div>
				<div class="col-3">
					<p>SESSION:</p>
					<p>NOM ET PRENOMS:</p>
					<p>DATE ET LIEU DE NAISSAINCE:</p>
					<p>MATRICULE:</p>
				</div >
				<div class="col-3">
					<p>NORMALE</p>
					<p>{{ $var['inscription']->nom_complet }}</p>
					<p>{{ $var['inscription']->date_naissance }} à {{ $var['inscription']->lieu_naissance }}</p>
					<p>{{ $var['inscription']->matricule }}</p>
				</div >
			</div>
		</div>
		
        <div class="col-12 container">
          	<div class="container">	  
              <table class="table table-bordered table-striped container">
                <thead>
                <tr>
                  <td>Unite enseignement</td>
                  <td>Element enseignement</td>
                  <td>Credit</td>
                  <td>Note/20</td>
                  <td>Cote</td>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
						
						
						@foreach($row['list_unite'] as $key=>$elements)
						
							@php($i=0)
							@foreach($elements as $element)
							<tr>
								@if($i==0)
									<td rowspan="{{count($elements)}}">{{$key}}</td>
									@php($i=1)
								@endif
								<td>{{$element['code_element_constitutif']}}</td>
								<td>{{$element['credit']}}</td>
								<td>{{$element['note']}}</td>
								<td>-</td>
							</tr>
							@endforeach
						
						@endforeach
						  
						
                @endforeach
                </tbody>
              </table>
			</div>
        </div>
		<div class="col-12">
		  <div class="row container">
				<div class="col-1"></div>
				<div class="col-3">
					<p>MOYENNE GENERALE :</p>
					<p>RESULTATS DU SEMESTRES :</p>
					<p>TOTAL DES CREDITS VALIDES :</p>
				</div >
				<div class="col-4">
					<p>{{$row->moyenne_generale}}</p>
					<p>{{$row->resultat}}</p>
					<p>{{$row->total_credit}}</p>
				</div >
		  </div>
		  <div class="container">
			<div class="float-right">
				<p class="text-center">Ouagadougou, le {{date('d/m/Y')}}</p>
				<p class="text-center">Le Coordinateur</p>
			</div>
			<div class="container">
					<div class="float-left">
						<p class="border border-secondary" style="width:56.5%">
							NB: Ce relevé n'est délivré qu'en un seul exemplaire. Faire des photocopies légalisées conformes auprès des autorités compétentes.
						</p>
						<div class="container">
							<p>Côte: @foreach($var['mentions'] as $mention) {{$mention->cote}} ({{$mention->libelle}}); @endforeach</p>
						 </div>
					</div>
					<div class="float-right">
						<p class="text-center">Pr Rasmané SEMDE</p>
						<p class="text-center">Maitre de Conference</p>
						<p class="text-center">Chevalier des palmes academiques</p>
					</div>
			</div>
		  </div>
		  
		  <br/><br/><br/>
		  
		</div>
        <!-- /.col -->
      </div>
	 </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    @endsection