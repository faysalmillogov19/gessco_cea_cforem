@extends('layout.dashroad')
 @section("content")
    <!-- Main content -->
    <section class="content container">
	 
      <div class="row" syle="b">
		
		<div class="card col-12" style="width: 18rem;">
		  <img class="card-img-top" src="{{asset('dist/img/cea-cforem.jpg')}}" alt="Etudiants">
		</div>
		<div class="col-4"></div>
		<div class="card col-4">
		  <img class="img-fluid img-thumbnail" src="{{asset('dist/img/restrictions.png')}}" alt="Spécialités" style="">
		  <div class="card-body">
			<h5 class="card-title text-center text-bold">Accès interdit</h5>
		  </div>
		</div>
        
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    @endsection