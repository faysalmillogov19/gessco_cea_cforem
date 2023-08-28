<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GESSCO</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    @media print {
    @page {
        margin-top: 0;
        margin-bottom: 0;
    }
    body {
        padding-top: 72px;
        padding-bottom: 72px ;
    }
}
  </style>
  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    

    <!-- SEARCH FORM -->
    <!--form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form-->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <!--li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="{{ asset('dist/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li-->
      <!-- Notifications Dropdown Menu -->
      

      <li class="nav-item">
      <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="nav-link" data-widget="control-sidebar" data-slide="true" >
                                <i class="fas fa-lock">{{ __('Deconnecter') }}</i>
                            </x-dropdown-link>
      </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('dist/img/my_logo.png')}}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">GESSCO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/man.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
@if(auth()->user()->role==1)
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon  far fa-clipboard"></i>
              <p>
                Gestion scolarité
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('annee_academique.index')}}" class="nav-link">
                  <i class="nav-icon far fa-calendar-alt"></i>
                  <p>
                    Annee academique
                    <span class="badge badge-info right">-</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('repartition_academique.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-shapes"></i>
                  <p>
                    Repartition de l'annee academique
                    <span class="badge badge-info right">-</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('ville.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-country"></i>
                  <p>
                    Villes
                    <span class="badge badge-info right">+</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('niveaux.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-angle-double-up"></i>
                  <p>
                    Niveaux
                    <span class="badge badge-info right">+</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('type_bourse.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-sitemap"></i>
                  <p>
                    Types de bourse
                    <span class="badge badge-info right">*</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('type_element_scolarite.index')}}" class="nav-link">
                  <i class="nav-icon  fas fas fa-laptop-code"></i>
                  <p>
                    Types element scolarite
                    <span class="badge badge-info right">*</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('element_scolarite.index')}}" class="nav-link">
                  <i class="nav-icon  fas fa-address-card"></i>
                  <p>
                    Elements scolarite
                    <span class="badge badge-info right">*</span>
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-align-justify  fas fa-screwdrive"></i>
              <p>
                Gestion pédagogique
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{route('type_formation.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-angle-double-up"></i>
                  <p>
                    Types de formation
                    <span class="badge badge-info right">+</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('filiere.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-graduation-cap"></i>
                  <p>
                    Filières
                    <span class="badge badge-info right">*</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('orientation.index')}}" class="nav-link">
                  <i class="nav-icon  fas fa-address-card"></i>
                  <p>
                    Orientations
                    <span class="badge badge-info right">*</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('unite_enseignement.index')}}" class="nav-link">
                  <i class="nav-icon  fas fa-address-card"></i>
                  <p>
                    Unités d'enseignement
                    <span class="badge badge-info right">*</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('element_constitutif.index')}}" class="nav-link">
                  <i class="nav-icon  fas fa-address-card"></i>
                  <p>
                    Elements contitutifs
                    <span class="badge badge-info right">*</span>
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas  	fas fa-id-card-alt"></i>
              <p>
                Ressources humaines
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
            <li class="nav-item">
                <a href="{{route('profession.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-hammer"></i>
                  <p>
                    Professions
                    <span class="badge badge-info right">+</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('type_enseignant.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-chalkboard-teacher"></i>
                  <p>
                    Types Enseignant
                    <span class="badge badge-info right">*</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('grade.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-chart-bar"></i>
                  <p>
                    Grades
                    <span class="badge badge-info right">-</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('type_piece.index')}}" class="nav-link">
                  <i class="nav-icon  fas fa-address-card"></i>
                  <p>
                    Types de piece
                    <span class="badge badge-info right">*</span>
                  </p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
           <a href="{{route('utilisateur.index')}}" class="nav-link">
              <i class="nav-icon fas fas fa-user-tie"></i>
              <p>
                Utilisateurs
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
@endif
@if(auth()->user()->role==1 || auth()->user()->role==2)
          <li class="nav-item">
            <a href="{{route('etudiant.index')}}" class="nav-link">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Etudiants
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('enseignant.index')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Enseignants
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('personnel.index')}}" class="nav-link">
              <i class="nav-icon fas fas fa-user-tie"></i>
              <p>
                Personnel
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
                <a href="{{route('specialite.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-glasses"></i>
                  <p>
                    Spécialités
                    <span class="badge badge-info right">-</span>
                  </p>
                </a>
          </li>
		  <li class="nav-item">
                <a href="{{route('search_module.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-map"></i>
                  <p>
                    Cours
                    <span class="badge badge-info right"><i class="nav-icon fas fa-search"></i></span>
                  </p>
                </a>
          </li>
		  <li class="nav-item">
                <a href="{{route('search_note.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-chart-bar"></i>
                  <p>
                    Notes
                    <span class="badge badge-info right"><i class="nav-icon fas fa-search"></i></span>
                  </p>
                </a>
      </li>
      <li class="nav-item">
                <a href="{{route('generer_pv.index')}}" class="nav-link">
                  <i class="nav-icon fa fa-list-alt"></i>
                  <p>
                    PV Deliberation
                    <span class="badge badge-info right"><i class="nav-icon fas fa-search"></i></span>
                  </p>
                </a>
      </li>
      <li class="nav-item">
                <a href="{{route('recap_pv.index')}}" class="nav-link">
                  <i class="nav-icon fa fa-list-alt"></i>
                  <p>
                    Liste Admis
                    <span class="badge badge-info right"><i class="nav-icon fas fa-search"></i></span>
                  </p>
                </a>
      </li>
      <li class="nav-item">
                <a href="{{route('attestation_inscription.index')}}" class="nav-link">
                  <i class="nav-icon fa fa-list-alt"></i>
                  <p>
                    Attestation d'inscription
                    <span class="badge badge-info right"><i class="nav-icon fas fa-search"></i></span>
                  </p>
                </a>
      </li>
@endif
@if(auth()->user()->role==3)
      <li class="nav-item">
                      <a href="{{route('getInfo')}}" class="nav-link">
                        <i class="nav-icon fa fa-info"></i>
                        <p>
                          Infos
                        </p>
                      </a>
        </li>
        <li class="nav-item">
                <a href="{{route('my_inscriptions')}}" class="nav-link">
                  <i class="nav-icon fa fa-list-alt"></i>
                  <p>
                    Inscriptions
                    <!--span class="badge badge-info right"><i class="nav-icon fas fa-search"></i></span-->
                  </p>
                </a>
        </li>
@endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"></li>
            </ol>
          </div>
        </div>
      </div>
    </section>
	
	@yield('content')
	
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer text-center">
    <strong>Copyright &copy; S2I</strong> Tous droits reservés
  </footer>

 
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });

    $('[data-toggle="tooltip"]').tooltip();

  });

</script>
<script>
		function chargerImage(){
			$('#output').attr('src',  window.URL.createObjectURL( $("#photo").get(0).files[0] ) )
		}
		if($("#photo").get(0).files[0]){
			chargerImage()
		}
		$('#photo').change(function(){
			chargerImage();
		});
		$('#output').click(function(){
			$('#photo').trigger('click');
		})
	</script>
  <script>
    $(".previsualiser").click(function(){
      var id= this.id;
      $("#pdf_reader").attr('data',id);
    });
  </script>
  <script>
    function printPageArea(areaID){
    var printContent = document.getElementById(areaID).innerHTML;
    var originalContent = document.body.innerHTML;
    document.body.innerHTML = printContent;
    window.print();
    document.body.innerHTML = originalContent;
}
  </script>
</body>
</html>
