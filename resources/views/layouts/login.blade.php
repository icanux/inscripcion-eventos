
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Pagina de eventos icanux">
  <meta name="author" content="Icanux">
  <title>Icanux</title>
  <!-- Favicon -->
  <link href="images/help.ico" rel="icon" type="image/ico">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <!-- Icons -->
  <link href="argon/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="argon/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="argon/css/argon.css" rel="stylesheet">
  <link type="text/css" href="css/custom.css" rel="stylesheet">
  <!-- Docs CSS -->
  {{-- <link type="text/css" href="argon/css/docs.min.css" rel="stylesheet"> --}}
</head>

<body>


    <div class="loader">
        <div class="loader_container">
          <div class="load-wrapp">
            <div class="load-4 text-center">
              <div class="ring-1"></div>
              <p class="mt-1 font-medium">Cargando</p>
            </div>
          </div>
        </div>
      </div>
      

  <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark pt-1 pb-1">
          <div class="container">
            <a class="navbar-brand" href="/">
              <img src="images/icanux.png" alt="Rounded image" class="img-fluid rounded shadow" style="width:50px;height:auto;"> Icanux
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbar-default" style="">
              <div class="navbar-collapse-header">
                <div class="row">
                  <div class="col-6 collapse-brand">
                    <a href="/">
                      <img src="images/icanux.png" alt="Rounded image" class="img-fluid rounded shadow" style="width:50px;height:auto;"> Icanux
                    </a>
                  </div>
                  <div class="col-6 collapse-close">
                    <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                      <span></span>
                      <span></span>
                    </button>
                  </div>
                </div>
              </div>
              <ul class="navbar-nav ml-lg-auto">
                <li class="nav-item">
                  <a class="nav-link nav-link-icon" href="https://icanux.org/" target="_blank">
                    <i class="ni ni-books"></i>
                    <span class="nav-link-inner--text">Blog</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
  </header>
  <main >
    <section class="section section-shaped section-lg pt-2 pb-2 h-100">
      <div class="shape shape-style-1 bg-gradient-vino">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
      
      <div class="container d-flex justify-content-center align-items-center">
        @yield('content')
      </div>
    </section>
  </main>
  <footer class="footer pt-3 pb-3">
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
  </footer>
  <!-- Core -->
  <script src="argon/vendor/jquery/jquery.min.js"></script>
  <script src="argon/vendor/popper/popper.min.js"></script>
  <script src="argon/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="argon/vendor/headroom/headroom.min.js"></script>
  <!-- Argon JS -->
  <script src="argon/js/argon.js?v=1.0.1"></script>
   <!-- Register -->
  <script src="js/procesos/register.js"></script>
  <!--  Notifications Plugin    -->
  <script src="js/bootstrap-notify.js"></script>
  <script src="js/custom.js"></script>

</body>

</html>