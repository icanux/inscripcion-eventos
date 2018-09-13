@extends('layouts.appsub')

@section('content')
  <!-- CARD -->
  <link href='../card/css/rotating-card.css' rel='stylesheet' />
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
                          <img src="../images/eventos/{{$evento->imagen}}" style="width: 200px;" class="img-fluid">
                            <p class="lead text-white">{{$evento->nombre}}</p>

                            <div class="row">
                                
                                    <div class="col-lg-8 p-0 ml-auto mr-auto">
                                        <div class="bg-dark border-round p-3">
            
                                            @if(count($eventosUser)>0)
                                                <h5 class="text-white text-center d-block w-100">Estas inscrito a este evento</h5>
                                                <div class="d-block w-100 text-center">
                                                        <a id="inscripcion" href="/inscripcion/{{$evento->id}}" class="btn btn-icon btn-3 bg-primary text-white cursor-p">
                                                                <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                                                                <span class="btn-inner--text">Actualizar mi inscripcion</span>
                                                            </a>
                                                </div>
                                            @else
                                                <h5 class="text-white text-center d-block w-100">Inscribirme al evento</h5>
                                                @if(!Auth::guest())

                                                    <div class="d-block w-100 text-center">
                                                        <a id="inscripcion" href="/inscripcion/{{$evento->id}}" class="btn btn-icon btn-3 bg-primary text-white cursor-p">
                                                                <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                                                                <span class="btn-inner--text">Inscribirme</span>
                                                            </a>
                                                    </div>
                                                @else
                                                    <div class="d-block w-100 text-center">
                                                        <h5 class="text-success">Debes estar registrado y haber iniciado sesion para inscribirte al evento.</h5>
                                                    </div>
                                                @endif
                                            @endif
            
                                        </div>
                                    </div>
                                
                            </div>
                          <div class="btn-wrapper mt-5">
                            <a href="../eventos" class="btn btn-lg btn-github btn-icon mb-sm-0">
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
                                <div class="d-xs-none">
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
                                    <div class="d-xs-none">
                                        <div class="icon icon-lg icon-shape bg-gradient-white shadow rounded-circle text-primary">
                                            <i class="ni ni-watch-time"></i>
                                        </div>
                                    </div>
                                    <div class="pl-4 w-100">
                                        <h4 class="display-3 mt-2">Cronograma Del Evento</h4>

                                        <h3 class="h4 text-danger font-weight-bold mb-5">Ponencias</h3>

                                        <div class="container cardEventoClass">
                                            <div class="row">
                                                <div class="col-12 col-sm-offset-1">
                                                    <div class="row">
                                                        @foreach($evento->cronogramas as $cronograma)

                                                            @if($cronograma->estado==1 && $cronograma->tipo==1)

                                                                <div class="col-lg-4 col-md-6 col-sm-6">
                                                                    <div class="card-container">
                                                                        <div class="card">
                                                                            <div class="front">
                                                                                <div class="cover">
                                                                                    <img src="/card/images/rotating_card_thumb2.png"/>
                                                                                </div>
                                                                                <div class="user">
                                                                                    <img class="img-circle" src="/images/ponentes/{{$cronograma->imagen}}"/>
                                                                                </div>
                                                                                <div class="content">
                                                                                    <div class="main">
                                                                                        <h3 class="name">{{$cronograma->titulo}}</h3>
                                                                                        <p class="profession">{{$cronograma->encargado}}</p>
                                                                                    </div>
                                                                                    <div class="d-flex justify-content-center align-items-center">
                                                                                        <h6 class="bg-primary text-center text-white border-round p-1 pl-2 pr-2 mt-0">Horario: <br><?php echo date('g:i a', strtotime($cronograma->hora_inicio)); ?> - <?php echo date('g:i a', strtotime($cronograma->hora_fin)); ?></h6>
                                                                                    </div>
                                                                                </div>
                                                                            </div> <!-- end front panel -->
                                                                            <div class="back">
                                                                                <div class="header text-center">
                                                                                    <span class="text-white bg-warning p-1 border-round">Ponencia</span>
                                                                                </div>
                                                                                <div class="content">
                                                                                    <div class="main">
                                                                                        <h4 class="text-center">{{$cronograma->encargado}}</h4>
                                                                                        <p class="text-center">{{$cronograma->titulo}}</p>
                                                                                        <p class="description">
                                                                                            <strong>Requisitos: </strong>{{$cronograma->requisitos}}.
                                                                                        </p>
                                                                                        <div class="d-flex justify-content-center align-items-center">
                                                                                                <h6 class="bg-primary text-center text-white border-round p-1 pl-2 pr-2 mt-0">Horario: <br><?php echo date('g:i a', strtotime($cronograma->hora_inicio)); ?> - <?php echo date('g:i a', strtotime($cronograma->hora_fin)); ?></h6>
                                                                                        </div>
                                                        
                                                                                    </div>
                                                                                </div>
                                                                            </div> 
                                                                        </div> 
                                                                    </div> 
                                                                </div> 
                                                    
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div> 
                                            </div> 
                                        </div>  


                                        <h3 class="h4 text-danger font-weight-bold mb-5">Talleres</h3>

                                        <div class="container cardEventoClass">
                                            <div class="row">
                                                <div class="col-12 col-sm-offset-1">
                                                    <div class="row">
                                                        @foreach($evento->cronogramas as $cronograma)

                                                            @if($cronograma->estado==1 && $cronograma->tipo==2)

                                                                <div class="col-lg-4 col-md-6 col-sm-6">
                                                                    <div class="card-container">
                                                                        <div class="card">
                                                                            <div class="front">
                                                                                <div class="cover">
                                                                                    <img src="/card/images/rotating_card_thumb2.png"/>
                                                                                </div>
                                                                                <div class="user">
                                                                                    <img class="img-circle" src="/images/ponentes/{{$cronograma->imagen}}"/>
                                                                                </div>
                                                                                <div class="content">
                                                                                    <div class="main">
                                                                                        <h3 class="name">{{$cronograma->titulo}}</h3>
                                                                                        <p class="profession">{{$cronograma->encargado}}</p>
                                                                                    </div>
                                                                                    <div class="d-flex justify-content-center align-items-center">
                                                                                        <h6 class="bg-primary text-center text-white border-round p-1 pl-2 pr-2 mt-0">Horario: <br><?php echo date('g:i a', strtotime($cronograma->hora_inicio)); ?> - <?php echo date('g:i a', strtotime($cronograma->hora_fin)); ?></h6>
                                                                                    </div>
                                                                                </div>
                                                                            </div> <!-- end front panel -->
                                                                            <div class="back">
                                                                                <div class="header text-center">
                                                                                    <span class="text-white bg-success p-1 border-round">Taller</span>
                                                                                </div>
                                                                                <div class="content">
                                                                                    <div class="main">
                                                                                        <h4 class="text-center">{{$cronograma->encargado}}</h4>
                                                                                        <p class="text-center">{{$cronograma->titulo}}</p>
                                                                                        <p class="description">
                                                                                            <strong>Requisitos: </strong>{{$cronograma->requisitos}}.
                                                                                        </p>
                                                                                        <div class="d-flex justify-content-center align-items-center">
                                                                                                <h6 class="bg-primary text-center text-white border-round p-1 pl-2 pr-2 mt-0">Horario: <br><?php echo date('g:i a', strtotime($cronograma->hora_inicio)); ?> - <?php echo date('g:i a', strtotime($cronograma->hora_fin)); ?></h6>
                                                                                        </div>
                                                        
                                                                                    </div>
                                                                                </div>
                                                                            </div> 
                                                                        </div> 
                                                                    </div> 
                                                                </div> 
                                                    
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div> 
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
            $('#inscripcion').attr('href','../inscripcion/'+eventosId+'/1/'+certificado);
        }
    });

  });
  
  </script>


<script type="text/javascript">
    $().ready(function(){
        $('[rel="tooltip"]').tooltip();

    });

    function rotateCard(btn){
        var $card = $(btn).closest('.card-container');
        console.log($card);
        if($card.hasClass('hover')){
            $card.removeClass('hover');
        } else {
            $card.addClass('hover');
        }
    }
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46172202-4', 'auto');
  ga('send', 'pageview');

</script>

@endsection