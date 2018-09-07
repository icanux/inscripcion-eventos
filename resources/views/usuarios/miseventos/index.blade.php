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
          <div class="col px-0">
                <div class="row align-items-center justify-content-center">
                        <div class="col-lg-6 text-center">
                          <img src="images/icanux.png" style="width: 200px;" class="img-fluid">
                          <p class="lead text-white">Comunidad Icanux promoviendo la difusion del conocimiento.</p>
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
            <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
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
                                    <h4 class="display-3 mt-2">Eventos en los que has participado</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5 mb-5">

                        @if(count($eventos)>0)
                            @for($i=0;$i<count($eventos);$i++)

                            <div class="col-lg-6 col-md-6 col-sm-12">

                                <div class="container-card">
                                        <div class="column">
                                            <div class="post-module">
                                                <div class="thumbnail">
                                                <div class="date">
                                                    <div class="day">{{$eventos[$i]["dia"]}}</div>
                                                    <div class="month">{{$eventos[$i]["mes"]}}</div>
                                                </div><img src="images/eventos/{{$eventos[$i]["imagen"]}}">
                                                </div>
                                                <div class="post-content">
                                                <div class="category">Evento</div>
                                                <h1 class="title">{{$eventos[$i]["nombre"]}}</h1>
                                                    <h2 class="sub_title">{{$eventos[$i]["direccion"]}}</h2>
                                                <p class="description" style="display: none; height: 100px; opacity: 1;">
                                                    <?php echo substr($eventos[$i]["descripcion"],0,120).'...'; ?>
                                                    </p>
                                                    <div class="post-meta">
                                                        <span class="timestamp pl-2">
                                                            <i class="ni ni-calendar-grid-58"></i>
                                                            <?php echo date("d/m/Y", strtotime($eventos[$i]["fecha"])); ?>
                                                        </span>
                                                    </div>
                                                    <div class="post-meta mt-0 d-flex">
                                                        <span class="timestamp d-flex align-items-center">
                                                            @if($eventos[$i]["asistencia"]==1)
                                                                <i class="ni ni-check-bold text-success pl-2"></i>
                                                            @else
                                                                <i class="ni ni-fat-remove text-danger pl-0" style="font-size:30px;"></i>
                                                            @endif
                                                            Asistencia
                                                        </span>
                                                        <span class="timestamp d-flex align-items-center">
                                                                @if($eventos[$i]["certificado"]==1)
                                                                    <i class="ni ni-check-bold text-success"></i>
                                                                @else
                                                                    <i class="ni ni-fat-remove text-danger pl-0" style="font-size:30px;"></i>
                                                                @endif
                                                                Certificado
                                                        </span>
                                                    </div>
                                                    <div class="post-meta mt-0 d-flex mt-4">
                                                            <button class="btn btn-icon btn-3 btn-primary" type="button">
                                                                <span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>
                                                                <span class="btn-inner--text" style="text-transform:none;">Ver detalles</span>
                                                            </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                            </div>
                            @endfor
                        @else
                            <div class="col-12">
                                <h5>Aun no has perticipado en eventos.</h5>
                            </div>
                        @endif

                    </div>
                </div>
            </div>

      </div>
    </section>
  </main>

  <script>
  $('.post-module').hover(function() {
    $(this).find('.description').stop().animate({
      height: "toggle",
      opacity: "toggle"
    }, 300);
  });

  </script>
@endsection