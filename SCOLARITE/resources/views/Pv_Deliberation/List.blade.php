@extends('layout.dashroad')
 @section("content")
    <!-- Main content -->
    <section class="content">
<div class="">
		<div class="row">
			<button type="button" class="btn btn-info float-right" data-toggle="tooltip" data-placement="top" title="Imprimer" onclick="printPageArea('printableArea')"><i class="fa fa-print" aria-hidden="true"></i></button>
	    </div>
	    <hr>
      <div class="row" id="printableArea">
		<div class="col-12 ">
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
		
		    <div class=" col-12">
				  <div class="row h-100 card">

					  <div class="card-body">

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
		
		
        <div class="col-12">
          

          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
			
              <table class="" style="border: 1.5px solid gray;">
				@if( isset($data[0]) )
                <thead class="text-center">
				
					<tr style="border: 1.5px solid gray;">
					  <th rowspan="2" style="border: 1.5px solid gray;">Nom complet</th>
					  <th rowspan="2" style="border: 1.5px solid gray;">Matricule</th>
					@foreach($data[0] as $d)  
						@foreach($d['list_unite'] as $key=>$value)
						<th scope="col" colspan="{{count($value)+1}}" style="border: 1.5px solid gray;">{{$key}}</th>
						@endforeach
					@endforeach
						<th rowspan="2" style="border: 1.5px solid gray;">Total Credit</th>
						<th rowspan="2" style="border: 1.5px solid gray;">Moy G</th>
						<th rowspan="2" style="border: 1.5px solid gray;">Résultat</th>
					</tr>
					@foreach($data[0] as $d)
						<tr style="border: 1.5px solid gray;">
						@foreach($d['list_unite'] as $elements)
						
							@foreach($elements as $element)
							 <th style="border: 1.5px solid gray;">{{$element['code_element_constitutif']}}</th>
							@endforeach
							<th style="border: 1.5px solid gray;">Moy</th>
							
						@endforeach
							
						</tr>
					@endforeach
                </thead>
				@endif
				
				
				
				
				

                <tbody style="border: 1.5px solid gray;">
                @foreach($data as $row)
					@foreach($row as $r)
						<tr style="border: 1.5px solid gray;">
							<td style="border: 1.5px solid gray;">{{$r->nom_complet}}</td>
							<td style="border: 1.5px solid gray;">{{$r->matricule}}</td>
						
						@foreach($r['list_unite'] as $elements)
						
							@foreach($elements as $element)
							 <td class="text-center" style="border: 1.5px solid gray;">{{$element['note']}}</td>
							@endforeach
							<td style="border: 1.5px solid gray;">{{$element['moyenne']}}</td>
						@endforeach
							<td style="border: 1.5px solid gray;">{{$r->total_credit}}</td>
							<td style="border: 1.5px solid gray;">{{$r->moyenne_generale}}</td>
							<td style="border: 1.5px solid gray;">{{$r->resultat}}</td>
						  
						</tr>
					@endforeach
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
		<div class="col-12">
				@foreach($data[0] as $d)
						<p style="">
						@foreach($d['list_unite'] as $elements)
						
							@foreach($elements as $element)
							 <span class="text-bold">{{$element['code_element_constitutif']}}:</span>
							 <span >{{$element['libelle_element_constitutif']}}</span>
							@endforeach
							
						@endforeach
						</p>
				@endforeach
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
      </div>
      <!-- /.row -->
</div>
    </section>
    <!-- /.content -->
    @endsection