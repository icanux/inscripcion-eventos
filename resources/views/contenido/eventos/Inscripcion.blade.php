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
          <div class="col px-0">
                <div class="row align-items-center justify-content-center">
                        <div class="col-12 text-center">
                          <img src="../images/eventos/{{$evento->imagen}}" style="width: 200px;" class="img-fluid">
                            <p class="lead text-white">{{$evento->nombre}}</p>

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
                                        <i class="ni ni-badge"></i>
                                    </div>
                                </div>
                            <form action="../saveInscripcion" method="POST" id="frmInscripcion">
                                <input type="hidden" name="_token" readonly="true" value="{{csrf_token()}}">
                             <input type="hidden" name="eventos_id" id="eventos_id" readonly value="{{$evento->id}}">

                                <div class="pl-4 w-100 mb-5">
                                    <h4 class="display-3">Inscripcion al evento</h4>
                                    <h3 class="h4 text-success font-weight-bold mb-3">Seleccione las ponencias a las que desea inscribirse</h3>
                                    <div class="row">
                                        @foreach($evento->cronogramas as $cronograma)
                                            @if($cronograma->estado==1 && $cronograma->tipo==1) 
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input checkPonencia" id="ponencia-{{$cronograma->id}}" type="checkbox" name="ponencias[]" value="{{$cronograma->id}}" <?php if(in_array($cronograma->id,$listaInscripciones)){ ?> checked <?php } ?> >
                                                    <label class="custom-control-label" for="ponencia-{{$cronograma->id}}">{{$cronograma->titulo}}</label>
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach
                                    </div>

                                    <h3 class="h4 text-success font-weight-bold mt-2 mb-3">Seleccione los talleres a los que desea inscribirse</h3>
                                    <div class="row">
                                        @foreach($evento->cronogramas as $cronograma)
                                            @if($cronograma->estado==1 && $cronograma->tipo==2) 
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input checkTaller" id="taller-{{$cronograma->id}}" type="checkbox" name="talleres[]" value="{{$cronograma->id}}" <?php if(in_array($cronograma->id,$listaInscripciones)){ ?> checked <?php } ?> >
                                                    <label class="custom-control-label" for="taller-{{$cronograma->id}}">{{$cronograma->titulo}}</label>
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach
                                    </div>

                                    <h3 class="h4 text-danger font-weight-bold mb-3">¿Desea adquirir el certificado del evento?</h3>

                                    <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="custom-control custom-checkbox mb-3 ">
                                                        <input class="custom-control-input" id="adquirirCertificado" type="checkbox" name="certificado" <?php if($certificado==1){ ?> checked <?php } ?> value="1">
                                                        <label class="custom-control-label" for="adquirirCertificado">Adquirir certificado del evento</label>
                                                    </div>
                                            </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 mt-3">
                                            <button class="btn btn-icon btn-3 btn-primary" type="button" id="confirmarInscripcion">
                                                <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                                                <span class="btn-inner--text">Confirmar Incripcion</span>
                                            </button>
                                        </div>
                                    </div>

                                </div>

                            </form>
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

    $('#confirmarInscripcion').on('click',function(){
    

    let ponencias=0;
    let talleres=0;

    $('.checkPonencia').each(function(){
        if( $(this).prop('checked') ){
        ponencias++;
        }
    });

    $('.checkTaller').each(function(){
        if( $(this).prop('checked') ){
        talleres++;
        }
    });

    if( (ponencias+talleres)>0 )
    {
        $('#frmInscripcion').submit();
    }
    else
    {
        notification('INFORMACION', 'Debe seleccionar por lo menos una opcion.','warning','top','right');        
    }

  });

  });


  
  </script>



@endsection