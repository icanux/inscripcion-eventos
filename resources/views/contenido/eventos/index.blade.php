@extends('layouts.app')


@section('content')


    <main class="profile-page">
        <section class="section section-lg section-shaped">
                <div class="shape shape-style-1 shape-vino">
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                </div>
                <div class="container py-md">
                  <?php
                    $contador=0;
                  ?>
                  @if(count($eventos)>0)
                    @foreach($eventos as $evento)
                      <div class="row row-grid justify-content-between align-items-center">
                        <div class="col-lg-6">
                          <h3 class="display-2 text-white">
                                {{$evento->nombre}}
                          </h3>
                          <h6 class="text-white text-center"><i class="ni ni-calendar-grid-58"></i> Fecha: <?php echo date("d/m/Y", strtotime($evento->fecha)); ?></h6>
                          <p class="lead text-white">
                            {{ substr($evento->descripcion,0,150).'...' }}
                          </p>
                          <div class="btn-wrapper">
                            <a href="/evento/{{$evento->id}}" class="btn btn-white">
                                <i class="ni ni-single-copy-04"></i>
                                Ver Mas
                            </a>
                            <a href="/evento/{{$evento->id}}" class="btn btn-primary">
                                <i class="ni ni-hat-3"></i>
                                Inscribirme
                            </a>
                          </div>
                        </div>
                        <div class="col-lg-5">
                          <div class="transform-perspective-right">
                            <div class="cardshadow border-0 d-flex align-items-center justify-content-center">
                              <img src="images/eventos/{{$evento->imagen}}" alt="">
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php $contador++; ?>
                      @if($contador>0)
                        @break
                      @endif
                    @endforeach
                  @endif
                </div>
                <!-- SVG separator -->
                <div class="separator separator-bottom separator-skew">
                  <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
                  </svg>
                </div>
              </section>

              <div class="container py-md">
                @include('contenido.eventos.lista')
              </div>
       
    </main>
    

@endsection