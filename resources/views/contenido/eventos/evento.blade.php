@extends('layouts.app')

@section('content')

<main>
    <div class="position-relative">
      <!-- shape Hero -->
      <section class="section section-lg section-shaped pb-250">
        <div class="shape shape-style-1 shape-vino">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div>
        <div class="container py-lg-md d-flex mb-5">
            <input type="hidden" name="eventos_id" id="eventos_id" readonly value="{{$evento->id}}">
          <div class="col px-0">
                <div class="row align-items-center justify-content-center">
                        <div class="col-12 text-center">
                          <img src="{{ asset('images/eventos/'.$evento->imagen) }}" style="width: 200px;" class="img-fluid">
                            <p class="lead text-white">{{$evento->nombre}}</p>

                            <div class="row">
                                
                                    <div class="col-lg-8 p-0 ml-auto mr-auto">
                                        <div class="bg-dark border-round p-3">
            
                                            @if(count($eventosUser)>0)
                                                <h5 class="text-white text-center d-block w-100">Estas inscrito a este evento</h5>
                                                <div class="d-block w-100 text-center">
                                                    <div class="custom-control custom-checkbox mb-3 mt-2">
                                                        @if($eventosUser[0]->certificado==1)
                                                            <span class="text-white p-2 bg-success border-round">Certificado: <strong>Si</strong></span>
                                                        @else
                                                            <span class="text-white p-2 bg-success border-round">Certificado: <strong>No</strong></span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="d-flex w-100 text-center justify-content-center">
                                                    
                                                        <a id="cancelarInscripcion" class="btn btn-icon btn-3 bg-danger text-white" href="/inscripcion/{{$evento->id}}/{{0}}/0">
                                                            <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                                                            <span class="btn-inner--text">Cancelar Mi Inscripcion</span>
                                                        </a>
                                                        @if($eventosUser[0]->certificado==1)
                                                            <a id="inscripcion" class="btn btn-icon btn-3 bg-warning text-white" href="/inscripcion/{{$evento->id}}/1/0">
                                                                <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                                                                <span class="btn-inner--text">Cancelar Certificado</span>
                                                            </a>
                                                        @else
                                                            <a id="inscripcion" class="btn btn-icon btn-3 bg-primary text-white" href="/inscripcion/{{$evento->id}}/1/1">
                                                                <span class="btn-inner--icon"><i class="ni ni-paper-diploma"></i></span>
                                                                <span class="btn-inner--text">Solicitar Certificado</span>
                                                            </a>
                                                        @endif
                                                    
                                                </div>
                                            @else
                                                <h5 class="text-white text-center d-block w-100">Inscribirme al evento</h5>
                                                <div class="d-block w-100 text-center">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input class="custom-control-input" id="certificado" name="certificado" type="checkbox">
                                                        <label class="custom-control-label text-white" style="padding-top:2px;" for="certificado">Adquirir Certificado</label>
                                                    </div>
                                                </div>
                                                <div class="d-block w-100 text-center">
                                                        <a id="inscripcion" class="btn btn-icon btn-3 bg-primary text-white" href="/inscripcion/{{$evento->id}}/{{1}}/{{0}}">
                                                            <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                                                            <span class="btn-inner--text">Inscribirme</span>
                                                        </a>
                                                </div>
                                            @endif
            
                                        </div>
                                    </div>
                                
                            </div>
                          <div class="btn-wrapper mt-5">
                            <a href="/eventos" class="btn btn-lg btn-github btn-icon mb-sm-0">
                              <span class="btn-inner--icon"><i class="ni ni-calendar-grid-58"></i></span>
                              <span class="btn-inner--text">Ver Todos Los Eventos</span>
                            </a>
                          </div>
                        </div>
                </div>
          </div>
        </div>
        
        <!-- SVG separator -->
        <div class="separator separator-bottom separator-skew">
          <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          </svg>
        </div>
      </section>
      <!-- 1st Hero Variation -->
    </div>
    <section class="section section-lg pt-lg-0 mt--200">
      <div class="container">
            <div class="card card-profile shadow mt--300">
                <div class="px-4">
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="d-flex">
                                <div>
                                    <div class="icon icon-lg icon-shape bg-gradient-white shadow rounded-circle text-primary">
                                        <i class="ni ni-hat-3"></i>
                                    </div>
                                </div>
                                <div class="pl-4 w-100">
                                    <h4 class="display-3 mt-2">Datos Del Evento</h4>

                                    <ul class="list-unstyled mt-2 d-flex row">

                                            <li class="py-2 col-lg-4 col-md-6">
                                                    <div class="d-flex align-items-start">
                                                        <div>
                                                        <div class="badge badge-circle badge-success mr-3">
                                                            <i class="ni ni-single-copy-04"></i>
                                                        </div>
                                                        </div>
                                                        <div>
                                                        <h6 class="mt-1 font-weight-bold">Nombre:</h6>
                                                        <h6 class="mb-0">
                                                            {{$evento->nombre}}
                                                        </h6>
                                                        </div>
                                                    </div>
                                            </li>
                                            <li class="py-2 col-lg-4 col-md-6">
                                              <div class="d-flex align-items-start">
                                                <div>
                                                  <div class="badge badge-circle badge-success mr-3">
                                                    <i class="ni ni-calendar-grid-58"></i>
                                                  </div>
                                                </div>
                                                <div>
                                                  <h6 class="mt-1 font-weight-bold">Fecha:</h6>
                                                  <h6 class="mb-0">
                                                        <?php echo date("d/m/Y", strtotime($evento->fecha)); ?>
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
                                                            {{$evento->direccion}}
                                                        </h6>
                                                      </div>
                                                    </div>
                                            </li>
                                            <li class="py-2 col-12">
                                                    <div class="d-flex align-items-start">
                                                        <div>
                                                        <div class="badge badge-circle badge-success mr-3">
                                                            <i class="ni ni-single-copy-04"></i>
                                                        </div>
                                                        </div>
                                                        <div>
                                                        <h6 class="mt-1 font-weight-bold">Descripcion:</h6>
                                                        <h6 class="mb-0 text-justify">
                                                            {{$evento->descripcion}}
                                                        </h6>
                                                        </div>
                                                    </div>
                                            </li>

                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                            <div class="col-12">
                                <div class="d-flex">
                                    <div>
                                        <div class="icon icon-lg icon-shape bg-gradient-white shadow rounded-circle text-primary">
                                            <i class="ni ni-watch-time"></i>
                                        </div>
                                    </div>
                                    <div class="pl-4 w-100">
                                        <h4 class="display-3 mt-2">Cronograma Del Evento</h4>
    
                                        <div class="timelineContainer mt-4">
                                            

                                                        <div class="timeline">
                                                          <ul>
                                                            <li>
                                                              <div class="bullet green"></div>
                                                              <div class="time">08:30 am - 09:30 am</div>
                                                              <div class="desc">
                                                                <h3>Registro</h3>
                                                                <h4>Registro de asistentes</h4>
                                                              </div>
                                                            </li>
                                                            <li>
                                                                <div class="bullet green"></div>
                                                                <div class="time">10:00am - 12:00am</div>
                                                                <div class="desc pt-3">
                                                                    <span class="text-white bg-primary p-1 border-round">Taller 1</span>
                                                                    <h3>Elmer Ramos</h3>
                                                                    <h4><strong>Taller:</strong> Introduccion a Python</h4>
                                                                    <div class="people w-100">
                                                                        <img src="{{ asset('images/ponentes/default.jpg') }}" alt="" />
                                                                    </div>
                                                                    <span class="text-white bg-primary p-1 border-round">Taller 2</span>
                                                                    <h3>Cristhian Quispe</h3>
                                                                    <h4><strong>Taller:</strong> Introduccion a Laravel</h4>
                                                                    <div class="people w-100">
                                                                        <img src="{{ asset('images/ponentes/default.jpg') }}" alt="" />
                                                                    </div>
                                                                    <span class="text-white bg-warning p-1 border-round">Ponencia</span>
                                                                    <h3>Oliver</h3>
                                                                    <h4><strong>Ponencia:</strong> Python</h4>
                                                                    <div class="people w-100">
                                                                        <img src="{{ asset('images/ponentes/default.jpg') }}" alt="" />
                                                                    </div>
                                                                    <h3>Sabastisagal</h3>
                                                                    <h4><strong>Ponencia:</strong> Seguridad</h4>
                                                                    <div class="people w-100">
                                                                        <img src="{{ asset('images/ponentes/default.jpg') }}" alt="" />
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="bullet green"></div>
                                                                    <div class="time">12:00 am - 01:00 pm</div>
                                                                    <div class="desc pt-3">
                                                                        <span class="text-white bg-primary p-1 border-round">Taller 1</span>
                                                                        <h3>Lisbeth</h3>
                                                                        <h4><strong>Taller:</strong> Practico </h4>
                                                                        <div class="people w-100">
                                                                            <img src="{{ asset('images/ponentes/default.jpg') }}" alt="" />
                                                                        </div>
                                                                        <span class="text-white bg-primary p-1 border-round">Taller 2</span>
                                                                        <h3>Anonima</h3>
                                                                        <h4><strong>Taller:</strong> Demostracion de distros</h4>
                                                                        <div class="people w-100">
                                                                            <img src="{{ asset('images/ponentes/default.jpg') }}" alt="" />
                                                                        </div>
                                                                        <span class="text-white bg-warning p-1 border-round">Ponencia</span>
                                                                        <h3>Solange</h3>
                                                                        <h4><strong>Ponencia:</strong> Python</h4>
                                                                        <div class="people w-100">
                                                                            <img src="{{ asset('images/ponentes/default.jpg') }}" alt="" />
                                                                        </div>
                                                                        <h3>Hernan</h3>
                                                                        <h4><strong>Ponencia:</strong> Seguridad</h4>
                                                                        <div class="people w-100">
                                                                            <img src="{{ asset('images/ponentes/default.jpg') }}" alt="" />
                                                                        </div>
                                                                    </div>
                                                            </li>
                                                            <li>
                                                              <div class="bullet green"></div>
                                                              <div class="time">01:00 pm</div>
                                                              <div class="desc">
                                                                <h3>Culminacion</h3>
                                                              </div>
                                                            </li>
                                                          </ul>
                                                        </div> 

                                        </div>

    
                                    </div>
                                </div>
                            </div>
                    </div>


                </div>
            </div>

      </div>
    </section>
  </main>

  <script>
  
  $( document ).ready(function(){

    $('#certificado').on('change',function(){
        let certificado=0;
        let eventosId=$('#eventos_id').val();
        if($('#certificado').prop('checked'))
        {
            certificado=1;
        }

        if($('#inscripcion')!=undefined)
        {
            $('#inscripcion').attr('href','/inscripcion/'+eventosId+'/1/'+certificado);
        }
    });

  });
  
  </script>

@endsection