<div class="pl-4 w-100 mb-5">
        <h5 >Inscripcion al evento</h5>
        <h6 class="text-info">Seleccione las ponencias a las que desea inscribirse</h6>
        <div class="row">
            @foreach($evento->cronogramas as $cronograma)
                @if($cronograma->estado==1 && $cronograma->tipo==1) 
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="custom-control custom-checkbox mb-3">
                    <input class="custom-control-input checkPonencia" id="ponencia-{{$cronograma->id}}" type="checkbox" name="ponencias[]" value="{{$cronograma->id}}">
                        <label class="custom-control-label" for="ponencia-{{$cronograma->id}}">{{$cronograma->titulo}}</label>
                    </div>
                </div>
                @endif
            @endforeach
        </div>

        <h6 class="text-info">Seleccione los talleres a los que desea inscribirse</h6>
        <div class="row">
            @foreach($evento->cronogramas as $cronograma)
                @if($cronograma->estado==1 && $cronograma->tipo==2) 
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="custom-control custom-checkbox mb-3">
                    <input class="custom-control-input checkTaller" id="taller-{{$cronograma->id}}" type="checkbox" name="talleres[]" value="{{$cronograma->id}}">
                        <label class="custom-control-label" for="taller-{{$cronograma->id}}">{{$cronograma->titulo}}</label>
                    </div>
                </div>
                @endif
            @endforeach
        </div>

        <h6 class="text-danger">¿Desea adquirir el certificado del evento?</h6>

        <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="custom-control custom-checkbox mb-3 ">
                            <input class="custom-control-input" id="adquirirCertificado" type="checkbox" name="certificado" value="1">
                            <label class="custom-control-label" for="adquirirCertificado">Adquirir certificado del evento</label>
                        </div>
                </div>
        </div>

    </div>
