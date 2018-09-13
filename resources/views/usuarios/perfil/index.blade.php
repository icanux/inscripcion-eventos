@extends('layouts.app')

@section('content')
<?php
    function getRomano($integer, $upcase = true) 
    {
        $table = array('M'=>1000, 'CM'=>900, 'D'=>500, 'CD'=>400, 'C'=>100, 
                       'XC'=>90, 'L'=>50, 'XL'=>40, 'X'=>10, 'IX'=>9,   
                       'V'=>5, 'IV'=>4, 'I'=>1);
        $return = '';
        while($integer > 0) 
        {
            foreach($table as $rom=>$arb) 
            {
                if($integer >= $arb)
                {
                    $integer -= $arb;
                    $return .= $rom;
                    break;
                }
            }
        }
        return $return;
    }
?>
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
                    <img src="images/users/{{Auth::user()->avatar}}" class="rounded-circle">
                  </a>
                </div>
              </div>
              <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">
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
            <div class="row">
              <div class="col-12">
                  <div class="d-flex">
                      <div class="d-xs-none">
                        <div class="icon icon-lg icon-shape bg-gradient-white shadow rounded-circle text-primary">
                            <i class="ni ni-single-02 text-primary"></i>
                        </div>
                      </div>
                      <div class="pl-4 w-100">
                        <h4 class="display-3 mt-2">Informacion de perfil</h4>
                        

                        <ul class="list-unstyled mt-5 d-flex row">
                            <li class="py-2 col-lg-4 col-md-">
                              <div class="d-flex align-items-start">
                                <div>
                                  <div class="badge badge-circle badge-success mr-3">
                                    <i class="ni ni-calendar-grid-58"></i>
                                  </div>
                                </div>
                                <div>
                                  <h6 class="mt-1 font-weight-bold">Fecha de nacimiento:</h6>
                                  <h6 class="mb-0">
                                      @if(Auth::user()->fecha_nacimiento=='' || Auth::user()->fecha_nacimiento=='0000-00-00')
                                      Sin datos
                                    @else
                                      <?php echo date("d/m/Y", strtotime(Auth::user()->fecha_nacimiento)); ?>
                                    @endif
                                  </h6>
                                </div>
                              </div>
                            </li>
                            <li class="py-2 col-lg-4 col-md-">
                                <div class="d-flex align-items-start">
                                  <div>
                                    <div class="badge badge-circle badge-success mr-3">
                                      <i class="ni ni-mobile-button"></i>
                                    </div>
                                  </div>
                                  <div>
                                    <h6 class="mt-1 font-weight-bold">Telefono fijo:</h6>
                                    <h6 class="mb-0">
                                        @if(Auth::user()->telefono_fijo=='')
                                        Sin datos
                                      @else
                                        {{Auth::user()->telefono_fijo}}
                                      @endif
                                    </h6>
                                  </div>
                                </div>
                            </li>
                            <li class="py-2 col-lg-4 col-md-">
                                <div class="d-flex align-items-start">
                                  <div>
                                    <div class="badge badge-circle badge-success mr-3">
                                      <i class="ni ni-mobile-button"></i>
                                    </div>
                                  </div>
                                  <div>
                                    <h6 class="mt-1 font-weight-bold">Telefono movil:</h6>
                                    <h6 class="mb-0">
                                        @if(Auth::user()->telefono_movil=='')
                                        Sin datos
                                      @else
                                        {{Auth::user()->telefono_movil}}
                                      @endif
                                    </h6>
                                  </div>
                                </div>
                            </li>
                            <li class="py-2 col-lg-4 col-md-">
                                <div class="d-flex align-items-start">
                                  <div>
                                    <div class="badge badge-circle badge-success mr-3">
                                      <i class="ni ni-square-pin"></i>
                                    </div>
                                  </div>
                                  <div>
                                    <h6 class="mt-1 font-weight-bold">Direccion:</h6>
                                    <h6 class="mb-0">
                                        @if(Auth::user()->direccion=='')
                                        Sin datos
                                      @else
                                        {{Auth::user()->direccion}}
                                      @endif
                                    </h6>
                                  </div>
                                </div>
                            </li>
                        </ul>


                      </div>
                  </div>
              </div>
              <div class="col-12">
                  <div class="d-flex">
                    <div class="d-xs-none">
                      <div class="icon icon-lg icon-shape bg-gradient-white shadow rounded-circle text-primary">
                          <i class="ni ni-hat-3 text-primary"></i>
                      </div>
                    </div>
                    <div class="pl-4 w-100">
                      <h4 class="display-3 mt-2">Informacion de estudiante</h4>
                    @if(isset($universidad))
                      
                      <ul class="list-unstyled mt-3 d-flex row">
                          <li class="py-2 col-lg-4 col-md-">
                              <div class="d-flex align-items-start">
                                  <div>
                                  <div class="badge badge-circle badge-success mr-3">
                                      <i class="ni ni-building"></i>
                                  </div>
                                  </div>
                                  <div>
                                  <h6 class="mt-1 font-weight-bold">Universidad: </h6>
                                  <h6 class="mb-0">
                                      {{$universidad->nombre}}
                                  </h6>
                                  </div>
                              </div>
                          </li>
                          <li class="py-2 col-lg-4 col-md-">
                                  <div class="d-flex align-items-start">
                                      <div>
                                      <div class="badge badge-circle badge-success mr-3">
                                          <i class="ni ni-hat-3"></i>
                                      </div>
                                      </div>
                                      <div>
                                      <h6 class="mt-1 font-weight-bold">Facultad: </h6>
                                      <h6 class="mb-0">
                                          {{$facultad->nombre}}
                                      </h6>
                                      </div>
                                  </div>
                          </li>
                          <li class="py-2 col-lg-4 col-md-">
                                  <div class="d-flex align-items-start">
                                      <div>
                                      <div class="badge badge-circle badge-success mr-3">
                                          <i class="ni ni-paper-diploma"></i>
                                      </div>
                                      </div>
                                      <div>
                                      <h6 class="mt-1 font-weight-bold">Ciclo: </h6>
                                      <h6 class="mb-0">
                                          <?php echo getRomano($userFacultad->ciclo); ?>
                                      </h6>
                                      </div>
                                  </div>
                          </li>
                          <li class="py-2 col-lg-4 col-md-">
                                  <div class="d-flex align-items-start">
                                      <div>
                                      <div class="badge badge-circle badge-success mr-3">
                                          <i class="ni ni-ruler-pencil"></i>
                                      </div>
                                      </div>
                                      <div>
                                      <h6 class="mt-1 font-weight-bold">Seccion: </h6>
                                      <h6 class="mb-0">
                                         {{$userFacultad->seccion}}
                                      </h6>
                                      </div>
                                  </div>
                          </li>
                          <li class="py-2 col-lg-4 col-md-">
                                  <div class="d-flex align-items-start">
                                      <div>
                                      <div class="badge badge-circle badge-success mr-3">
                                          <i class="ni ni-check-bold"></i>
                                      </div>
                                      </div>
                                      <div>
                                      <h6 class="mt-1 font-weight-bold">Estado: </h6>
                                      <h6 class="mb-0">
                                        @if($userFacultad->vigente==0)
                                          No Vigente
                                        @elseif($userFacultad->vigente==1)
                                          Vigente
                                        @endif
                                      </h6>
                                      </div>
                                  </div>
                          </li>
                      </ul>
                    @else
                    <ul class="list-unstyled mt-3 d-flex row">
                        <li class="py-2 col-lg-4 col-md-">
                            <div class="d-flex align-items-start">
                                <h6 class="mt-1 font-weight-bold">Sin Datos </h6>
                            </div>
                        </li>
                      </ul>
                    @endif
                      </div>
                  </div>

              </div>
              <br><br>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

@endsection