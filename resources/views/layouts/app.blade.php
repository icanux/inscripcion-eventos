<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Comunidad de software libre.">
  <meta name="author" content="Icanux">
  <title>Icanux</title>
  <!-- Favicon -->
  <link href="images/help.ico" rel="icon" type="image/ico">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <!-- Icons -->
  <!-- Icons -->
  <link href="argon/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="argon/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css'>
  <!-- Argon CSS -->
  <link type="text/css" href="argon/css/argon.css?v=1.0.1" rel="stylesheet">
  <link href="argon/vendor/nucleo/css/nucleo.css" rel="stylesheet">

  <!-- Docs CSS -->
  <link type="text/css" href="css/card.css" rel="stylesheet">
  <link type="text/css" href="css/custom.css" rel="stylesheet">
  <script src="argon/vendor/jquery/jquery.min.js"></script>

</head>

<body>

  <!-- Modal -->
<div class="modal fade" id="mainModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
  </div>
  

        <header class="header-global">
                <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
                  <div class="container">
                    <a class="navbar-brand mr-lg-5" href="/">
                      <img src="images/icanux.png" alt="Rounded image" class="img-fluid rounded shadow" style="width:50px;height:auto;"> Icanux
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-collapse collapse" id="navbar_global">
                      <div class="navbar-collapse-header">
                        <div class="row">
                          <div class="col-6 collapse-brand">
                            <a href="/">
                              <img src="images/icanux.png" alt="Rounded image" class="img-fluid rounded shadow" style="width:50px;height:auto;"> Icanux
                            </a>
                          </div>
                          <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                              <span></span>
                              <span></span>
                            </button>
                          </div>
                        </div>
                      </div>
                      <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
                        <li class="nav-item">
                          <a href="{{ route('eventos') }}" class="nav-link">
                            <i class="ni ni-ui-04 d-lg-none"></i>
                            <span class="nav-link-inner--text">Eventos</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="https://icanux.org" class="nav-link" target="_blank">
                            <i class="ni ni-collection d-lg-none"></i>
                            <span class="nav-link-inner--text">Blog</span>
                          </a>
                        </li>
                      </ul>
                      <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                        <li class="nav-item">
                          <a class="nav-link nav-link-icon" href="https://www.facebook.com/https://www.facebook.com/groups/141268153180966" target="_blank" data-toggle="tooltip" title="Siguenos en Facebook">
                            <i class="fa fa-facebook-square"></i>
                            <span class="nav-link-inner--text d-lg-none">Facebook</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link nav-link-icon" href="https://github.com/icanux/inscripcion-eventos" target="_blank" data-toggle="tooltip" title="Ir a Github">
                            <i class="fa fa-github"></i>
                            <span class="nav-link-inner--text d-lg-none">Github</span>
                          </a>
                        </li>
                        <li class="nav-item dropdown">
                          @if(!Auth::guest())
                            <div class="dropdown">
                              <button class="btn btn-secondary bg-transparent border-none dropdown-toggle text-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;box-shadow:none;">
                                  <small class="text-white font-weight-bold">{{Auth::user()->nombres .' '. Auth::user()->apellidos}}</small>
                                <img src="images/users/{{Auth::user()->avatar}}" class="rounded-circle bg-white" style="height: 28px;">
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="{{ route('perfil') }}">
                                    <i class="ni ni-circle-08"></i> Mi perfil
                                  </a>
                                  @if(Auth::user()->tipo==2)
                                  <a class="dropdown-item" href="{{ route('dashboard') }}">
                                      <i class="ni ni-briefcase-24"></i> Dashboard
                                  </a>
                                  @endif
                                  <a class="dropdown-item" href="{{ route('cambiar') }}">
                                      <i class="ni ni-lock-circle-open"></i> Cambiar contraseña
                                    </a>
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                    <i class="ni ni-button-power"></i> Salir
                                  </a>
                              </div>
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                          @else
            
                          <a href="/login" class="btn btn-neutral btn-icon cursor-p">
                            <span class="btn-inner--icon">
                                <i class="ni ni-single-02"></i>
                            </span>
                            <span class="nav-link-inner--text">Ingresar</span>
                          </a>
                          <a href="/register" class="btn btn-neutral btn-icon cursor-p">
                            <span class="btn-inner--icon">
                                <i class="ni ni-single-copy-04"></i>
                            </span>
                            <span class="nav-link-inner--text">Registrarme</span>
                          </a>
                          @endif
                        </li>
                      </ul>
                    </div>
                  </div>
                </nav>
        </header>

@yield('content')

  {{-- <footer class="footer">
        <div class="container">
                <div class="row align-items-center justify-content-md-between">
                  <div class="col-md-6">
                    <div class="copyright">
                      &copy; 2018
                      <a href="#" target="_blank">Free</a>.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <ul class="nav nav-footer justify-content-end">
                      <li class="nav-item">
                        <a href="#" class="nav-link" target="_blank">Icanux</a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link" target="_blank">About Us</a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link" target="_blank">Blog</a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link" target="_blank">MIT License</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
  </footer> --}}

  <!-- Core -->
  <script src="argon/vendor/popper/popper.min.js"></script>
  <script src="argon/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="argon/vendor/headroom/headroom.min.js"></script>
  <script src="argon/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

  <!--  Notifications Plugin    -->
  <script src="js/bootstrap-notify.js"></script>
  <script src="js/custom.js"></script>

  <script src="js/procesos/perfil.js"></script>

  <!-- Argon JS -->
  <script src="argon/js/argon.js?v=1.0.1"></script>
  <script src="js/card.js"></script>

  
</body>

</html>