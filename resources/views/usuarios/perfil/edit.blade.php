@extends('layouts.app')

@section('content')

<main class="profile-page">
    <section class="section-profile-cover section-shaped my-0">
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
                    <img src="images/users/default.jpg" class="rounded-circle">
                  </a>
                </div>
              </div>
                    <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">
                    <div class="card-profile-actions py-4 mt-lg-0">
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
            <form  autocomplete="off" id="frmEditPerfil">
            <div class="row">
              <div class="col-12">
                  <div class="d-flex">
                      <div>
                        <div class="icon icon-lg icon-shape bg-gradient-white shadow rounded-circle text-primary">
                            <i class="ni ni-single-02 text-primary"></i>
                        </div>
                      </div>
                      <div class="pl-4 w-100">
                        <h4 class="display-3 mt-2">Informacion de perfil</h4>
                            <input type="hidden" id="token" name="token" readonly="true" value="{{csrf_token()}}">
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
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <?php
                                                if(Auth::user()->fecha_nacimiento=='' || Auth::user()->fecha_nacimiento=='0000-00-00')
                                                {
                                                    $fechaNacimiento='';
                                                }
                                                else {
                                                    $fechaNacimiento=date("d/m/Y", strtotime(Auth::user()->fecha_nacimiento));
                                                }
                                                ?>
                                            <input class="form-control datepicker" placeholder="Selecciona una fecha" type="text" value="{{$fechaNacimiento}}" id="fecha_nacimiento" name="fecha_nacimiento">
                                            </div>
                                        </div>
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
                                            <div class="form-group">
                                                <input type="number" min="0" class="form-control" id="telefono_fijo" name="telefono_fijo" placeholder="Telefono fijo" onkeypress="soloNumeros(event,20)">
                                            </div>
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
                                            <div class="form-group">
                                                <input type="number" min="0" class="form-control" id="telefono_movil" name="telefono_movil" placeholder="Telefono movil" onkeypress="soloNumeros(event,20)">
                                            </div>
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
                                            <div class="form-group">
                                                <input type="text" min="0" class="form-control" id="direccion" name="direccion" placeholder="Direccion" maxlength="300">
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
                    <div class="d-flex">
                        <div>
                        <div class="icon icon-lg icon-shape bg-gradient-white shadow rounded-circle text-primary">
                            <i class="ni ni-hat-3 text-primary"></i>
                        </div>
                        </div>
                        <div class="pl-4 w-100">
                        <h4 class="display-3 mt-2">Informacion de estudiante</h4>

                        <div class="custom-control custom-checkbox mt-3">
                            <input class="custom-control-input" id="estado" name="estado" type="checkbox">
                            <label class="custom-control-label text-uppercase font-weight-bold text-danger mb-0" style="padding-top:3px;" for="estado">
                                @if(isset($seccion))
                                    Actualizar informacion de estudiante
                                @else
                                    Registrar informacion de estudiante
                                @endif
                            </label>
                        </div>

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
                                            <select class="form-control" name="universidades_id" id="universidades_id">
                                                <option value="">Universidad</option>
                                                @foreach($universidades as $universidad)
                                                    <option <?php if($universidades_id==$universidad->id){ ?> selected <?php } ?> value="{{$universidad->id}}">{{$universidad->nombre}}</option>
                                                @endforeach
                                            </select>
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
                                                <select class="form-control" name="facultades_id" id="facultades_id">
                                                    <option value="">Facultad</option>
                                                    @if(count($facultades)>0)
                                                    @for($i=0;$i<count($facultades);$i++)
                                                        <option <?php if($facultades_id==$facultades[$i]["facultades_id"]){ ?> selected <?php } ?> value="{{$facultades[$i]["universidades_facultades_id"]}}">{{$facultades[$i]["facultadNombre"]}}</option>
                                                        @endfor
                                                    @endif
                                                </select>
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
                                                <select class="form-control" name="ciclo" id="ciclo">
                                                    <option value="">Ciclo</option>
                                                    @for($i=1;$i<11;$i++)
                                                        <option <?php if($ciclo==$i){ ?> selected <?php } ?> value="{{$i}}">{{getRomano($i)}}</option>
                                                    @endfor
                                                </select>
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
                                                <select class="form-control" name="seccion" id="seccion">
                                                    <option value="">Seccion</option>
                                                    <option <?php if($seccion=="A"){ ?> selected <?php } ?> value="A">A</option>
                                                    <option <?php if($seccion=="B"){ ?> selected <?php } ?> value="B">B</option>
                                                    <option <?php if($seccion=="C"){ ?> selected <?php } ?> value="C">C</option>
                                                    <option <?php if($seccion=="D"){ ?> selected <?php } ?> value="D">D</option>
                                                    <option <?php if($seccion=="E"){ ?> selected <?php } ?> value="E">E</option>
                                                    <option <?php if($seccion=="F"){ ?> selected <?php } ?> value="F">F</option>
                                                    <option <?php if($seccion=="G"){ ?> selected <?php } ?> value="G">G</option>
                                                    <option <?php if($seccion=="H"){ ?> selected <?php } ?> value="H">H</option>
                                                </select>
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
                                            <h6 class="mt-1 font-weight-bold">Vigente: </h6>
                                            <h6 class="mb-0">
                                                <label class="custom-toggle">
                                                    <input type="checkbox" <?php if($vigente==1){ ?> checked <?php } ?> id="vigente" name="vigente" value="1">
                                                    <span class="custom-toggle-slider rounded-circle"></span>
                                                </label>
                                            </h6>
                                            </div>
                                        </div>
                                </li>
                        </ul>
                        
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

    function ActivarControles(estado)
    {
        if(estado==0)
        {
            $('#universidades_id').attr('disabled');
            $('#facultades_id').attr('disabled');
            $('#ciclo').attr('disabled');
            $('#seccion').attr('disabled');
            $('#vigente').attr('disabled');
        }
        else
        {
            $('#universidades_id').removeAttr('disabled');
            $('#facultades_id').removeAttr('disabled');
            $('#ciclo').removeAttr('disabled');
            $('#seccion').removeAttr('disabled');
            $('#vigente').removeAttr('disabled');
        }
    }

    $( document ).ready(function() {
        $('#universidades_id').on('change',function(){
            getFacultades();
        });

        $('#estado').on('change',function(){
            if($('#estado').prop('checked'))
            {
                ActivarControles(1);
            }
            else
            {
                ActivarControles(0);
            }
        });

        $('#frmEditPerfil').submit(function(e){
            e.preventDefault();
            
            if($('#estado').prop('checked'))
            {
                if( $('#universidades_id').val()=='' || $('#facultades_id').val()=='' || $('#ciclo').val()=='' || $('#seccion').val()=='' )
                {
                    notification('INFORMACION', 'Complete los datos de estudiante.','warning','top','right');
                    return;
                }
            }

            $(".loader").fadeIn('slow');
            let fecha=$('#fecha_nacimiento').val();
            let nFecha='';
            if(fecha!='')
            {
                nFecha=fecha.split('/').reverse().join('-');
            }
            form=$('#frmEditPerfil').serialize()+'&fechaNacimiento='+nFecha;
            route='savePerfil';
            token=$('#token').val();
            $.ajax({
                url: route,
                headers: {'X-CSRF-TOKEN': token},
                type: 'POST',
                data: form,
                dataType: 'json',
                success: function(msj){
                    location.href = "/perfil";
                },
                error:function(msj){
                    notification('ERROR', 'Ocurrio un error al intentar registrar la informacion.','danger','top','right');
                    $(".loader").fadeOut('slow');
                }
            });

        });

    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy'
    });

    });


  </script>
@endsection