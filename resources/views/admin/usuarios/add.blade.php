
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
<form id="frmRegister" method="POST">

<h3 class="h4 text-warning font-weight-bold">Datos de usuario</h3>
<div class="row mt-3">

    <div class="col-12">
                    <input type="hidden" id="token" name="token" readonly="true" value="{{csrf_token()}}">
                    <div class="row">
                          <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                              <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                </div>
                                <input class="form-control required" placeholder="Nombres" required type="text" maxlength="250" id="nombres" name="nombres" >
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-12">
                              <div class="form-group">
                                  <div class="input-group input-group-alternative mb-3">
                                      <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                      </div>
                                      <input class="form-control required" required placeholder="Apellidos" type="text" maxlength="250" id="apellidos" name="apellidos">
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-6 col-md-12">
                              <div class="form-group">
                                  <div class="input-group input-group-alternative mb-3">
                                      <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                      </div>
                                      <input class="form-control required" required placeholder="Email" type="email" maxlength="250" id="email" name="email" >
                                  </div>
                                  <small id="errorEmail" class="text-danger font-medium d-none">El email ingresado no se encuentra disponible.</small>
                              </div>
  
                          </div>
                          <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                        <div class="input-group input-group-alternative mb-3">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-building"></i></span>
                                            </div>
                                            <select class="form-control" name="universidades_id" id="universidades_id">
                                                    <option value="" selected>Universidad</option>
                                                    @foreach($universidades as $universidad)
                                                        <option value="{{$universidad->id}}">{{$universidad->nombre}}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                 </div>
                          </div>
                          <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                        <div class="input-group input-group-alternative mb-3">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-building"></i></span>
                                            </div>
                                            <select class="form-control" name="facultades_id" id="facultades_id">
                                                    <option value="" selected>Facultad</option>
                                                    @if(count($facultades)>0)
                                                    @for($i=0;$i<count($facultades);$i++)
                                                        <option value="{{$facultades[$i]["universidades_facultades_id"]}}">{{$facultades[$i]["facultadNombre"]}}</option>
                                                        @endfor
                                                    @endif
                                                </select>
                                        </div>
                                 </div>
                          </div>
                          <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                        <div class="input-group input-group-alternative mb-3">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-building"></i></span>
                                            </div>
                                            <select class="form-control" name="ciclo" id="ciclo">
                                                    <option value="">Ciclo</option>
                                                    @for($i=1;$i<11;$i++)
                                                        <option  value="{{$i}}">{{getRomano($i)}}</option>
                                                    @endfor
                                                </select>
                                        </div>
                                 </div>
                          </div>
                          <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                        <div class="input-group input-group-alternative mb-3">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-building"></i></span>
                                            </div>
                                            <select class="form-control" name="seccion" id="seccion">
                                                    <option value="">Seccion</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>
                                                    <option value="E">E</option>
                                                    <option value="F">F</option>
                                                    <option value="G">G</option>
                                                    <option value="H">H</option>
                                                </select>
                                        </div>
                                 </div>
                          </div>
                    </div>
                  
    </div>

</div>

<h3 class="h4 text-warning font-weight-bold">Registrar en evento</h3>
<div class="row mt-3">
        <div class="col-lg-6 col-md-12">
                <div class="form-group">
                        <div class="input-group input-group-alternative mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-building"></i></span>
                            </div>
                            <select class="form-control required" required name="eventos_id" id="eventos_id" onchange="CargarDatosEvento()">
                                    <option value="">Evento</option>
                                    @foreach($eventos as $evento)
                                        <option value="{{$evento->id}}">{{$evento->nombre}}</option>
                                    @endforeach
                                </select>
                        </div>
                 </div>
          </div>
          <div id="contenidoEvento" class="mb-4 mt-2">

          </div>
</div>

<div class="row">
    <div class="col-12">
            <div class="text-center">
                    <button type="submit" class="btn btn-vino mt-4">Crear</button>
                  </div>
    </div>
</div>
</form>

<script>

function CargarDatos()
{
    $.get('/searchUsuarios',function(data){
        $('#tabs-icons-text-1').html(data);
    });
}

function CargarDatosEvento()
{
    eventos_id=$('#eventos_id').val();
    if(eventos_id!='')
    {
        $(".loader").fadeIn('slow');
        $.get('/getDetalleEvento/'+eventos_id,function(data){
            $('#contenidoEvento').html(data);
        }).done(function(){
            $(".loader").fadeOut('slow');
        }); 
    }
}
    //REGISTRO
$('#frmRegister').submit(function(e){
    e.preventDefault()

    uni=0;

    if($('#universidades_id').val()!='')
    {
        if($('#universidades_id').val()=='' || $('#seccion').val()=='' || $('#ciclo').val()=='')
        {
            notification('INFORMACION', 'Se selecciono una universidad, debe completar los datos.','warning','top','right');
            return;
        }
        else
        {
            uni=1;
        }
    }
    
    inscripciones=0;
    $('#frmRegister input[type="checkbox"]').each(function(){
        if( $(this).prop('checked') ){
        inscripciones++;
        }
    });

    if(inscripciones==0)
    {
        notification('INFORMACION', 'Debe seleccionar por lo menos un taller.','warning','top','right');
        return;
    }

    $(".loader").fadeIn('slow');
    form=$('#frmRegister').serialize()+"&uni="+uni;
    route='/registrarUsuario';
    token=$('#token').val();
    $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'POST',
        data: form,
        dataType: 'json',
        success: function(msj){
            $(".loader").fadeOut('slow');
            if(msj.resultado==1)
            {
                notification('INFORMACION', 'El email ingresado ya esta registrado.','warning','top','right');
            }
            else if(msj.resultado==2)
            {
                $('#frmRegister')[0].reset();
                CargarDatos();
                notification('COMPLETADO', 'Se registro correctamente la informacion.','success','top','right');
            }
            else if(msj.resultado==3)
            {
                notification('ERROR', 'Ocurrio un error al intentar registrar la informacion.','danger','top','right');
            }
		    
        },
        error:function(msj){
		    notification('ERROR', 'Ocurrio un error al intentar registrar la informacion.','danger','top','right');
            $(".loader").fadeOut('slow');
        }
    });

});

</script>