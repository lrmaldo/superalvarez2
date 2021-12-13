<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Administración App Súper Álvarez">
    <meta name="author" content="Ing. Leonardo Maldonado">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

   {{--  <title>{{ config('app.name', 'Laravel') }}</title> --}}

    <!-- Styles -->
 {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
 <title>Adminstración App Súper Álvarez</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDn-SItPueeJksJgURjiGNpeHjhzCef9iM"></script>

  {{-- css datatable --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">


  {{-- scripts --}}

   <!-- Bootstrap core JavaScript-->
   <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
   <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/caret/1.0.0/jquery.caret.min.js"></script>
 
   <!-- Core plugin JavaScript-->
   <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
   
</head>

<body id="page-top" onload="mapa.initMap()">

    <!-- Page Wrapper -->
    <div id="wrapper">
  
      <!-- Sidebar -->
      <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #ef4b42;"  id="accordionSidebar">
  
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
          <div class="sidebar-brand-icon rotate-n-15">
          <img src="{{asset('img/logo_blanco.png')}}" alt="logo" width=40 srcset="">
            {{--   <i class="fas fa-laugh-wink"></i> --}}
          </div>
          <div class="sidebar-brand-text mx-3">Admin App <br> <small>Súper Álvarez</small> </div>
        </a>
  
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
  
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
          @if(Auth::user()->hasRole('admin'))
          <a class="nav-link" href="{{route('home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
            @else 
            <a class="nav-link" href="{{route('productos.index')}}">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span></a>

            @endif
        </li>
  
        <!-- Divider -->
        <hr class="sidebar-divider">
  
        <!-- Heading -->
        <div class="sidebar-heading">
          
        </div>
  
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Utilidades</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header"></h6>
              {{-- urls segun de los  roles --}}
              @if(Auth::user()->hasRole('admin'))
              <a class="collapse-item" href="{{route('bannerp.index')}}">Banners</a>
              @else 
              <a class="collapse-item" href="{{route('banners.index')}}">Banners</a>
              <a class="collapse-item" href="{{route('categorias.index')}}">Categorias</a>
              <a class="collapse-item" href="{{route('pedidos.index')}}">Pedidos</a>
              <a class="collapse-item" href="{{route('productos.index')}}">Productos</a>

              @endif
              {{-- <a class="collapse-item" href="cards.html">Cards</a> --}}
            </div>
          </div>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{route('documentacion')}}">
          <i class="fas fa-fw fa-book"></i>
          <span>Documentación</span></a>
        </li>
        <!-- Nav Item - Utilities Collapse Menu -->
        {{-- <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
          </a>
          <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Custom Utilities:</h6>
              <a class="collapse-item" href="utilities-color.html">Colors</a>
              <a class="collapse-item" href="utilities-border.html">Borders</a>
              <a class="collapse-item" href="utilities-animation.html">Animations</a>
              <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
          </div>
        </li> --}}
  
        <!-- Divider -->
        <hr class="sidebar-divider">
  
        <!-- Heading -->
        <div class="sidebar-heading">
          
        </div>
  
       
  
        <!-- Nav Item - Charts -->
        {{-- <li class="nav-item">
          <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
        </li>
   --}}
        <!-- Nav Item - Tables -->
       {{--  <li class="nav-item">
          <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
        </li> --}}
  
   {{--      <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block"> --}}
  
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
  
      </ul>
      <!-- End of Sidebar -->
  
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
  
        <!-- Main Content -->
        <div id="content">
  
          <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
  
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>
  
            <!-- Topbar Search -->
            <form style="display: none" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
              <div class="input-group">
                <input style="display: none" type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button  style="display: none"class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>
  
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
  
              <!-- Nav Item - Search Dropdown (Visible Only XS) -->
              <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 {{--  <i class="fas fa-search fa-fw"></i> --}}
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                  <form  class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                      <input style="display: none" type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                      <div style="display: none" class="input-group-append">
                        <button class="btn btn-primary" type="button">
                          <i class="fas fa-search fa-sm"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </li>
  
             
  
              <div class="topbar-divider d-none d-sm-block"></div>
  
              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(!Auth::guest())
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                    @endif
                    @if(Auth::user()->url_imagen==null)
                    <img src="{{ asset('img/logo.jpg')}} " name="aboutme"  border="0" class="img-responsive img-profile rounded-circle"></a>
                    @else
                    <img src="{{ Auth::user()->url_imagen }}" name="aboutme"   border="0" class="img-responsive img-profile rounded-circle"></a>
                    @endif
                  {{-- <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"> --}}
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{route('perfil')}}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Perfil
                  </a>
                 {{--  <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                  </a> --}}
                  <div class="dropdown-divider"></div>
                  {{-- longout laravel --}}
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Salir
                  </a>

                </div>
              </li>
  
            </ul>
  
          </nav>
          <!-- End of Topbar -->
  
          <!-- Begin Page Content -->
          <div class="container-fluid">
  
            <!-- Page Heading -->
          {{--   <h1 class="h3 mb-4 text-gray-800">Blank Page</h1> Aqui va el yeld --}}
          @include('flash-message')
          @yield('content')
  
          </div>
          <!-- /.container-fluid -->
  
        </div>
        <!-- End of Main Content -->
  
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Súper Álvarez <script> document.write(new Date().getFullYear());</script></span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->
  
      </div>
      <!-- End of Content Wrapper -->
  
    </div>
    <!-- End of Page Wrapper -->
  
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
  
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cerrar sesión</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">¿Estas seguro que deseas cerrar sesión?.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            {{-- <a class="btn btn-primary" href="login.html">Logout</a> --}}
            <a class="btn btn-primary" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Salir
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
          </div>
        </div>
      </div>
    </div>
  
   
  
    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

      <!-- Page level plugins -->
  <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
  <script src="{{asset('js/demo/datatables-pedidos.js')}}"></script>
  </body>
  
  </html>


{{-- 
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
 --}}