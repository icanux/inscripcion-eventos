@extends('layouts.app')

@section('content')

<main class="profile-page">
    <section class="section-profile-cover section-shaped my-0"> 
        <!-- Circles background -->
      <div class="shape shape-style-1 shape-vino alpha-4">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
      <!-- SVG separator -->
      <div class="separator separator-bottom separator-skew">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </section>


    <section class="section">
      <div class="container">
        <div class="card card-profile shadow mt--300">
          <div class="px-4">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="../images/users/{{Auth::user()->avatar}}" class="rounded-circle">
                  </a>
                </div>
              </div>
                <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">
                    <br class="d-lg-none d-xs-none">
                    <br class="d-lg-none d-xs-none">
                    <br class="d-lg-none d-xs-none">
                    <br class="d-lg-none d-xs-none">
                    <br class="d-lg-none d-xs-none">
                    <br class="d-lg-none d-xs-none">

                    <div class="card-profile-actions py-4 mt-lg-0 text-center">
                        <a href="/perfilEdit" class="btn btn-lg btn-github btn-icon mb-3 mb-sm-0">
                          <span class="btn-inner--icon"><i class="ni ni-circle-08"></i></span>
                          <span class="btn-inner--text">
                            <span class="text-white">Editar Perfil</span></span>
                        </a>
                    </div>
                  </div>
                  <div class="col-lg-4 order-lg-1 align-self-lg-center">
                    <div class="card-profile-stats d-flex justify-content-center">
                        <a href="/miseventos" class="btn btn-lg btn-github btn-icon mb-3 mb-sm-0">
                          <span class="btn-inner--icon"><i class="ni ni-hat-3"></i></span>
                          <span class="btn-inner--text">
                            <span class="text-white">Ver Mis Eventos</span></span>
                        </a>
                    </div>
                  </div>
            </div>
            <div class="text-center mt-5">
              <h3>{{Auth::user()->nombres .' '. Auth::user()->apellidos}}
              </h3>
            <div class="h6 font-weight-300"><i class="ni location_pin mr-2"></i>{{Auth::user()->email}}</div>
              {{-- <div class="h6 mt-4"><i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer</div>
              <div><i class="ni education_hat mr-2"></i>University of Computer Science</div> --}}
            </div>
            {{-- <div class="mt-5 py-5 border-top text-center">
              <div class="row justify-content-center">
                <div class="col-lg-9">
                  <p>An artist of considerable range, Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. An artist of considerable range.</p>
                  <a href="#">Show more</a>
                </div>
              </div>
            </div> --}}
            <br><br>
            <form  autocomplete="off" id="frmPassword" method="POST" action="/savePassword">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                @if(isset($msg))
                    <input type="hidden" name="msg" id="msg" readonly value="{{$msg}}" data-msgType="{{$msgType}}">
                @endif
            <div class="row">

                    <div class="col-12">
                            <div class="d-flex">
                                <div class="d-xs-none">
                                  <div class="icon icon-lg icon-shape bg-gradient-white shadow rounded-circle text-primary">
                                      <i class="ni ni-badge"></i>
                                  </div>
                                </div>
                                <div class="pl-4 w-100">
                                  <h4 class="display-3 mt-2">Informacion de usuario</h4>
                                  
          
                                  <ul class="list-unstyled mt-5 d-flex row">
                                      <li class="py-2 col-lg-6 col-md-6">
                                          <div class="d-flex align-items-start">
                                            <div>
                                              <div class="badge badge-circle badge-success mr-3">
                                                    <i class="ni ni-lock-circle-open"></i>
                                              </div>
                                            </div>
                                            <div>
                                                <h6 class="mt-1 font-weight-bold">Nueva Contraseña:</h6>
                                                <h6 class="mb-0">
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" maxlength="300" 
                                                    </div>
                                                </h6>
                                            </div>
                                          </div>
                                      </li>
                                      <li class="py-2 col-lg-6 col-md-6">
                                            <div class="d-flex align-items-start">
                                              <div>
                                                <div class="badge badge-circle badge-success mr-3">
                                                        <i class="ni ni-lock-circle-open"></i>  
                                                </div>
                                              </div>
                                              <div>
                                                  <h6 class="mt-1 font-weight-bold">Repetir Nueva Contraseña:</h6>
                                                  <h6 class="mb-0">
                                                      <div class="form-group">
                                                          <input type="password" class="form-control" id="repetir_password" name="repetir_password" placeholder="Repetir  Contraseña" maxlength="300" 
                                                      </div>
                                                  </h6>
                                              </div>
                                            </div>
                                        </li>
                                  </ul>
          
          
                                </div>
                            </div>
                    </div>

              <div class="col-12">
                    <div class="d-flex pl-5">
                        <div class="row">
                            <div class="col-12 text-left pt-3 pb-3 mb-3">
                                <button class="btn btn-1 btn-danger" type="submit">
                                    <div>
                                        <i class="ni ni-check-bold"></i>
                                        <span>Guardar</span>
                                    </div>
                                </button>
                            </div>
                        </div>

                        </div>
                    </div>
                </div>
                <br><br>
            </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>


  <script>

    $( document ).ready(function() {

        if( $('#msg').val()!=undefined )
        {
            let tipo=$('#msg').data('msgType');
            let titulo='';
            let mensaje=$('#msg').val();
            if(tipo=="success")
            {
                titulo="EXITO"
            }
            else if(tipo=="error")
            {
                titulo="ERROR"; 
            }
            notification(titulo, mensaje,tipo,'top','right');
        }

        $('#frmPassword').submit(function(e){
            e.preventDefault();
            
            let password=$('#password').val();
            let repetirPassword=$('#repetir_password').val();

            if(password.length>0 && repetirPassword.length>0)
            {
                if( password ==  repetirPassword)
                {
                    document.getElementById("frmPassword").submit();
                }
                else
                {
                    notification('INFORMACION', 'Las contraseñas ingresadas no coinciden.','warning','top','right');
                }
            }
        });

    });


  </script>
@endsection