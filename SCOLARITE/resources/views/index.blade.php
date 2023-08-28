@extends('layout.dashroad')
 @section("content")
    <!-- Main content -->
    <section class="content container">
	 
      <div class="row ">
		
		<div class="card col-12" style="width: 18rem;">
		  <img class="card-img-top" src="{{asset('dist/img/cea-cforem.jpg')}}" alt="Etudiants">
		  
		</div>
	  
		<div class="card col-4">
		  <img class="img-fluid img-thumbnail" src="{{asset('dist/img/diplome.png')}}" alt="Etudiants" style="">
		  <div class="card-body" style="height:50%">
			<h5 class="card-title">Etudiants</h5>
			<p class="card-text">Total: <span class="text-bold">{{count($var['etudiants'])}} </span></p>
			<a href="{{route('etudiant.index')}}" class="btn btn-primary"><i class="fas fa-hand-point-right"></i></a>
		  </div>
		</div>
		
		<div class="card col-4 ">
		  <img class="img-fluid img-thumbnail" src="{{asset('dist/img/formation.png')}}" alt="Spécialités" style="">
		  <div class="card-body">
			<h5 class="card-title">Spécialités</h5>
			<p class="card-text">Total: <span class="text-bold">{{count($var['specialites'])}} </span></p>
			<a href="{{route('specialite.index')}}" class="btn btn-primary"><i class="fas fa-hand-point-right"></i></a>
		  </div>
		</div>
		
		<div class="card col-4 ">
		  <img class="img-fluid img-thumbnail" src="{{asset('dist/img/professeur2.png')}}" alt="Etudiants" style="">
		  <div class="card-body">
			<h5 class="card-title">Enseignants</h5>
			<p class="card-text">Total: <span class="text-bold">{{count($var['enseignants'])}} </span></p>
			<a href="{{route('enseignant.index')}}" class="btn btn-primary"><i class="fas fa-hand-point-right"></i></a>
		  </div>
		</div>
        
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    @endsection